@extends('adminlte::page')

@section('title', 'PANEL CONTROL')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">DASHBOARD DE CONTROL</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-box"></i> <!-- Icono personalizado para paquetes -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Paquetes</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['paquetes'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user-tie"></i> <!-- Icono personalizado para empleados -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Empleados</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['empleados'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-user"></i> <!-- Icono personalizado para clientes -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Clientes</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['clientes'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-shipping-fast"></i> <!-- Icono personalizado para envíos -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Envíos</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['envios'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-light">
                    <i class="fas fa-map-marker-alt"></i> <!-- Icono personalizado para destinos -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Destinos</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['destinos'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user"></i> <!-- Icono personalizado para encargados de camiones -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h3 class="text-center">Total Encargados de Camiones</h3>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['encargados'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-dark">
                    <i class="fas fa-road"></i> <!-- Icono personalizado para salidas -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Salidas</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['salidas'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="fas fa-truck"></i> <!-- Icono personalizado para salidas -->
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h2 class="text-center">Total Camiones</h2>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center">{{ $totales['trucks'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
@stop

@section('js')
@stop
