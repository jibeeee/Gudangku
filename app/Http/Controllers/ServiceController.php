<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Barang;
use App\Models\Inventory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return view('services.dashboard')->with([
            'daftarActivity'=>$daftarActivity, 
            'stock'=>$stock,
            'checkIn'=>$checkIn,
            'checkOut'=>$checkOut,
            'supplier'=>$supplier]);
    }

    public function index_inventory()
    {
        $id = Auth::id();
        $daftarInventory = Inventory::where('id_user', $id)->get();

        return view('services.inventory')->with('daftarInventory', $daftarInventory);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function supplier()
    {

    }
}
