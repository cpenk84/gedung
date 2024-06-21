<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Gedung;
use Illuminate\Http\RedirectResponse;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::latest()->paginate(5);
        return view('transaksi.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all()->pluck('nama_lengkap','id');
        $gedung = Gedung::all()->pluck('nama_gedung','id');
        return view('transaksi.create',compact('pelanggan','gedung'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_pelanggan' => 'required',
            'id_gedung' => 'required',
            'tanggal' => 'required',
            'jam_masuk' => 'required',
            'jumlah_jam' => 'required',
            'keterangan' => 'required',
        ]);
    
        $gedung = Gedung::find($request->input('id_gedung'));
        $total_pembayaran = $gedung->tarif*$request->input('jumlah_jam');
        Transaksi::create([
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_gedung' => $request->input('id_gedung'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jumlah_jam' => $request->input('jumlah_jam'),
            'total_pembayaran' => $total_pembayaran,
            'keterangan' => $request->input('keterangan'),
        ]);
    
        return redirect()->route('transaksis.index')
                        ->with('success','transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show',compact('transaksi'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $list_pelanggan = Pelanggan::all()->pluck('nama_lengkap','id');
        $list_gedung = Gedung::all()->pluck('nama_gedung','id');
        return view('transaksi.edit',compact('transaksi','list_pelanggan','list_gedung'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaksi $transaksi): RedirectResponse
    {
        request()->validate([
            'id_pelanggan' => 'required',
            'id_gedung' => 'required',
            'tanggal' => 'required',
            'jam_masuk' => 'required',
            'jumlah_jam' => 'required',
            'keterangan' => 'required',
        ]);
    
        $gedung = Gedung::find($request->input('id_gedung'));
        $total_pembayaran = $gedung->tarif*$request->input('jumlah_jam');
        $transaksi->update([
            'id_pelanggan' => $request->input('id_pelanggan'),
            'id_gedung' => $request->input('id_gedung'),
            'tanggal' => $request->input('tanggal'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jumlah_jam' => $request->input('jumlah_jam'),
            'total_pembayaran' => $total_pembayaran,
            'keterangan' => $request->input('keterangan'),
        ]);
    
        // $transaksi->update($request->all());
    
        return redirect()->route('transaksis.index')
                        ->with('success','transaksi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi): RedirectResponse
    {
        $transaksi->delete();
    
        return redirect()->route('transaksis.index')
                        ->with('success','Transaksi deleted successfully');
    }
}
