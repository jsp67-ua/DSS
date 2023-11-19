@extends('theme.main')

@section('title', 'CONFIRMACIÓN')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Proceeder con la compra</h2></div>
    <div class="card-body">
        <br/>
        <br/>
        <livewire:check-cart />
    </div>
</div>
@endsection