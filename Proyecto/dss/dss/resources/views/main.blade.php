@extends('theme.main')

@section('title', 'ALLCOMPONENTS')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" interval=500>
  <div align="center" class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src="{{ asset('/images/ImagenDelCarroussel1.png') }}" alt="0" height="700">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="{{ asset('/images/ImagenDelCarroussel2.png') }}" alt="1" height="700">
    </div>
    <div class="carousel-item">
        <img class="d-block" src="{{ asset('/images/ImagenDelCarroussel3.png') }}" alt="1" height="700">
    </div>
  </div>
</div>
@endsection