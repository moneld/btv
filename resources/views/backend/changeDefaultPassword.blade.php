@extends('layouts.base')

@section('title','Changer le mot de passe')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <div class="d-flex justify-content-center align-content-center">
                            <h3 class="m-0  text-white">Changez votre mot de passe</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.changePassword')}}" method="post">
                            @csrf


                            <div class="fom-group mt-2">
                                <label for="new_password">Nouveau mot de passe</label>
                                <input type="password" name="password" id="new_password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="fom-group mt-2">
                                <label for="confirm_password">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" required>
                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group  mt-2">
                                <button type="submit" class="btn btn-success">Changer le mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
