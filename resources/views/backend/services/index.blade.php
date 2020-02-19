@extends('layouts.base')

@section('title','Services')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <div class="d-flex justify-content-between align-content-center">
                            <h3 class="m-0  text-white">Liste des services</h3>
                            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal">Ajouter un service</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Libelle</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->libelle}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#modifier-{{$service->id}}"><i class="fas fa-fw fa-pen"></i></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-{{$service->id}}"><i class="fas fa-fw fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>



                                        <!-- modifer -->
                                        <div class="modal fade" id="modifier-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="modifier-{{$service->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modifier-{{$service->id}}Label">Modifier un service</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('service.update',$service->id)}}" method="post">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="libelle">Libellé</label>
                                                                    <input type="text" name="libelle" id="libelle" value="{{$service->libelle}}" class="form-control" required>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-success">Modifier</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Supprimé -->
                                        <div class="modal fade" id="supprimer-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="supprimer-{{$service->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="supprimer-{{$service->id}}Label">Supprimer {{$service->nom}} {{$service->prenom}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('service.delete',$service->id)}}" method="post">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('DELETE')
                                                           <h3 class="text-danger text-center">Voulez vous vraiment supprimé {{$service->libelle}} ?</h3>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NON</button>
                                                            <button type="submit" class="btn btn-success">OUI</button>
                                                        </div>

                                                    </form>
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



    <!-- Ajouter -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('service.store')}}" method="post">
                    <div class="modal-body">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="libelle">Libellé</label>
                                <input type="text" name="libelle" id="libelle"  class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
