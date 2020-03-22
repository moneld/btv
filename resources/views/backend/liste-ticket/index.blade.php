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
                       
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <a class="nav-item nav-link active" id="nav-encours-tab" data-toggle="tab" href="#nav-encours" role="tab" aria-controls="nav-encours" aria-selected="true">En cours</a>
                            <a class="nav-item nav-link" id="nav-archive-tab" data-toggle="tab" href="#nav-archive" role="tab" aria-controls="nav-archive" aria-selected="false">Archivé</a>
                              <a class="nav-item nav-link" id="nav-rejete-tab" data-toggle="tab" href="#nav-rejete" role="tab" aria-controls="nav-rejete" aria-selected="false">Rejeté</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <br>
                            <div class="tab-pane fade show active" id="nav-encours" role="tabpanel" aria-labelledby="nav-encours-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
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
        
                                        @foreach($listes->where('statut',0) as $liste)
                                            <tr>
                                                <td>{{$liste->description}}</td>
                                                <td>{{$liste->emplacement}}</td>
                                                <td>{{$liste->lieu_depot}}</td>
                                                <td>{{$liste->date}}</td>
                                                <td>{{$liste->type}}</td>
                                                <td>
                                                    <span class="badge badge-warning small">En cours</span>

                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('liste-ticket.show',$liste->id)}}" class="btn btn-primary" ><i class="fas fa-fw fa-eye"></i></a>
                                                        <a href="{{route('liste-ticket.valider',$liste->id)}}" class="btn btn-success"><i class="fas fa-fw fa-check"></i></a>
                                                        <a href="{{route('liste-ticket.rejete',$liste->id)}}" class="btn btn-danger"><i class="fas fa-fw fa-ban"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
        
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-archive" role="tabpanel" aria-labelledby="nav-archive-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
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
        
                                        @foreach($listes->where('statut',1) as $liste)
                                            <tr>
                                                <td>{{$liste->description}}</td>
                                                <td>{{$liste->emplacement}}</td>
                                                <td>{{$liste->lieu_depot}}</td>
                                                <td>{{$liste->date}}</td>
                                                <td>{{$liste->type}}</td>
                                                <td>
                                                    <span class="badge badge-success small">Archivé</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('liste-ticket.show',$liste->id)}}" class="btn btn-primary" ><i class="fas fa-fw fa-eye"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
        
        
                                        </tbody>
                                    </table>
                                 </div>
                            </div>
                            <div class="tab-pane fade" id="nav-rejete" role="tabpanel" aria-labelledby="nav-rejete-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
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
        
                                        @foreach($listes->where('statut',2) as $liste)
                                            <tr>
                                                <td>{{$liste->description}}</td>
                                                <td>{{$liste->emplacement}}</td>
                                                <td>{{$liste->lieu_depot}}</td>
                                                <td>{{$liste->date}}</td>
                                                <td>{{$liste->type}}</td>
                                                <td>
                                                    <span class="badge badge-danger small">Rejeté</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{route('liste-ticket.show',$liste->id)}}" class="btn btn-primary" ><i class="fas fa-fw fa-eye"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
        
        
                                        </tbody>
                                    </table>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
