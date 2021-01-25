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

        return view('services.dashboard')->with('daftarActivity', $daftarActivity);
    }

    public function index_inventory()
    {
        $id = Auth::id();

        // $query = DB::table('supplier as s')
        //         ->select('namaSupplier', 'namaBarang', 'dimension', 'quantity', 'i.id')
        //         ->join('barang as b', 's.id', '=', 'b.id_supplier')
        //         ->join('inventory as i', 'b.id', '=', 'i.id_barang')
        //         ->where('b.id_user', $id)
        //         ->get();

        $query = Supplier::select('namaSupplier', 'namaBarang', 'dimension', 'quantity', 'b.id')
                ->join('barang as b', 'supplier.id', '=', 'b.id_supplier')
                ->join('inventory as i', 'b.id', '=', 'i.id_barang')
                ->where('b.id_user', $id)
                ->get();
        // dd($query);
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
        $id_user = Auth::id();

        $barangId = $id;

        // $query = DB::table('supplier as s')
        //         ->select('namaBarang', 'quantity', 'i.id')
        //         ->join('barang as b', 's.id', '=', 'b.id_supplier')
        //         ->join('inventory as i', 'b.id', '=', 'i.id_barang')
        //         ->where('b.id_user', $id_user)
        //         ->where('i.id' , $inventoryId)
        //         ->first();

        $query = Supplier::select('namaBarang', 'quantity', 'b.id')
        ->join('barang as b', 'supplier.id', '=', 'b.id_supplier')
        ->join('inventory as i', 'b.id', '=', 'i.id_barang')
        ->where('b.id_user', $id_user)
        ->where('b.id' , $barangId)
        ->first();
        // dd($query);
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
            $addActivity->value_activity = 2;

        $addActivity->save();
        // Alert::success('Edit Successfully', 'Data Barang Berhasil Diubah');

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
        //
    }

    public function supplier()
    {

    }
}
