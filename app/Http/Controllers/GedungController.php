<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;
use Illuminate\Http\RedirectResponse;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gedung::latest()->paginate(5);
        return view('gedung.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama_gedung' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
            'tarif' => 'required',
        ]);
    
        Gedung::create($request->all());
    
        return redirect()->route('gedungs.index')
                        ->with('success','Gedung created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gedung $gedung)
    {
        return view('gedung.show',compact('gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gedung $gedung)
    {
        return view('gedung.edit',compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gedung $gedung): RedirectResponse
    {
         request()->validate([
            'nama_gedung' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
            'tarif' => 'required',
            ]);
    
        $gedung->update($request->all());
    
        return redirect()->route('gedungs.index')
                        ->with('success','Gedung updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gedung $gedung): RedirectResponse
    {
        $gedung->delete();
    
        return redirect()->route('gedungs.index')
                        ->with('success','Gedung deleted successfully');
    }
}
