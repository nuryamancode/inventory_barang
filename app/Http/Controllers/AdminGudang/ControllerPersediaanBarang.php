<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use App\Models\MBarang;
use App\Models\MBarangMasuk;
use App\Models\MPersediaanBarang;
use Illuminate\Http\Request;

class ControllerPersediaanBarang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persediaan = MPersediaanBarang::all();
        $data = [
            'persediaan'=>$persediaan,
        ];
        return view("admin.persediaanbarang", $data);
    }

    /**
     * Show the form for creating a new resource.
     */


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
