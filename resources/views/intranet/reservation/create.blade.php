@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Enregistrer une Reservation</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.storeReservation') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Client</label>
                                <br>
                                <select name="user_id" id="" @if($currentCustomer) disabled @endif>
                                    <br>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" @if($currentCustomer AND $currentCustomer->id == $customer->id) selected @endif>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @if($currentCustomer)
                                    <input type="hidden" value="{{ $currentCustomer->id }}" name="user_id">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Véhicule</label>
                                <br>
                                <select name="car_id" id="" @if($currentCar) disabled @endif>
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}" @if($currentCar AND $currentCar->id == $car->id) selected @endif>{{ $car->id }} - <strong>{{ $car->mark->name }}</strong> - {{ $car->carmodel->name }} - {{ $car->cartype->name }}</option>
                                    @endforeach
                                </select>
                                @if($currentCar)
                                    <input type="hidden" value="{{ $currentCar->id }}" name="car_id">
                                @endif
                            </div>
                            <label for=""><b>Express</b></label>
                            <div class="form-group">
                                <input type="radio" name="express" value="lome_accra"> Lomé - Accra - Lomé
                            </div>
                            <div class="form-group">
                                <input type="radio" name="express" value="lome_cotonou"> Lomé - Cotonou - Lomé
                            </div>
                            <div class="form-group">
                                @if($errors->any())
                                    <h6 style="color: orangered"> <i class="fas fa-exclamation-triangle"></i> {{$errors->first()}}</h6>
                                @endif
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
                                <b id="caution"></b>
                                <p><i style="font-size: 12px; color: gray">* Malgré les frais de caution, le véhicule peut ne pas être loué</i></p>
                            </div>
                            <div class="form-group" id="tarifBloc" style="color: #2caadd">
                                <label>Tarif journalier du chauffeur :</label>
                                <b>{{ $rate->no_driver_rate }} FCFA</b>
                            </div>
                            <div class="form-group">
                                <label>Date de début</label>
                                <input type="text" name="date_start" class="datepicker form-control"  placeholder="Entrez la date de début" required>
                            </div>
                            <div class="form-group">
                                <label>Date de retour</label>
                                <input type="text" name="date_back" class="datepicker form-control"  placeholder="Entrez la date de retour" required>
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

        $('[name="car_id"]').change(function(){
            $.post("{{ route('intranet.bailCarAjax') }}", {_token : "{{ csrf_token() }}", id : $(this).val()}, function(rsp){
                $('#caution').html(rsp+' FCFA')
            })
        }).trigger('change');
    </script>
@endpush
