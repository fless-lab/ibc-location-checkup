@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un véhicule</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.storeCar') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Marque</label>
                                <br>
                                <select name="mark_id" id="">
                                    @foreach($marks as $mark)
                                        <option value="{{ $mark->id }}">{{ $mark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>
                                <br>
                                <select name="cartype_id" id="">
                                    @foreach($cartypes as $cartype)
                                        <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Modèle</label>
                                <br>
                                <select name="carmodel_id" id="">
                                    @foreach($carmodels as $carmodel)
                                        <option value="{{ $carmodel->id }}">{{ $carmodel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Catégorie</label>
                                <br>
                                <select name="category_id" id="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Etat</label>
                                <br>
                                <select name="carstate_id" id="">
                                    @foreach($carstates as $carstate)
                                        <option value="{{ $carstate->id }}">{{ $carstate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Année</label>
                                <input type="text" class="form-control" name="year" placeholder="Entrez l'année">
                            </div>
                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="text" class="form-control" name="color" placeholder="Entrez la couleur" required>
                            </div>
                            <div class="form-group">
                                <label>Immatriculation</label>
                                <input type="text" class="form-control" name="registration" placeholder="Numero d'immatriculation" required>
                            </div>
                            <div class="form-group">
                                <label>Montant par jour</label>
                                <input type="text" class="form-control" name="amount" placeholder="Entrez le montant par jour" required>
                            </div>
                            <div class="form-group">
                                <label>Montant Lomé - Accra - Lomé par jour</label>
                                <input type="text" class="form-control" name="lome_accra" placeholder="Entrez le montant par jour" required>
                            </div>
                            <div class="form-group">
                                <label>Montant Lomé - Cotonou - Lomé par jour</label>
                                <input type="text" class="form-control" name="lome_cotonou" placeholder="Entrez le montant par jour" required>
                            </div>
                            <div class="form-group">
                                <label>Montant par heure</label>
                                <input type="text" class="form-control" name="amount_hour" placeholder="Entrez le montant horaire" required>
                            </div>
                            <div class="form-group">
                                <label>Caution</label>
                                <input type="text" class="form-control" name="bail" placeholder="Entrez la caution (FCFA)" required>
                            </div>
                            <div class="form-group">
                                <label>Nombre de places</label>
                                <input type="text" class="form-control" name="place" placeholder="Entrez le nombre de places">
                            </div>
                            <div class="form-group">
                                <label>Nombre de bagages</label>
                                <input type="text" class="form-control" name="baggage" placeholder="Entrez le nombre de bagages">
                            </div>
                            <div class="form-group">
                                <label>Nombre de portes</label>
                                <input type="text" class="form-control" name="door" placeholder="Entrez le nombre de portes">
                            </div>
                            <div class="form-group">
                                <label>Kilométrage</label>
                                <input type="text" class="form-control" name="kilometrage" placeholder="Entrez le kilométrage actuel">
                            </div>
                            <div class="form-group">
                                <label>Carburant</label>
                                <br>
                                <select name="fuel" id="">
                                    <option value="Diesel" >Diesel</option>
                                    <option value="Essence" >Essence</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Niveau d'essence</label>
                                <input type="text"  class="form-control" name="gasoline" placeholder="Entrez le niveau d'essence actuel">
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                                <textarea name="description" id="" style="width: 100%; height: 200px"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Dégâts existant</label><br>
                                <textarea name="damage" id="" style="width: 100%; height: 200px"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Disponible</label>
                                <br>
                                <input type="radio" name="available" value="1" checked> Oui
                                <input type="radio" name="available" value="0"> Non
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Actif</label>
                                <br>
                                <input type="radio"  name="active" value="1" checked> Oui
                                <input type="radio"  name="active" value="0"> Non
                            </div>
                            <div class="form-group">
                                <label >Images</label>
                                <input type="file" name="images[]" multiple>
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