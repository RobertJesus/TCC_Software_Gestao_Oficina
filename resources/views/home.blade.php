@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content_header')
    <h1>Dashboard</h1>
    {{ Auth::user()->name }}
@stop

@section('content')
    <p>Seja Bem Vindo!</p>
@stop