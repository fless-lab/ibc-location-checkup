@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un Client {{ $type == 'physical' ? 'Physique' : 'Moral' }}</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.storeCustomer', $type) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                        @if($type == 'physical')
                            <div class="form-group">
                                <label >Photo</label>
                                <input type="file" name="photo">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label>
                                <input type="text" class="form-control" name="name" placeholder="Entrez votre nom et prénoms" required>
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" class="form-control" name="telephone" placeholder="Entrez votre numero de téléphone" required>
                            </div>
                            <div class="form-group">
                                <label>Numero CNI</label>
                                <input type="text" class="form-control" name="cni" placeholder="Entrez votre numero de CNI" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label>Confirmation de Mot de passe</label>
                                <input type="password" class="form-control" id="confirm" placeholder="Confirmez votre mot de passe" required>
                                <br>
                                <p id="message" style="font-style: italic; font-size: 12px"></p>
                            </div>
                            <div class="form-group">
                                <label>Adresse</label>
                                <br>
                                <textarea name="address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Actif</label>
                                <br>
                                <input type="radio" name="active" value="1" checked> Oui
                                <input type="radio" name="active" value="0"> Non
                            </div>
                        @else
                                <div class="form-group">
                                    <label >Photo</label>
                                    <input type="file" name="photo">
                                </div>
                                <div class="form-group">
                                    <label>Nom Société</label>
                                    <input type="text" class="form-control" name="name" placeholder="Entrez le nom de la société" required>
                                </div>
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" name="telephone" placeholder="Entrez votre numero de téléphone" required>
                                </div>
                                <div class="form-group">
                                    <label>Personne ressource</label>
                                    <input type="text" class="form-control" name="resource_name" placeholder="Entrez le nom de la personne ressource">
                                </div>
                                <div class="form-group">
                                    <label>Numero personne ressource</label>
                                    <input type="text" class="form-control" name="resource_num" placeholder="Entrez le numero de la personne ressource">
                                </div>
                                <div class="form-group">
                                    <label>Numero opérateur économique</label>
                                    <input type="text" class="form-control" name="operator_num" placeholder="Entrez le numero de l'opérateur économique">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirmation de Mot de passe</label>
                                    <input type="password" class="form-control" id="confirm" placeholder="Confirmez votre mot de passe" required>
                                    <br>
                                    <p id="message" style="font-style: italic; font-size: 12px"></p>
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <br>
                                    <textarea name="address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Actif</label>
                                    <br>
                                    <input type="radio"  name="active" value="1"> Oui
                                    <input type="radio"  name="active" value="0"> Non
                                </div>
                        @endif



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