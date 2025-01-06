<?php
 namespace App\Http\Controllers\Bonds;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;

 class BondsController extends Controller
 {
     public function index(Request $request)
     {
        return view('content.Bonds.index');
     }

     public function BondShow($id)
     {
         return view('content.Bonds.show', [
             'id' => $id
         ]);
     }
 }
