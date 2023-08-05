@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier une Location</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.updateLeasing', $leasing->id) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Client</label>
                                <br>
                                <select name="user_id" id="">
                                    <br>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $leasing->user_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Véhicule</label>
                                <br>
                                <select name="car_id" id="">
                                    @foreach($cars as $car)
                                        <option value="{{ $car->id }}" {{ $leasing->car_id == $car->id ? 'selected' : '' }}><strong>{{ $car->mark->name }}</strong> - {{ $car->carmodel->name }} - {{ $car->cartype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Chauffeur</label>
                                <br>
                                <select name="driver_id" id="">
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}" {{ $driver->id == $leasing->driver_id ? 'selected' : '' }}>{{ $driver->id }} - {{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de retour</label>
                                <input type="text" value="{{ $leasing->date_back }}" name="date_back" class="datepicker form-control"  placeholder="Entrez la date de retour">
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label>Montant</label>--}}
                                {{--<input type="text" value="{{ $leasing->amount }}" name="amount" class="form-control"  placeholder="Définir le montant">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label>Caution</label>--}}
                                {{--<input type="text" value="{{ $leasing->bail }}" name="bail" class="form-control"  placeholder="Définir la caution">--}}
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