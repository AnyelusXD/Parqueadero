@extends('adminlte::page')

@section('title', )

@section('content_header')
    <h1>PARQUEADERO</h1>
@stop

@section('content')
<div class="container-fluid">

            <div class="row">

                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="card text-white bg-success">
                            <div class="card-body pb-0">
                                <button class="btn btn-transparent p-0 float-right" type="button">
                                <i class="fa fa-car fa-care-up fa-4x"></i>
                                </button>
                                <div class="text-value h2"><strong>Ingreso del Vehiculo</strong></div>
                                <div class="h2">Registro de Entrada</div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                <a href="{{route('vagas.create')}}" class="small-box-footer h4">Ingresar<i class="fa fa-arrow-circle-up"></i></a>
                            </div>

                        </div>
                        </div>

                        <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="card text-white bg-warning">
                            <div class="card-body pb-0">
                                <button class="btn btn-transparent p-0 float-right" type="button">
                                <i class="fa fa-dollar-sign fa-4x"></i>
                                </button>
                                <div class="text-value h2"><strong>SALIDA DEL PARQUEADERO </strong></div>
                                <div class="h2">Salida del Vehiculo/Cobro</div>
                            </div>
                            <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
                                <a href="{{route('vagas.index')}}" class="small-box-footer h4">Salida <i class="fa fa-arrow-circle-down"></i></a>
                            </div>

                        </div>


                        </div><!-- ./col -->

            </div>


                    <!-- Estadísticas gráficos -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- compras - meses -->

                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center">Informacion General</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="compras">
                                        </canvas>
                                    </div>
                                </div>

                        </div>

                        </div><!--col-md-6-->

                        <div class="col-md-6">

                            <!-- ventas - meses -->

                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="text-center">Numeros de Contacto</h4>
                                </div>
                                <div class="card-content">
                                    <div class="ct-chart">
                                        <canvas id="ventas">
                                        </canvas>
                                    </div>
                                </div>

                            </div>


                        </div><!-- col-md-6 -->

                    </div><!--row-->

        </div>


    </main>

</div>
</main>

@stop