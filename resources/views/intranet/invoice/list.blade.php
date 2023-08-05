@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            {{--<div style="padding: 15px; float: right">--}}
                {{--<a href="{{ route('intranet.createInvoice', 'reservation') }}"><button class="btn btn-primary">Enregistrer une Sous-traitance pour Reservation</button></a>--}}
                {{--&nbsp; &nbsp;--}}
                {{--<a href="{{ route('intranet.createInvoice', 'leasing') }}"><button class="btn btn-primary">Enregistrer une Sous-traitance pour Location</button></a>--}}
            {{--</div>--}}
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Factures</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date de génération</th>
                                <th>Numéro Facture</th>
                                <th>Pour une</th>
                                <th>Client</th>
                                <th>Véhicule</th>
                                <th>Mode</th>
                                <th>Montant Total (FCFA)</th>
                                <th>Télécharger</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>
                                        {{ $invoice->created_at }}
                                    </td>
                                    <td>
                                        {{ $invoice->numfac }}
                                    </td>
                                    <td>
                                        @if($invoice->reservation_id)
                                            <b>RESERVATION</b>
                                        @else
                                            <b>LOCATION</b>
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->reservation_id)
                                            <a href="{{ route('intranet.showCustomer', [$invoice->reservation->user_id, $invoice->reservation->user->type]) }}" target="_blank">{{ $invoice->reservation->user->name }}</a>
                                        @else
                                            <a href="{{ route('intranet.showCustomer', [$invoice->leasing->user_id, $invoice->leasing->user->type]) }}" target="_blank">{{ $invoice->leasing->user->name }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->reservation_id)
                                            <a href="{{ route('intranet.showCar', $invoice->reservation->car_id) }}" target="_blank">{{ $invoice->reservation->car->mark->name .' - '. $invoice->reservation->car->carmodel->name. ' - ' . $invoice->reservation->car->cartype->name }}</a>
                                        @else
                                            <a href="{{ route('intranet.showCar', $invoice->leasing->car_id) }}" target="_blank">{{ $invoice->leasing->car->mark->name .' - '. $invoice->leasing->car->carmodel->name. ' - ' . $invoice->leasing->car->cartype->name }}</a>
                                        @endif
                                    </td>
                                    <td>{{ $invoice->mode }}</td>
                                    <td>{{ $invoice->total_amount }}</td>
                                    <td>
                                        @if($invoice->reservation_id)
                                            <a href="{{ route('intranet.downloadInvoice', [$invoice->reservation_id, $invoice->mode, 'reservation']) }}" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                        @else
                                            <a href="{{ route('intranet.downloadInvoice', [$invoice->leasing_id, $invoice->mode, 'leasing']) }}" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection