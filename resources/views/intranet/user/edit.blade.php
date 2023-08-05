@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier un Utilisateur</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.updateUser', $user->id) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="box-body">

                            <div class="form-group">
                                <label >Photo</label>
                                <input type="file" name="photo">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" name="name" placeholder="Entrez votre nom et prénoms">
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" value="{{ $user->telephone }}" class="form-control" name="telephone" placeholder="Entrez votre numero de téléphone">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" name="email" placeholder="Entrez votre email">
                            </div>
                            <div class="form-group">
                                <label>Rôle</label>
                                <br>
                                <select name="role" id="">
                                    <option value="secretaire" {{ $user->role == 'secretaire' ? 'selected' : '' }}>Secrétaire</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                            </div>

                            <div class="form-group">
                                <label>Adresse</label>
                                <br>
                                <textarea name="address">{{ $user->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Actif</label>
                                <br>
                                <input type="radio" name="active" value="1" {{ $user->active ? 'checked' : '' }}> Oui
                                <input type="radio" name="active" value="0" {{ !$user->active ? 'checked' : '' }}> Non
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection