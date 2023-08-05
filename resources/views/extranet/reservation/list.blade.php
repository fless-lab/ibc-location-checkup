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
<section class="bg-light" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Mes Reservations</h2>
                <h3 class="section-subheading text-muted">Vous avez la possibilité de payer ou de télécharger vos factures</h3>
            </div>
        </div>
        <div class="row">

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
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>
                                        @php
                                            if($reservation->car){
                                                foreach ($reservation->car->carfiles as $carfile){
                                                    $imageName = $carfile->name;
                                                    break;
                                                }
                                            }
                                        @endphp

                                            {{--<img style="vertical-align: middle; border: none; width: 50px; height: 50px; margin-top: 38px; object-fit: cover; border-radius: 50em" src="{{ url('storage/uploads/cars/'.$imageName) }}" alt="User Avatar">--}}
                                            {{ $reservation->car->id }} - <b>{{ $reservation->car->mark->name }}</b> - {{ $reservation->car->carmodel->name }} - {{ $reservation->car->cartype->name }}
                                            @if($reservation->express)
                                                <br>
                                                <i style="font-size: 12px; color: gray"><i class="fas fa-arrow-right"></i> {{ $reservation->express }}</i>
                                            @endif

                                    </td>
{{--                                    <td> @if($reservation->driver) {{ $reservation->driver->name }} @else - @endif</td>--}}
                                    <td>{{ $reservation->date_start->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $reservation->date_back->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $reservation->amount }}</td>
                                    <td>
                                        @php
                                            $invoice_download = false;
                                                foreach($invoices as $invoice){
                                                    if($invoice->reservation_id == $reservation->id){
                                                        $invoice_download = $invoice;
                                                        break;
                                                    }
                                                }
                                        @endphp

                                        @if($invoice_download)
                                            <a href="{{ route('extranet.downloadInvoice', [$invoice_download->reservation_id, $invoice_download->mode, 'reservation']) }}" target="_blank"><i class="fa fa-arrow-circle-down"></i></a>
                                            @if($invoice_download->mode == 'stripe')
                                                <a href="{{ $invoice_download->receipt }}" target="_blank"><i class="fas fa-file-invoice"></i></a>
                                            @endif
                                        @else
                                            <a href="#" class="paypal2" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><i class="fab fa-cc-paypal"></i></a>
                                            <a href="#" class="stripe2" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><i class="fab fa-cc-visa"></i></a>
                                            <a href="#" class="flooz2" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><img src="{{ url(env('STORAGE_PATH').'flooz.jpg') }}" style="width: 50px" alt="flooz"></a>
                                            <a href="#" class="tmoney2" data-toggle="modal" data-target="#preview-modal" data-id="{{ $reservation->id }}"><img src="{{ url(env('STORAGE_PATH').'tmoney.png') }}" style="width: 50px" alt="t-money"></a>
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

        var done = false

        var currentPage = window.location.href.split('&')
        var typePage =  window.location.href.split('#')

        if (currentPage[1] && !done){
            var tabId = currentPage[1].split('=')
            var tabMode = currentPage[2].split('=')

            var Id = tabId[1]
            var Mode = tabMode[1]

            if(typePage[1] === 'leasing'){
                saveInvoiceLeasing(Id, Mode)
            }else{
                saveInvoiceReservation(Id, Mode)
            }

        }

        function saveInvoiceReservation(id, mode){
            $.post('{{ route('extranet.storeInvoice') }}',
                {
                    _token : '{{ csrf_token() }}',
                    id : id,
                    mode : mode,
                    type : 'reservation'
                }, function (rsp) {
                    console.log(rsp)
                    done = true
                    window.location.href = '{{ env('URL', 'http://localhost:8000') }}/#reservation'
                })
        }

        function saveInvoiceLeasing(id, mode){
            $.post('{{ route('extranet.storeInvoice') }}',
                {
                    _token : '{{ csrf_token() }}',
                    id : id,
                    mode : mode,
                    type : 'leasing'
                }, function (rsp) {
                    console.log(rsp)
                    done = true
                    window.location.href = '{{ env('URL', 'http://localhost:8000') }}/#leasing'
                })
        }

        $('.paypal2').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/paypal/reservation')
                $.post('extranet/invoice/getdatas/'+id+'/paypal/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(rsp.total)
                    $('#id').val('reservation-paypal-'+$.now())
                    $('#mode').val('paypal')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                })
            })
        })
        $('.flooz2').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/flooz/reservation')
                $.post('extranet/invoice/getdatas/'+id+'/flooz/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('reservation-flooz-'+$.now())
                    $('#mode').val('flooz')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                    setFormUrlReservation()
                })
            })
        })
        $('.tmoney2').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/tmoney/reservation')
                $.post('extranet/invoice/getdatas/'+id+'/tmoney/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(1)
                    $('#id').val('reservation-tmoney-'+$.now())
                    $('#mode').val('tmoney')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                    setFormUrlReservation()
                })
            })
        })
        $('.stripe2').each(function(){
            $(this).click(function(){
                var id = $(this).attr('data-id');
                $('#preview-invoice').attr('src', 'extranet/invoice/preview/'+id+'/stripe/reservation')
                $.post('extranet/invoice/getdatas/'+id+'/stripe/reservation', {_token : '{{ csrf_token() }}'}, function (rsp) {
                    $('#phone-number').val(rsp.telephone)
                    $('#amount').val(rsp.total)
                    $('#id').val('reservation-stripe-'+$.now())
                    $('#mode').val('paypal')
                    $('#id-type').val(rsp.id)
                    $('#type').val('reservation')
                    $('.form-paid').attr('href', '#').attr('data-toggle', 'modal').attr('data-target', '#stripe-modal').attr('data-dismiss', 'modal')
                    $('#stripe-frame').attr('src', 'showstripe/'+rsp.total+'/'+rsp.id+'/reservation')
                })
            })
        })

        function setFormUrlReservation(){
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
            var url = encodeURIComponent('{{ env('URL', 'http://localhost:8000') }}/?status=success&id='+$('#id-type').val()+'&mode='+$('#mode').val()+'&type=reservation#reservation')
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
