<?php
namespace App\Http\Controllers\Placements;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PlacementsController extends Controller
{
    public function index()
    {
        Return View('content.Placements.index');
    }

    public function CertifiShow($id)
    {
        Return View('content.Placements.show', [
            'id' => $id
        ]);
    }
}
