@extends('layouts.base')

@section('title','Utilisateurs')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <div class="d-flex justify-content-between align-content-center">
                            <h3 class="m-0  text-white">Gestion des droits</h3>
                            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal">Ajouter un nouvel utilisateur</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Date de naissance</th>
                                    <th>Service</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->nom}}</td>
                                            <td>{{$user->prenom}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->date_naissance}}</td>
                                            <td>{{$user->service->libelle ?? 'Admin'}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
{{--
                                                    <a href="#" class="btn btn-primary" ><i class="fas fa-fw fa-eye"></i></a>
--}}
                                                    <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#modifier-{{$user->id}}"><i class="fas fa-fw fa-pen"></i></a>
                                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-{{$user->id}}"><i class="fas fa-fw fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>



                                        <!-- modifer -->
                                        <div class="modal fade" id="modifier-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modifier-{{$user->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modifier-{{$user->id}}Label">Ajouter un nouvel utilisateur</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('user.update',$user->id)}}" method="post">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="nom">Nom</label>
                                                                    <input type="text" name="nom" id="nom" value="{{$user->nom}}" class="form-control" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="prenom">Prénom</label>
                                                                    <input type="text" name="prenom" id="prenom" value="{{$user->prenom}}"  class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" name="email" id="email" value="{{$user->email}}"  class="form-control" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="date_naissance">Date de naissance</label>
                                                                    <input type="date" name="date_naissance" id="date_naissance" value="{{$user->date_naissance}}"  class="form-control" required>
                                                                </div>
                                                            </div>


                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="service">Service</label>
                                                                    <select name="service_id" id="service_id" class="form-control" >
                                                                        @foreach($services as $service)
                                                                         <option value="{{$service->id}}" {{($user->service !== null && $service->id === $user->service->id) ? 'selected' : '' }}>{{$service->libelle}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="role">Role</label>
                                                                    <select name="role" id="role" class="form-control" >
                                                                        <option value="user" selected> Utilisateur</option>
                                                                        <option value="admin" selected> Administrateur</option>
                                                                    </select>

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
                                        <div class="modal fade" id="supprimer-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="supprimer-{{$user->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="supprimer-{{$user->id}}Label">Supprimer {{$user->nom}} {{$user->prenom}} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('user.delete',$user->id)}}" method="post">
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('DELETE')
                                                           <h3 class="text-danger text-center">Voulez vous vraiment supprimé {{$user->nom}} {{$user->prenom}} ?</h3>

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
                <form action="{{route('user.store')}}" method="post">
                    <div class="modal-body">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="service">Service</label>
                                <select name="service_id" id="service_id" class="form-control" >
                                    <option value="" selected> Admin</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->libelle}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" >
                                    <option value="user" selected> Utilisateur</option>
                                    <option value="admin" selected> Administrateur</option>
                                </select>

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
