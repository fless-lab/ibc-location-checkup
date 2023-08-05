@extends('extranet.layouts.app')

@section('content')

    @php
        $_SESSION['page_redirect'] = '';
    @endphp
    <section class="bg-light" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Enregistrer une Reservation</h2>
                    <h3 class="section-subheading text-muted">Votre durée de reservation déterminera le montant total à payer</h3>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <form role="form" action="{{ route('extranet.storeReservation') }}#reservation" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="hidden" name="car_id" value="{{ $currentCar->id }}">
                            <input type="hidden" name="user_id" value="{{ $currentCustomer->id }}">
                            <div class="box-body">
                                @if($errors->any())
                                    <h6 style="color: orangered"> <i class="fas fa-exclamation-triangle"></i> {{$errors->first()}}</h6>
                                    <br>
                                @endif
                                <label for=""><b>Express</b></label>
                                <div class="form-group">
                                    <input type="radio" name="express" value="lome_accra"> Lomé - Accra - Lomé
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="express" value="lome_cotonou"> Lomé - Cotonou - Lomé
                                </div>
                                <div class="form-group">
                                    <br>
                                    <label for="exampleInputFile"><b>Chauffeur</b></label>
                                    <br>
                                    <select name="driver_id" id="">
                                        <option value="1">- Avec chauffeur -</option>
                                        <option value="">- Sans chauffeur -</option>
                                    </select>
                                </div>
                                <div class="form-group" id="cautionBloc" style="display: none; color: #2caadd">
                                    <label>Caution :</label>
                                    <b>{{ $currentCar->bail }} FCFA</b>
                                    <p><i style="font-size: 12px; color: gray">* Malgré les frais de caution, le véhicule peut ne pas être loué</i></p>
                                </div>
                                <div class="form-group" id="tarifBloc" style="color: #2caadd">
                                    <label>Tarif journalier du chauffeur :</label>
                                    <b>{{ $rate->no_driver_rate }} FCFA</b>
                                </div>
                                <div class="form-group">
                                    <label><b>Date de début</b></label>
                                    <input type="text" @if($errors->any()) style="border: 1px solid orangered" @endif name="date_start" class="datepicker form-control"  placeholder="Entrez la date de début" required>
                                </div>
                                <div class="form-group">
                                    <label><b>Date de retour</b></label>
                                    <input type="text" @if($errors->any()) style="border: 1px solid orangered" @endif name="date_back" class="datepicker form-control"  placeholder="Entrez la date de retour" required>
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<label>Remise</label>--}}
                                {{--<input type="text" name="discount" class="form-control"  placeholder="Définir une remise en %">--}}
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

@push('scripts')
    <script>
        $('[name="driver_id"]').change(function(){
            var self = $(this).val()
            if(self === ""){
                $('#cautionBloc').show()
                $('#tarifBloc').hide()
            }else{
                $('#cautionBloc').hide()
                $('#tarifBloc').show()
            }
        })
    </script>
@endpush
