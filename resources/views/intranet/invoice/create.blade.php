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
                    <form role="form" action="intranet/car">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Marque</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrez la marque">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type</label>
                                <select name="cartype_id" id="">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Modèle</label>
                                <select name="cartype_id" id="">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="text" class="form-control"  placeholder="Entrez la couleur">
                            </div>
                            <div class="form-group">
                                <label>Immatriculation</label>
                                <input type="text" class="form-control"  placeholder="Numero d'immatriculation">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Disponible</label>
                                <input type="checkbox" name="available" value="1"> Oui
                                <input type="checkbox" name="available" value="0"> Non
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Etat</label>
                                <select name="carstate_id" id="">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Images</label>
                                <input type="file" name="" multiple>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Actif</label>
                                <input type="checkbox"  name="active" value="1"> Oui
                                <input type="checkbox"  name="active" value="0"> Non
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