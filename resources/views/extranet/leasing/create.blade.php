@extends('extranet.layouts.app')

@section('content')
    <section class="bg-light" id="leasing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Enregistrer une Location</h2>
                    <h3 class="section-subheading text-muted">Votre durée de location déterminera le montant total à payer</h3>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <form role="form" action="{{ route('extranet.storeLeasing') }}" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="hidden" name="car_id" value="{{ $currentCar->id }}">
                            <input type="hidden" name="user_id" value="{{ $currentCustomer->id }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Chauffeur</label>
                                    <br>
                                    <select name="driver_id" id="">
                                        <option value="" selected>Selectionner un chauffeur</option>
                                        @foreach($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->id }} - {{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date de retour</label>
                                    <input type="text" name="date_back" class="datepicker form-control"  placeholder="Entrez la date de retour">
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<label>Montant</label>--}}
                                {{--<input type="text" name="amount" class="form-control"  placeholder="Définir le montant">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                {{--<label>Caution</label>--}}
                                {{--<input type="text" name="bail" class="form-control"  placeholder="Définir la caution">--}}
                                {{--</div>--}}

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection