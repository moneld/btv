@extends('layouts.base')

@section('title','Liste des tickets')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <div class="d-flex justify-content-center align-content-center">
                            <h3 class="m-0  text-white">{{$liste->description}} </h3>
                        </div>
                    </div>
                    <div class="card-body">
                     

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Description :</h3>
                                <p>{{$liste->description}}</p>
                                <h3>Emplacement :</h3>
                                <p>{{$liste->emplacement}}</p>
                                <h3>Lieu du dépot/Catégorie anomalie :</h3>
                                <p>{{$liste->lieu_depot}}</p>
                                <h3>Date :</h3>
                                <p>{{$liste->date}}</p>
                                <h3>Type :</h3>
                                <p>{{$liste->type}}</p>
                            
        
                            </div>
                            <div class="col-md-6">
                                <h3>Affecter :</h3>
                                <p>{{$liste->affecter}}</p>
        
                                <h3>Statut :</h3>
                                <p>
                                    @if($liste->statut === 0)
                                        <span class="badge badge-warning small">En cours</span>
                                    @elseif($liste->statut === 1)
                                        <span class="badge badge-success small">Terminé</span>
                                    @elseif($liste->statut === 2)
                                        <span class="badge badge-danger small">Rejeté</span>
                                    @endif
                                </p>
                                <h3>Image </h3>
                                <img src="{{asset('assets/img/logo/logo.png')}}" alt="" srcset="">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
