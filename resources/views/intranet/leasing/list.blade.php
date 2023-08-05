@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createLeasing') }}"><button class="btn btn-primary">Enregistrer une location</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Locations</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Véhicule</th>
                                <th>Chauffeur</th>
                                <th>Montant</th>
                                <th>Date début</th>
                                <th>Date retour</th>
                                <th>Facture</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leasings as $leasing)
                                <tr>
                                    <td>
                                        <a href="{{ route('intranet.showCustomer', [$leasing->user->id, $leasing->user->type]) }}" target="_blank">
                                            {{ $leasing->user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @php
                                            foreach ($leasing->car->carfiles as $carfile){
                                                $imageName = $carfile->name;
                                                break;
                                            }
                                        @endphp
                                        <a href="{{ route('intranet.showCar', $leasing->car->id) }}" target="_blank">
                                            {{--<img style="vertical-align: middle; border: none; width: 50px; height: 50px; margin-top: 38px; object-fit: cover; border-radius: 50em" src="{{ url('storage/uploads/cars/'.$imageName) }}" alt="User Avatar">--}}
                                            {{ $leasing->car->id }} - <b>{{ $leasing->car->mark }}</b> - {{ $leasing->car->carmodel->name }} - {{ $leasing->car->cartype->name }}
                                        </a>
                                    </td>
                                    <td> @if($leasing->driver) <a href="{{ route('intranet.showDriver', $leasing->driver_id ) }}" target="_blank">{{ $leasing->driver->name }}</a> @else - @endif</td>
                                    <td>{{ $leasing->amount }}</td>
                                    <td>{{ $leasing->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $leasing->date_back->format('d-m-Y H:i:s') }}</td>
                                    <td>
                                        @php
                                            $invoice_download = null;
                                            foreach($invoices as $invoice){
                                                if($invoice->leasing_id == $leasing->id){
                                                    $invoice_download = $invoice;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        @if($invoice_download)
                                            <a href="{{ route('extranet.downloadInvoice', [$invoice_download->leasing_id, $invoice_download->mode, 'leasing']) }}" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                        @else
                                            {{--<a href="#" class="paypal" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><i class="fa fa-cc-paypal"></i></a>--}}
                                            {{--<a href="#" class="flooz" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><img src="{{ url('storage/flooz.jpg') }}" style="width: 50px" alt="flooz"></a>--}}
                                            {{--<a href="#" class="tmoney" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><img src="{{ url('storage/tmoney.png') }}" style="width: 50px" alt="t-money"></a>--}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($leasing->date_back->lte(new \Carbon\Carbon()) AND $invoice_download)
                                            <a href="{{ route('intranet.backLeasing', $leasing->id) }}"><i class="fa fa-undo"></i></a>
                                        @endif
                                        <a href="{{ route('intranet.editLeasing', $leasing->id) }}"><i class="fa fa-edit"></i></a>
                                            @if(!$leasing->busy()) <a href="{{ route('intranet.deleteLeasing', $leasing->id) }}"><i class="fa fa-trash"></i></a> @endif
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
                    type : 'leasing'
                }, function (rsp) {
                    console.log(rsp)
                    done = true
                    window.location = '/intranet/leasing'
                })
        }

        $('.paypal').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/paypal/leasing')
                $.post('invoice/getdatas/'+id+'/paypal/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(rsp.total)
                    $('#id').val('leasing-paypal-'+$.now())
                    $('#mode').val('paypal')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                    setPaypalUrl()
                })
            })
        })
        $('.flooz').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/flooz/leasing')
                $.post('invoice/getdatas/'+id+'/flooz/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('leasing-flooz-'+$.now())
                    $('#mode').val('flooz')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                    setFormUrl()
                })
            })
        })
        $('.tmoney').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'invoice/preview/'+id+'/tmoney/leasing')
                $.post('invoice/getdatas/'+id+'/tmoney/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('leasing-tmoney-'+$.now())
                    $('#mode').val('tmoney')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                    setFormUrl()
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
            var url = encodeURIComponent('{{ env('URL', 'http://localhost:8000') }}/intranet/leasing?status=success&id='+$('#id-type').val()+'&mode='+$('#mode').val()+'&type=leasing')
            var urlString = baseUrl+'?token='+token+'&amount='+amount+'&description='+description+'&identifier='+identifier+'&url='+url

            $('.form-paid').attr('href', urlString)
        }

        function setPaypalUrl(){
                    {{--var token = '{{ csrf_token() }}'--}}
            var amount = $('#amount').val()
            var url = '../payment/paypal/'+amount

            $('.form-paid').attr('href', url)
        }

    </script>
    <script>
//        paypal.Buttons({
//            createOrder: function(data, actions) {
//                // Set up the transaction
//                return actions.order.create({
//                    purchase_units: [{
//                        amount: {
//                            value: ''+$('#amount').val()+''
//                        }
//                    }]
//                });
//            }
//        }).render('#paypal-button-container');
    </script>
@endpush