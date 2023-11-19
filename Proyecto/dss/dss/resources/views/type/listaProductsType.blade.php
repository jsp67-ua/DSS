@extends('theme.main')

@section('title', 'LISTADO DE PRODUCTOS')

@section('content')

    <livewire:components-products-search :type="$type"/>

@endsection

