<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Barang;
use App\Models\Inventory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $daftarActivity = Activity::where('id_user', $id)->get();

        $stock = Inventory::where('id_user', $id)->count();
        $checkIn = Activity::where('id_user', $id)->where('value_activity', 1)->count();
        $checkOut = Activity::where('id_user', $id)->where('value_activity', 0)->count();
        $supplier = Supplier::where('id_user', $id)->count();

        $quantity = Inventory::where('id_user', $id)->where('quantity','>', 0)->get();
        $dimension = Barang::where('id_user', $id)->sum('dimension');
        $space = 0;
        // 100*$quantity*$dimension/10000;

        foreach($quantity as $item){
            $dimension = Barang::where('id', $item->id_barang)->first();
            $space = $space + ($item->quantity * $dimension->dimension);
        }
        $space = round(100*$space/12500000);

        // $query = Activity::select('quantity', 'dimension')
        //         ->join('barang as b', 'Activity.id_barang', '=', 'b.id')
        //         ->join('inventory as i', 'b.id', '=', 'i.id_barang')
        //         ->where('i.id_user', $id)
        //         ->where('quantity', '>', '0')
        //         ->first();
        // dd($query);
        return view('services.dashboard')->with([
            'daftarActivity'=>$daftarActivity,
            'stock'=>$stock,
            'checkIn'=>$checkIn,
            'checkOut'=>$checkOut,
            'supplier'=>$supplier,
            'space'=>$space
            ]);
    }

    public function index_inventory()
    {
        $id = Auth::id();

        $query = Supplier::select('namaSupplier', 'namaBarang', 'dimension', 'quantity', 'b.id')
                ->join('barang as b', 'supplier.id', '=', 'b.id_supplier')
                ->join('inventory as i', 'b.id', '=', 'i.id_barang')
                ->where('b.id_user', $id)
                ->get();
        return view('services.inventory')->with('daftarInventory', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $daftarSupplier= Supplier::where('id_user', $id)->get();
        return view('services.checkin')->with('daftarSupplier', $daftarSupplier);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier' => 'required'
        ]);

        $id = Auth::id();

        $dimension = $request->length * $request->width * $request->height;


        $daftarBarang = new Barang;
        $daftarBarang->id_user = $id;
        $daftarBarang->id_supplier = $request->supplier;
        $daftarBarang->namaBarang = $request->namaBarang;
        $daftarBarang->dimension = $dimension;

        $daftarBarang->save();

        $id_barang = $daftarBarang->id;

        $addInventory = new Inventory;
        $addInventory->id_barang = $id_barang;
        $addInventory->id_user = $id;
        $addInventory->quantity = $request->quantity;

        $addInventory->save();

        $addActivity = new Activity;
        $addActivity->id_barang = $id_barang;
        $addActivity->id_user = $id;
        $addActivity->value_quantity = $request->quantity;
        // Check-in value
        $addActivity->value_activity = 1;

        $addActivity->save();

        Alert::success('Item Added Successfully ', 'New Item Successfully Added');

        return redirect()->route('service.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_user = Auth::id();

        $barangId = $id;

        $query = Supplier::select('namaBarang', 'quantity', 'b.id')
        ->join('barang as b', 'supplier.id', '=', 'b.id_supplier')
        ->join('inventory as i', 'b.id', '=', 'i.id_barang')
        ->where('b.id_user', $id_user)
        ->where('b.id' , $barangId)
        ->first();
        return view ('services.edit', compact('barangId', 'query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_user = Auth::id();

        $updateBarang = Barang::find($id);
        $updateBarang->namaBarang = $request->namaBarang;
        $updateBarang->save();

        $updateInventory= Inventory::where('id_barang', $id)->first();
        $sebelum = $updateInventory->quantity;
        $updateInventory->quantity = $request->quantity;
        $sesudah = $request->quantity;
        $updateInventory->save();


        if ($sesudah == $sebelum) return redirect()->route('service.inventory');

        $addActivity = new Activity;
        $addActivity->id_barang = $id;
        $addActivity->id_user = $id_user;
        $addActivity->value_quantity = $sesudah - $sebelum;
        $addActivity->value_activity = 1;
        // Check-in value
        if ($sesudah < $sebelum)
            $addActivity->value_activity = 0;

        $addActivity->save();

        Alert::success('Edit Successfully', 'Data Successfully Changed');

        return redirect()->route('service.inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
