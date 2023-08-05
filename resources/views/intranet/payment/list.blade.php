@extends('intranet.layouts.app')

@section('content')
    <a href="{{ route('intranet.createCar') }}"><button class="btn btn-primary">Ajouter un véhicule</button></a>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ajouter un véhicule</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Actif</th>
                                <th>Marque</th>
                                <th>Type</th>
                                <th>Modèle</th>
                                <th>Couleur</th>
                                <th>Disponibilité</th>
                                <th>Etat</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
        <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection