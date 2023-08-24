<?php

namespace App\Http\Controllers;

// use App\Models\kategori;
use App\Models\Category;;
use App\Models\CentrePoint;
use App\Models\Space;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function centrepoint(){
        $centrepoint = CentrePoint::orderBy('created_at', 'DESC');
        return datatables()->of($centrepoint)
            ->addColumn('action', 'centrepoint.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
    public function spaces()
    {
        // Method ini untuk menampilkan data dari tabel spaces
        // ke dalam datatables kita juga menambahkan column untuk menampilkan button
        // action
        $spaces = Space::orderBy('created_at', 'DESC');
        return datatables()->of($spaces)
            ->addColumn('action', 'space.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
