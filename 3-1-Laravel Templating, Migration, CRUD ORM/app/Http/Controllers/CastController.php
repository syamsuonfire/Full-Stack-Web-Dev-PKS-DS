<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cast;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $casts = Cast::all();
 
   
    return view('cast.index',compact('casts'));
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cast.create');
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
            'nama'=>'required|max:45',
            'umur'=>'required',
            'bio'=>'required'
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'nama.max'=> 'Karakter tidak boleh dari 45',
            'umur.required'=> "Umur harus diisi",
            'bio.required'=> "Bio tidak boleh kosong"
        ]
    );

    $cast = new Cast;
 
    $cast->nama = $request->nama;
    $cast->umur = $request->umur;
    $cast->bio = $request->bio;

    $cast->save();

    return redirect('/cast');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cast = Cast::find($id)->first();

        return view('cast.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cast = Cast::find($id);

        return view('cast.edit', compact('cast'));
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
        $request->validate([
            'nama'=>'required|max:45',
            'umur'=>'required',
            'bio'=>'required'
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'nama.max'=> 'Karakter tidak boleh dari 45',
            'umur.required'=> "Umur harus diisi",
            'bio.required'=> "Bio tidak boleh kosong"
        ]
    );

    $cast = Cast::find($id);
 
    $cast->nama = $request['nama'];
    $cast->umur = $request['umur'];
    $cast->bio = $request['bio'];
    
    $cast->save();

    return redirect('/cast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $cast = Cast::find($id);
    $cast->delete();
    return redirect('/cast');
    }
}
