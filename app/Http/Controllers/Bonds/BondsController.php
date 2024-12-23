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
         $bonds = QueryBuilder::for(Bonds::class)
             ->allowedFilters(['property_number', 'part_number'])
             ->allowedSorts('property_number', 'part_number')
             ->paginate(10)
             ->appends($request->query());

         return view('content.Bonds.index', compact('bonds'));
     }

     public function BondShow($id)
     {
         return view('content.Bonds.show', [
             'id' => $id
         ]);
     }
 }
