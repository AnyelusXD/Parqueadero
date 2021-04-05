<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Clientes';
        $caption = 'Lista de Vehiculos';

        $clients = Client::all();

        return view('Admin.Client.index', compact('title','caption', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Clientes';
        $caption = 'Cadastro de clientes';
        $action = route('clients.store');
        return view('Admin.Client.form', compact('title','caption','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        Client::create($request->all());
        $request->session()->flash('sucesso', "Cliente Registrado con Exito");
        return redirect()->route('clients.index');
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
        $client = Client::find($id);
        $action = route('clients.update', $client->id);

        $title = 'Cliente';
        $caption = 'Editar cliente';
        return view('Admin.Client.form', compact('title','caption','client','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());

        $request->session()->flash('sucesso', "Cliente editado con Exito");

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Client::destroy($id);
        $request->session()->flash('sucesso', "Cliente Borrado con Exito");

        return redirect()->route('clients.index');
    }
}
