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
                            <h3 class="m-0  text-white">Liste des tickets</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Emplacement</th>
                                    <th>Lieu du dépot/Catégorie anomalie</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($listes as $liste)
                                    <tr>
                                        <td>{{$liste->description}}</td>
                                        <td>{{$liste->emplacement}}</td>
                                        <td>{{$liste->lieu_depot}}</td>
                                        <td>{{$liste->date}}</td>
                                        <td>{{$liste->type}}</td>
                                        <td>
                                          @if($liste->statut === 0)
                                                <span class="badge badge-warning small">En cours</span>
                                              @else
                                                <span class="badge badge-success small">Terminé</span>
                                           @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{route('liste-ticket.show',$liste->id)}}" class="btn btn-primary" ><i class="fas fa-fw fa-eye"></i></a>
                                                @if($liste->statut === 0)
                                                    <a href="{{route('liste-ticket.valider',$liste->id)}}" class="btn btn-success"><i class="fas fa-fw fa-check"></i></a>
                                                @endif
                                                <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#image-{{$liste->id}}" ><i class="fas fa-fw fa-search"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Afficher image -->
                                    <div class="modal fade" id="image-{{$liste->id}}" tabindex="-1" role="dialog" aria-labelledby="image-{{$liste->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="image-{{$liste->id}}Label">Image </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{asset('assets/img/logo/logo.png')}}" alt="" srcset="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
