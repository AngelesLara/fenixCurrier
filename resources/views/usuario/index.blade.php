@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
    <h1>LISTA DE USUARIOS</h1>
@stop

@section('content')
    @livewire('admin.usuario-index')
@stop