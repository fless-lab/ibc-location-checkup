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
                    <form role="form" action="{{ route('intranet.updateReservation', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Client</label>
                                <br>
                                <select name="user_id" id="">
                                    <br>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Véhicule</label>
                                <br>
                                <select name="car_id" id="">
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}"><strong>{{ $car->mark->name }}</strong> - {{ $car->carmodel->name }} - {{ $car->cartype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Chauffeur</label>
                                <br>
                                <select name="driver_id" id="">
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}" {{ $driver->id == $reservation->driver_id ? 'selected' : '' }}>{{ $driver->id }} - {{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de début</label>
                                <input type="text" value="{{ $reservation->date_start }}" name="date_start" class="datepicker form-control"  placeholder="Entrez la date de début" required>
                            </div>
                            <div class="form-group">
                                <label>Date de retour</label>
                                <input type="text" value="{{ $reservation->date_back }}" name="date_back" class="datepicker form-control"  placeholder="Entrez la date de retour" required>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label>Remise</label>--}}
                                {{--<input type="text" value="{{ $reservation->discount }}" name="discount" class="form-control"  placeholder="Définir une remise en %">--}}
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