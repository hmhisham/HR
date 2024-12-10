<?php
namespace App\Http\Controllers\Bonds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BondsController extends Controller
{
    public function index()
    {
        Return View('content.Bonds.index'); 
    }

 public function BondShow($id)
    {
        Return View('content.Bonds.show', [
            'id' => $id
        ]);
    }
}
