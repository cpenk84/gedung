<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

use function PHPUnit\Framework\isNull;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tanggal($tanggal = 0)
    {
        if($tanggal == 0){
            $get_tanggal = date('Y-m-d');
        }else{
            $get_tanggal = $tanggal;
        }
        $data = Transaksi::where('tanggal',$get_tanggal)->latest()->paginate(5);
        $total = Transaksi::where('tanggal',$get_tanggal)->sum('total_pembayaran');
        return view('laporan.index',compact('data','get_tanggal','total'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function print($tanggal)
    {
        $data = Transaksi::where('tanggal',$tanggal)->get();
        $total = Transaksi::where('tanggal',$tanggal)->sum('total_pembayaran');
        return view('laporan.print',compact('data','tanggal','total'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
