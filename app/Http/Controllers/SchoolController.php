<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'surat_permohonan' => 'required|mimes:pdf'
        ]);

        $path = null;
        if($request->hasFile('surat_permohonan')){
            $path = $request->file('surat_permohonan')->storeAs(
               'surat-permohonan',
               $request->nama_sekolah . '_' . uniqid() . '.' . $request->file('surat_permohonan')->getClientOriginalExtension(),
               'public'
            );
        }


        School::create([
            'nama_sekolah' => $request->nama_sekolah,
            'surat_permohonan' => $path
        ]);

        return back()->with('success', 'berhasil');
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
