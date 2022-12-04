<?php

namespace App\Http\Controllers;

use App\Models\Vaca;
use Illuminate\Http\Request;

class VacaController extends Controller
{
    public function index()
    {

        $Vacas = Vaca::where('truck_id', null)->orderBy('milk_per_day', 'desc')->get();

        return view('vacas.index', ['vacas' => $Vacas]);
    }

    public function create($VacaId)
    {
        
    }

    public function edit(Vaca $vaca)
    {
        
    }

    public function update(Request $request)
    {
    }

    public function destroy($trukIds)
    {
        //
    }
}
