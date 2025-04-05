<?php
namespace App\Http\Controllers\Usersapp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class UsersappController extends Controller
{
    public function index()
    {
        Return View('content.Usersapp.index'); 
    }

    public function UsersapShow($id)
    {
        Return View('content.Usersapp.show', [
            'id' => $id
        ]);
    }
}
