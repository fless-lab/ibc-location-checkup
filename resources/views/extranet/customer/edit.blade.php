<!-- Register -->
@extends('extranet.layouts.app')

@section('content')
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Modifier votre profil</h2>
                {{--<h3 class="section-subheading text-muted">Inscrivez-vous pour accéder aux reservations et aux locations.--}}
                    {{--<br> * Le client physique sous-entend une personne indépendante.--}}
                    {{--<br> Le client moral représente une société, une entreprise, une compagnie, un groupe etc. *</h3>--}}

                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if($customer->type == 'physical')
                <form action="{{ route('extranet.updateCustomer', [$customer->id, $customer->type]) }}" method="post" id="physical" enctype="multipart/form-data">
                    @csrf
                    {!! method_field('PUT') !!}
                    <input type="hidden" name="type" value="physical">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photo</label><br>
                                <input class="form-control" name="photo" type="file" placeholder="Importez votre photo" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label><br>
                                <input class="form-control" value="{{ $customer->name }}" name="name" type="text" placeholder="Votre Nom & Prénoms *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Numero de pièce d'identité</label><br>
                                <input class="form-control" value="{{ $customer->cni }}" name="cni" type="text" placeholder="Votre CNI" >
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label><br>
                                <input class="form-control" value="{{ $customer->telephone }}" name="telephone" type="text" placeholder="Votre Téléphone" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse</label><br>
                                <input class="form-control" value="{{ $customer->address }}" name="address" type="text" placeholder="Votre adresse" >
                            </div>
                            <div class="form-group">
                                <label>Email</label><br>
                                <input class="form-control" value="{{ $customer->email }}" name="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label><br>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Votre Mot de Passe *"  data-validation-required-message="Entrez votre mot de passe SVP.">
                            </div>
                            <div class="form-group">
                                <label>Confirmation de Mot de passe</label>
                                <input type="password" class="form-control" id="confirm" placeholder="Confirmez votre mot de passe">
                                <br>
                                <p id="message" style="font-style: italic; font-size: 12px"></p>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">Modifier</button>
                        </div>
                    </div>

                </form>
                @else
                <form action="{{ route('extranet.updateCustomer', [$customer->id, $customer->type]) }}" method="post" id="moral" enctype="multipart/form-data" style="display: none">
                    @csrf
                    {!! method_field('PUT') !!}
                    <input type="hidden" name="type" value="moral">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photo</label><br>
                                <input class="form-control" name="photo" type="file" placeholder="Importez votre photo" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label><br>
                                <input class="form-control" value="{{ $customer->name }}" name="name" type="email" placeholder="Votre Nom & Prénoms *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Nom Ressource</label><br>
                                <input class="form-control" value="{{ $customer->resource_name }}" name="resource_name" type="text" placeholder="Nom de la Ressource" >
                            </div>
                            <div class="form-group">
                                <label>Numéro Ressource</label><br>
                                <input class="form-control" value="{{ $customer->resource_num }}" name="resource_num" type="text" placeholder="Numéro de la Ressource" >
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label><br>
                                <input class="form-control" value="{{ $customer->telephone }}" name="telephone" type="text" placeholder="Votre Téléphone" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro Opérateur Economique</label><br>
                                <input class="form-control" value="{{ $customer->operator_num }}" name="operator_num" type="text" placeholder="Numéro Opérateur Economique" >
                            </div>
                            <div class="form-group">
                                <label>Adresse</label><br>
                                <input class="form-control" value="{{ $customer->address }}" name="address" type="text" placeholder="Votre adresse" >
                            </div>
                            <div class="form-group">
                                <label>Email</label><br>
                                <input class="form-control" value="{{ $customer->email }}" name="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label><br>
                                <input class="form-control" id="password2" name="password" type="password" placeholder="Votre Mot de Passe *" data-validation-required-message="Entrez votre mot de passe SVP.">
                            </div>
                            <div class="form-group">
                                <label>Confirmation de Mot de passe</label>
                                <input type="password" class="form-control" id="confirm2" placeholder="Confirmez votre mot de passe">
                                <br>
                                <p id="message2" style="font-style: italic; font-size: 12px"></p>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">Modifier</button>
                        </div>
                    </div>

                </form>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
