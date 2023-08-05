@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier les Taux</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.updateRate', $rate->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {!! method_field('PUT') !!}
                        <div class="box-body">
                            <h3>Taux</h3>
                            <div class="form-group">
                                <label>TVA</label>
                                <input value="{{ $rate->tva }}" type="text" class="form-control" name="tva" placeholder="Entrez votre TVA">
                            </div>
                            <div class="form-group">
                                <label>Taux de Réduction</label>
                                <input value="{{ $rate->reduction_rate }}" type="text" class="form-control" name="reduction_rate" placeholder="Entrez votre taux de réduction">
                            </div>
                            <div class="form-group">
                                <label>Taux de Réduction sans Chauffeur</label>
                                <input value="{{ $rate->no_driver_rate }}" type="text" class="form-control" name="reduction_rate" placeholder="Entrez votre taux de réduction sans chauffeur">
                            </div>
                            <div class="form-group">
                                <label>Taux de Caution</label>
                                <input value="{{ $rate->bail_rate }}" type="text" class="form-control" name="bail_rate" placeholder="Entrez votre taux de caution">
                            </div>
                            <br>
                            <h3>Kilométrage</h3>
                            <div class="form-group">
                                <label>Kilométrage à respecter</label>
                                <input value="{{ $rate->kilometer }}" type="text" class="form-control" name="kilometer" placeholder="Entrez votre nombre de kilomètre">
                            </div>
                            <div class="form-group">
                                <label>Montant supplémentaire en cas d'abus de kilométrage</label>
                                <input value="{{ $rate->sup_amount }}" type="text" class="form-control" name="sup_amount" placeholder="Entrez le montant">
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