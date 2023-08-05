<style>
    @media screen and (max-width: 500px) {
        #datatable{
            width: 100% !important;
            font-size: 10px
        }
        #datatable td{
            width: 20% !important;
        }
        #datatable i{
            font-size: 20px !important;
        }
        #datatable img{
            width: 26px !important;
        }
    }
</style>
<section class="bg-light" id="leasing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Mes Locations</h2>
                <h3 class="section-subheading text-muted">Vous avez la possibilité de payer ou de télécharger vos factures</h3>
            </div>
        </div>
        <div class="row">
        {{--<div style="padding: 15px; float: right">--}}
        {{--<a href="{{ route('extranet.createLeasing') }}"><button class="btn btn-primary">Enregistrer une location</button></a>--}}
        {{--</div>--}}
        <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Véhicule</th>
                                {{--<th>Chauffeur</th>--}}
                                <th>Date début</th>
                                <th>Date retour</th>
                                <th width="10%">Montant HT (FCFA)</th>
                                <th width="20%">Paiements</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leasings as $leasing)
                                <tr>
                                    <td>
                                        @php
                                            if($leasing->car){
                                                foreach ($leasing->car->carfiles as $carfile){
                                                    $imageName = $carfile->name;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        {{ $leasing->car->id }} - <b>{{ $leasing->car->mark }}</b> - {{ $leasing->car->carmodel->name }} - {{ $leasing->car->cartype->name }}
                                    </td>
{{--                                    <td> @if($leasing->driver) {{ $leasing->driver->name }} @else - @endif</td>--}}
                                    <td>{{ $leasing->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $leasing->date_back->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $leasing->amount }}</td>
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
                                            @if($invoice_download->mode == 'stripe')
                                                <a href="{{ $invoice_download->receipt }}" target="_blank"><i class="fas fa-file-invoice"></i></a>
                                            @endif
                                        @else
                                            <a href="#" class="paypal" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><i class="fab fa-cc-paypal"></i></a>
                                            <a href="#" class="stripe" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><i class="fab fa-cc-stripe"></i></a>
                                            <a href="#" class="flooz" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><img src="{{ url(env('STORAGE_PATH').'flooz.jpg') }}" style="width: 50px" alt="flooz"></a>
                                            <a href="#" class="tmoney" data-toggle="modal" data-target="#preview-modal" data-id="{{ $leasing->id }}"><img src="{{ url(env('STORAGE_PATH').'tmoney.png') }}" style="width: 50px" alt="t-money"></a>
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
    </div>

</section>

@push('scripts')
    <script>

        $('.paypal').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/paypal/leasing')
                $.post('extranet/invoice/getdatas/'+id+'/paypal/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(rsp.total)
                    $('#id').val('leasing-paypal-'+$.now())
                    $('#mode').val('tmoney')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                })
            })
        })
        $('.flooz').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/flooz/leasing')
                $.post('extranet/invoice/getdatas/'+id+'/flooz/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('leasing-flooz-'+$.now())
                    $('#mode').val('tmoney')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                    setFormUrlLeasing()
                })
            })
        })
        $('.tmoney').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/tmoney/leasing')
                $.post('extranet/invoice/getdatas/'+id+'/tmoney/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('leasing-tmoney-'+$.now())
                    $('#mode').val('tmoney')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                    setFormUrlLeasing()
                })
            })
        })
        $('.stripe').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/stripe/leasing')
                $.post('extranet/invoice/getdatas/'+id+'/stripe/leasing', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(rsp.total)
                    $('#id').val('leasing-stripe-'+$.now())
                    $('#mode').val('paypal')
                    $('#id-type').val(rsp.id)
                    $('#type').val('leasing')
                    $('.form-paid').attr('href', '#').attr('data-toggle', 'modal').attr('data-target', '#stripe-modal').attr('data-dismiss', 'modal')
                    $('#stripe-frame').attr('src', 'showstripe/'+rsp.total+'/'+rsp.id+'/leasing')
                })
            })
        })

        function setFormUrlLeasing(){
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
            var url = encodeURIComponent('{{ env('URL', 'http://localhost:8000') }}/?status=success&id='+$('#id-type').val()+'&mode='+$('#mode').val()+'&type=leasing#leasing')
            var urlString = baseUrl+'?token='+token+'&amount='+amount+'&description='+description+'&identifier='+identifier+'&url='+url

            $('.form-paid').attr('href', urlString).removeAttr('data-mode').removeAttr('data-toggle').removeAttr('data-target').removeAttr('data-dismiss')
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