<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Http\RedirectResponse;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::latest()->paginate(5);
        return view('pelanggan.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);
    
        Pelanggan::create($request->all());
    
        return redirect()->route('pelanggans.index')
                        ->with('success','pelanggan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show',compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit',compact('pelanggan'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan): RedirectResponse
    {
         request()->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);
    
        $pelanggan->update($request->all());
    
        return redirect()->route('pelanggans.index')
                        ->with('success','Pelanggan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan): RedirectResponse
    {
        $pelanggan->delete();
    
        return redirect()->route('pelanggans.index')
                        ->with('success','pelanggan deleted successfully');
    }
}
