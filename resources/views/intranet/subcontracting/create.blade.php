@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Enregistrer une Sous-traitance</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.storeSubcontracting') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            @if($type == 'reservation')
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Reservation</label>
                                    <br>
                                    <select name="reservation_id" id="">
                                        <br>
                                        @foreach($reservations as $reservation)
                                            <option value="{{ $reservation->id }}">{{ $reservation->user->name .'-'. $reservation->car->mark->name .'-'. '['.$reservation->date_start.' à '.$reservation->date_back.']' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Location</label>
                                    <br>
                                    <select name="leasing_id" id="">
                                        <br>
                                        @foreach($leasings as $leasing)
                                            <option value="{{ $leasing->id }}">{{ $leasing->user->name .'-'. $leasing->car->mark->name .'-'. '['.$leasing->created_at.' à '.$leasing->date_back.']' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Nom de la Société</label>
                                <input type="text" name="company" class="form-control"  placeholder="Entrez le nom de la société">
                            </div>
                            <div class="form-group">
                                <label>Prix de Cession</label>
                                <input type="text" name="disposal_amount" class="form-control"  placeholder="Définir le prix de la cession">
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
