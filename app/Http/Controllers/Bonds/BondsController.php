<?php
 namespace App\Http\Controllers\Bonds;

 use App\Models\Bonds\Bonds;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use Spatie\QueryBuilder\QueryBuilder;

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
