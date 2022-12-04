<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Vaca;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TruckController extends Controller
{
    public function index()
    {

        $trucks = Truck::where('deleted_at', '=', null)->get();

        return view('trucks.index', ['trucks' => $trucks]);
    }
    //I set $id null, for that when the controller run, dont cause an error
    public function createTruck($id = null)
    {
        if (!empty($id)) {
            $truck = Truck::find($id);
            return view('trucks.create', ['truck' => $truck]);
        } else {
            return view('trucks.create');
        }
    }

    public function create($truckId)
    {
        $truck = Truck::find($truckId);

        $vacas = Vaca::where('truck_id', null)->orderBy('milk_per_day', 'desc')->get();
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
                return redirect()->route('trucks.index')->with(['status' => 400, 'message' => 'Dont have registers for buy']);
            }
        } else {
            return redirect()->route('trucks.index')->with(['status' => 400, 'message' => 'Dont have registers for buy']);
        }
    }

    public function buy($truckId)
    {
        $truck = Truck::find($truckId);

        $vacas = Vaca::where('truck_id', null)->orderBy('milk_per_day', 'desc')->get();

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
        $trucksTrashed = Truck::onlyTrashed()->pluck('id');

        $trucksTrasheds = Truck::withTrashed()->restore();
        
        $purchasesCow = Vaca::with('truck')->where('truck_id', '!=', null)->get();
        $data = $purchasesCow;

        foreach($trucksTrashed as $truckTrash){
            $trash = Truck::where('id', $truckTrash)->delete();
        }
        
        // foreach ($purchasesCow as $purchase) {
        //     if(isset($purchase->truck)){
        //         $truck = $purchase->truck;
        //     }else{
        //         $trucks = Truck::withTrashed()->where('id', $purchase->truck_id)->first();
        //     }
        // }
        
        return view('purchases.index', ['purchases' => $data]);
    }

    public function edit(Truck $truck)
    {
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'support_kg' => 'required'
            ]);

            $storeData = Truck::where('id', $id)->update([
                'name' => $request->name,
                'support_kg' => $request->support_kg,
            ]);

            if ($storeData) {
                return redirect()->route('trucks.index')->with('status', 'Truck updated successfully');
            }
        } catch (Exception $e) {
            return redirect()->route('trucks.index')->with(['status' => 400, 'message' => 'An error ocurred, review your request']);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'support_kg' => 'required'
            ]);

            $storeData = Truck::create([
                'name' => $request->name,
                'support_kg' => $request->support_kg,
            ]);

            if ($storeData) {
                return redirect()->route('trucks.index')->with('status', 'Truck created successfully');
            }
        } catch (Exception $e) {
            return redirect()->route('trucks.index')->with(['status' => 400, 'message' => 'An error ocurred, review your request']);
        }
    }

    public function destroy($id)
    {
        $truck = Truck::where('id', $id)->delete();
        if ($truck) {
            return redirect()->route('trucks.index')->with('status', 'Truck deleted successfully');
        } else {
            return redirect()->route('trucks.index')->with(['status' => 400, 'message' => 'An error ocurred, review your request']);
        }
    }
}
