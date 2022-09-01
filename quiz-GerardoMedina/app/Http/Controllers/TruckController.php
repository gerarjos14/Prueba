<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Vaca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TruckController extends Controller
{
    public function index()
    {

        $trucks = Truck::all();


        return view('trucks.index', ['trucks' => $trucks]);
    }

    public function create($truckId)
    {
        $truck = Truck::find($truckId);

        $vacas = Vaca::where('truck_id', null)->orderBy('weight', 'desc')->orderBy('milk_per_day', 'desc')->get();
        $totalKg = 0;
        $totalMilk = 0;
        $supportKg = $truck->support_kg;

        if (isset($vacas)) {
            foreach ($vacas as $vaca) {
                if ($totalKg < $supportKg) {
                    $item['id'] = $vaca->id;
                    $item['weight_vaca'] = $vaca->weight;
                    $item['milk_per_vaca'] = $vaca->milk_per_day;
                    $totalMilk = $totalMilk + $vaca->milk_per_day;
                    $totalKg = $totalKg + $vaca->weight;

                    if ($totalKg > $supportKg) {
                        $totalMilk = $totalMilk - $vaca->milk_per_day;
                        $totalKg = $totalKg - $vaca->weight;
                    } else {
                        $data[] = $item;
                    }
                }
            }

            if (isset($data)) {
                return view(
                    'trucks.purchase_vacas',
                    [
                        'truck' => $truck,
                        'data' => $data,
                        'total_milk' => $totalMilk,
                        'total_kg' => $totalKg,
                    ]
                );
            } else {
                return redirect()->route('trucks.index')->with('status', 'Dont have registers for buy');
            }
        } else {
            return redirect()->route('trucks.index')->with('status', 'Dont have registers for buy');
        }
    }

    public function buy($truckId)
    {
        $truck = Truck::find($truckId);

        $vacas = Vaca::where('truck_id', null)->orderBy('weight', 'desc')->orderBy('milk_per_day', 'desc')->get();

        $totalKg = 0;
        $totalMilk = 0;
        $supportKg = $truck->support_kg;

        foreach ($vacas as $vaca) {
            if ($totalKg < $supportKg) {

                $item['id'] = $vaca->id;
                $item['milk_per_vaca'] = $vaca->milk_per_day;
                $totalMilk = $totalMilk + $vaca->milk_per_day;
                $totalKg = $totalKg + $vaca->weight;

                if ($totalKg > $supportKg) {
                    $totalMilk = $totalMilk - $vaca->milk_per_day;
                    $totalKg = $totalKg - $vaca->weight;
                } else {
                    $vaca->update(['truck_id' => $truck->id]);
                }
            }
        }

        return redirect()->route('trucks.index')->with('status', 'Purchase successfully');
    }

    public function purchases()
    {
        $purchasesCow = Vaca::with('truck')->where('truck_id', '!=', null)->get();

        // $totalKg = 0;
        // $totalMilk = 0;

        // foreach($purchasesCow as $purchase){
        //     $truck = Truck::find($purchase->truck_id);
        //     $supportKg = $truck->support_kg;
        //     if ($totalKg < $supportKg) {
        //         $vaca[] = $purchase->id;
        //         $item['vacas'] = $vaca;
        //         $item['weight_vaca'] = $purchase->weight;
        //         $item['milk_per_vaca'] = $purchase->milk_per_day;
        //         $item['truck'] = $purchase->truck->id;
        //         $totalMilk = $totalMilk + $purchase->milk_per_day;
        //         $totalKg = $totalKg + $purchase->weight;

        //         if ($totalKg > $supportKg) {
        //             $totalMilk = $totalMilk - $purchase->milk_per_day;
        //             $totalKg = $totalKg - $purchase->weight;
        //         } else {
        //             $data[] = $item;
        //         }
        //     }

        // }

        // $invoicesArr = json_encode($data);

        // Log::info($invoicesArr);

        return view('purchases.index', ['purchases' => $purchasesCow]);
    }

    public function edit(Truck $truck)
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
