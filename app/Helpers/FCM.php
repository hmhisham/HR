<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use App\Models\Workers\Workers;
use App\Models\Notifications\Notifications;

class FCM
{
    public static function getAccessToken($serviceAccountPath)
    {
        $serviceAccount = json_decode(file_get_contents($serviceAccountPath), true);

        if (!$serviceAccount || !isset($serviceAccount['client_email']) || !isset($serviceAccount['private_key'])) {
            throw new \Exception('Invalid service account configuration');
        }

        $now_seconds = time();
        $payload = array(
            "iss" => $serviceAccount['client_email'],
            "scope" => "https://www.googleapis.com/auth/firebase.messaging",
            "aud" => "https://oauth2.googleapis.com/token",
            "exp" => $now_seconds + 3600,
            "iat" => $now_seconds
        );

        $private_key = $serviceAccount['private_key'];
        $token = JWT::encode($payload, $private_key, "RS256");

        $postFields = 'grant_type=urn:ietf:params:oauth:grant-type:jwt-bearer&assertion=' . $token;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception('CURL Error: ' . curl_error($ch));
        }

        $response = json_decode($result, true);

        if (!isset($response['access_token'])) {
            throw new \Exception('Failed to retrieve access token: ' . json_encode($response));
        }

        return $response['access_token'];
    }

    public static function sendNotificationToApp($title, $body, $userToken, $imageUrl = null)
    {
        $accessToken = self::getAccessToken(public_path('FCM.json'));

        $notificationData = [
            'title' => $title,
            'body' => $body,
        ];

        if ($imageUrl) {
            $notificationData['image'] = $imageUrl;
        }

        $data = [
            'message' => [
                'token' => $userToken,
                'notification' => $notificationData,
            ],
        ];

        $client = new Client();
        try {
            $response = $client->post('https://fcm.googleapis.com/v1/projects/gcpi-e6c2b/messages:send', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json'
                ],
                'json' => $data
            ]);

            $notificationData['calculator_number'] = Workers::where('worker_token', $userToken)->first()->calculator_number;
            Notifications::create($notificationData);

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            throw new \Exception('Guzzle Error: ' . $e->getMessage());
        }

        return $response;
    }
}
