@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Enregistrer une Location</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.storeLeasing') }}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="exampleInputFile">Chauffeur</label>
                                <br>
                                <select name="driver_id" id="">
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->id }} - {{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de retour</label>
                                <input type="text" name="date_back" class="datepicker form-control"  placeholder="Entrez la date de retour" required>
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
    </section>
@endsection