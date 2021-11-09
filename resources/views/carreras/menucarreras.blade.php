@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Menu Carreras</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="grid">
                                <a href="{{URL::to('/alumnos')}}"><img src="{{url('img/sistemas.jpg')}}" alt="Logo"></a>
                                <img src="{{url('img/Ambiental.jpg')}}" >
                                <img src="{{url('img/ing-agronomo-c.jpg')}}">
                                <img src="{{url('img/ingenieria-electronica-de-microprocesadores-peq.jpg')}}">
                                <img src="{{url('img/sistemas.jpg')}}">
                                <img src="{{url('img/sistemas.jpg')}}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

