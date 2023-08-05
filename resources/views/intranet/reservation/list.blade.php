@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createReservation') }}"><button class="btn btn-primary">Enregistrer une reservation</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Reservations</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Véhicule</th>
                                <th>Chauffeur</th>
                                <th>Date début</th>
                                <th>Date retour</th>
                                <th>Montant</th>
                                <th>Facture</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>
                                        <a href="{{ route('intranet.showCustomer', [$reservation->user->id, $reservation->user->type]) }}" target="_blank">
                                            {{ $reservation->user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            foreach ($reservation->car->carfiles as $carfile){
                                                $imageName = $carfile->name;
                                                break;
                                            }
                                        @endphp
                                        <a href="{{ route('intranet.showCar', $reservation->car->id) }}" target="_blank">
                                            {{--<img style="vertical-align: middle; border: none; width: 50px; height: 50px; margin-top: 38px; object-fit: cover; border-radius: 50em" src="{{ url('storage/uploads/cars/'.$imageName) }}" alt="User Avatar">--}}
                                            {{ $reservation->car->id }} - <b>{{ $reservation->car->mark->name }}</b> - {{ $reservation->car->carmodel->name }} - {{ $reservation->car->cartype->name }}
                                            @if($reservation->express)
                                                <br>
                                                <i style="font-size: 12px !important; color: gray"><i class="fa fa-arrow-right" style="font-size: 12px !important;"></i> {{ $reservation->express }}</i>
                                            @endif
                                        </a>
                                    </td>
                                    <td> @if($reservation->driver) Avec @else Sans @endif</td>
                                    <td>{{ $reservation->date_start->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $reservation->date_back->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $reservation->amount }}</td>
                                    <td>
                                        @php
                                            $invoice_download = null;
                                            foreach($invoices as $invoice){
                                                if($invoice->reservation_id == $reservation->id){
                                                    $invoice_download = $invoice;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        @if($invoice_download)
                                            <a href="{{ route('extranet.downloadInvoice', [$invoice_download->reservation_id, $invoice_download->mode, 'reservation']) }}" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                        @else
                                            {{--<a href="#" class="paypal" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><i class="fa fa-cc-paypal"></i></a>--}}
                                            {{--<a href="#" class="flooz" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><img src="{{ url('storage/flooz.jpg') }}" style="width: 50px" alt="flooz"></a>--}}
                                            <a href="#" class="local" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><i class="fa fa-address-card"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($reservation->date_back->lte(new \Carbon\Carbon()) AND $invoice_download)
                                            <a href="{{ route('intranet.backReservation', $reservation->id) }}"><i class="fa fa-undo"></i></a>
                                        @endif
                                        <a href="{{ route('intranet.editReservation', $reservation->id) }}"><i class="fa fa-edit"></i></a>
                                        @if(!$reservation->busy()) <a href="{{ route('intranet.deleteReservation', $reservation->id) }}"><i class="fa fa-trash"></i></a> @endif
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

@push('scripts')
    <script>

        var done = false

        var currentPage = window.location.href.split('&')

        if (currentPage[1] && !done){
            var tabId = currentPage[1].split('=')
            var tabMode = currentPage[2].split('=')

            var Id = tabId[1]
            var Mode = tabMode[1]

            saveInvoice(Id, Mode)
        }

        function saveInvoice(id, mode){
            $.post('{{ route('intranet.storeInvoice') }}',
                {
                    _token : '{{ csrf_token() }}',
                    id : id,
                    mode : mode,
                    type : 'reservation'
                }, function (rsp) {
                    console.log(rsp)
                    done = true
                    window.location = '/intranet/reservation'
                })
        }

        $('.paypal').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/paypal/reservation')
                $.post('invoice/getdatas/'+id+'/paypal/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(rsp.total)
                    $('#id').val('reservation-paypal-'+$.now())
                    $('#mode').val('paypal')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                    setPaypalUrl()
                })
            })
        })
        $('.flooz').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/flooz/reservation')
                $.post('invoice/getdatas/'+id+'/flooz/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('reservation-flooz-'+$.now())
                    $('#mode').val('flooz')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                    setFormUrl()
                })
            })
        })
        $('.tmoney').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/tmoney/reservation')
                $.post('invoice/getdatas/'+id+'/tmoney/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('reservation-tmoney-'+$.now())
                    $('#mode').val('tmoney')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                    setFormUrl()
                })
            })
        })

        $('.local').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/local/reservation')
                $.post('invoice/getdatas/'+id+'/local/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('reservation-local-'+$.now())
                    $('#mode').val('local')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
//                    setFormUrl()
                })
            })
        })

        function setFormUrl(){
            //            METHODE 1
//            var url = 'https://paygateglobal.com/api/v1/pay';
//            var auth_token = "a81d1e51-bf4c-4fa1-ad94-ef30eb442c58"
//            var phone_number = $('#phone-number').val()
//            var amount = $('#amount').val()
//            var description = ''
//            var identifier = $('#id').val()
//
//            $.post(url,
//                {
//                    auth_token:auth_token,
//                    phone_number:phone_number,
//                    amount:amount,
//                    description:description,
//                    identifier:identifier
//                },
//                function(rsp){
//                    console.log('reference === '+rsp.tx_reference)
//                    console.log('status === '+rsp.status)
//                }
//            )

//          METHODE 2
            var baseUrl = 'https://paygateglobal.com/v1/page';
            var token = "a81d1e51-bf4c-4fa1-ad94-ef30eb442c58"
            var amount = $('#amount').val()
            var description = 'test'
            var identifier = $('#id').val()
            var url = encodeURIComponent('{{ env('URL', 'http://localhost:8000') }}/intranet/reservation?status=success&id='+$('#id-type').val()+'&mode='+$('#mode').val()+'&type=reservation')
            var urlString = baseUrl+'?token='+token+'&amount='+amount+'&description='+description+'&identifier='+identifier+'&url='+url

            $('.form-paid').attr('href', urlString)
        }

        function setPaypalUrl(){
            {{--var token = '{{ csrf_token() }}'--}}
            var amount = $('#amount').val()
            var url = '../payment/paypal/'+amount

            $('.form-paid').attr('href', url)
        }

        function saveInvoice(){
            $.post('{{ route('intranet.storeInvoice') }}',
                {
                    _token : '{{ csrf_token() }}',
                    id : $('#id-type').val(),
                    mode : $('#mode').val(),
                    type : 'reservation'
                }, function (rsp) {
                    location.reload(true)
                })
        }

        $('.form-paid').click(function () {
            saveInvoice()
        })


    </script>
    {{--<script>--}}
        {{--paypal.Buttons({--}}
            {{--createOrder: function(data, actions) {--}}
                {{--// Set up the transaction--}}
                {{--return actions.order.create({--}}
                    {{--purchase_units: [{--}}
                        {{--amount: {--}}
                            {{--value: ''+$('#amount').val()+''--}}
                        {{--}--}}
                    {{--}]--}}
                {{--});--}}
            {{--}--}}
        {{--}).render('#paypal-button-container');--}}
    {{--</script>--}}
@endpush