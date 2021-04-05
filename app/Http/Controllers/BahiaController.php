<?php

namespace App\Http\Controllers;

use App\Models\Bahia;
use Illuminate\Http\Request;

class BahiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('search'));

            $bahias = Bahia::where('name', 'LIKE', '%' .$query. '%')
            ->orderBy('id', 'asc')
            ->paginate(20);
            return view('bahia.index', ['bahias'=>$bahias, 'search'=>$query] );
        }
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
        $bahia = new Bahia();

        //campos
        $bahia->name = request('name');
        $bahia->estado = ('DISPONIBLE');
        $bahia->save();
        return redirect('/bahia')->with('flash', 'Elemento guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahia  $bahia
     * @return \Illuminate\Http\Response
     */
    public function show(Bahia $bahia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahia  $bahia
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahia $bahia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahia  $bahia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bahia = Bahia::findOrFail($id);

        //campos
        $bahia->name = $request->get('name');
        $bahia->estado = $request->get('estado');

        $bahia->update();
        return redirect('/bahia')->with('flash', 'Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahia  $bahia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahia = Bahia::findOrFail($id);
        $bahia->delete();
        return redirect('/bahia')->with('flash', 'Elemento eliminado con exito');
    }
}
