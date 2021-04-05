<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Client;
use App\Models\Bahia;
use App\Models\Parking;
use DateTime;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function calculoTempo($entry_time, $exit_time)
    {
        $entry_time_convert = new DateTime($entry_time);
        $exit_time_convert = new DateTime($exit_time);

        $time_dill = $exit_time_convert->diff($entry_time_convert);

        //Converter os valores em horas
        $hours_time_result = $time_dill->m*30*24 + $time_dill->d*24 + $time_dill->h +
        $time_dill->i/60 + $time_dill->s/60/60;

        return $hours_time_result;
    }

    public function index()
    {
        $title = 'Bahias';
        $caption = 'Control de Bahias';

        $vacancies = Vacancy::all();

        return view('Admin.Vacancy.index', compact('title','caption', 'vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Bahias';
        $caption = 'Entrada de vehiculos';
        $action = route('vagas.store');
        $hoursTime = date('Y-m-d H:i:s');

        $clients = Client::all();
        $bahias = Bahia::all();
        $parkings = Parking::all();

        return view('Admin.Vacancy.form', compact('title','caption','action','clients', 'hoursTime', 'parkings','bahias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::find($request->client_id);
        $client->occupation = 1;
        $client->save();
      
        $bahia = Bahia::find($request->bahia_id);
        $bahia->estado = "OCUPADO";
        $bahia->save();

        Vacancy::create($request->all());
        $request->session()->flash('sucesso', "Ingreso Correcto del Vehiculo");
        return redirect()->route('vagas.index');
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
    public function edit ($id)
    {
        $vacancy = Vacancy::find($id);
        $action = route('vagas.update', $vacancy->id);
        $hoursTime = date('Y-m-d H:i:s');

        $priceFinal = $this->calculoTempo($vacancy->entry_time, $hoursTime)*$vacancy->parking->price_hours;

        $title = 'Vagas';
        $caption = 'Salida de vehiculo';
        return view('Admin.Vacancy.exit', compact('title','caption','vacancy','action', 'hoursTime', 'priceFinal'));
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
        $vacancy = Vacancy::find($id);

        //Calcular tiempo
        $priceFinal = $this->calculoTempo($vacancy->entry_time, $request->exit_time)*$vacancy->parking->price_hours;
        $vacancy->price_total = $priceFinal;
        $vacancy->save();

        $bahia = Bahia::find($vacancy->bahia_id);
        $bahia->estado = "DISPONIBLE";
        $bahia->save();

        //cambio de estado
        $client = Client::find($vacancy->client_id);
        $client->occupation = 0;
        $client->save();

        $vacancy->update($request->all());
        $request->session()->flash('sucesso', "Se ha realizado Correctamente la Salida del Vehiculo");
        return redirect()->route('vagas.index');
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
