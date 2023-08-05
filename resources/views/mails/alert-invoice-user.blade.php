@extends('mails.layouts.app')

@section('content')
    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>

                        <td align="center" class="section-img">
                            @php
                                $imageName = '';

                                       foreach ($reservation->car->carfiles as $carfile){
                                           $imageName = $carfile->name;
                                           break;
                                       }
                            @endphp

                            <a href="" style=" border-style: none !important; display: block; border: 0 !important;"><img src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" style="display: block; width: 300px;" width="300" border="0" alt="" /></a>
                        </td>
                    </tr>
                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header">


                            <div style="line-height: 35px">

                                <span style="color: #5caad2;">FACTURE</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">


                                        <div class="invoice">
                                            <div class="header">
                                                {{--<div class="left">--}}
                                                    {{--            {{ date('d/m/y') }}--}}
                                                    {{--<img src="{{ url(env('STORAGE_PATH').'logo_easy.png') }}" style="width: 180px"/>--}}
                                                    {{--@if($data->express)--}}
                                                        {{--<br>--}}
                                                        {{--<i style="font-size: 12px; color: gray"><i class="fas fa-arrow-right" style="font-size: 12px !important;"></i> {{ $data->express }}</i>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                                <div class="right">
                                                    @if($reservation->mode == 'paypal')
                                                        <i class="fa fa-paypal"></i>
                                                    @elseif($reservation->mode == 'flooz')
                                                        <img src="{{ url(env('STORAGE_PATH').'flooz.jpg') }}" style="width: 100px" alt="flooz">
                                                    @elseif($reservation->mode == 'tmoney')
                                                        <img src="{{ url(env('STORAGE_PATH').'tmoney.png') }}" style="width: 100px" alt="tmoney">
                                                    @else
                                                        <i class="fab fa-stripe-s"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="body">
                                                <div class="top">
                                                    <div >
                                                        <h3>{{ $reservation->user->name }}</h3>
                                                        {{ $reservation->user->email }}<br>
                                                        {{ $reservation->user->telephone }}<br>
                                                        {{ $reservation->user->address }}
                                                    </div>
                                                    <div>
                                                        {{--                    <img src="{{ url(env('STORAGE_PATH').'logo_easy.png') }}" style="width: 180px"/>--}}
                                                        <br>
{{--                                                        <i>{{ $data->numfac }}</i>--}}
                                                    </div>
                                                    {{--<div >--}}
                                                        {{--<h3>Location Véhicule</h3>--}}
                                                        {{--spark@spark.org<br>--}}
                                                        {{--+22891455151<br>--}}
                                                        {{--367 Rue Agodja Kodjoviakopé--}}
                                                    {{--</div>--}}
                                                </div>
                                                <div class="middle">
                                                    <h3>Détails Véhicule</h3>
                                                    <table>
                                                        <tr>
                                                            <td>Marque</td>
                                                            <td><b>{{ $reservation->car->mark->name }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Modèle</td>
                                                            <td><b>{{ $reservation->car->carmodel->name }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Type</td>
                                                            <td><b>{{ $reservation->car->cartype->name }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Etat</td>
                                                            <td><b>{{ $reservation->car->carstate->name }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Couleur</td>
                                                            <td><b>{{ $reservation->car->color }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Immatriculation</td>
                                                            <td><b>{{ $reservation->car->registration }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chauffeur</td>
                                                            <td><b>{{ $reservation->driver ? 'avec' : 'sans' }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date Début</td>
                                                            <td><b>{{ $reservation->date_start->format('d-m-Y H:i:s') }}</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Date Retour</td>
                                                            <td><b>{{ $reservation->date_back->format('d-m-Y H:i:s') }}</b></td>
                                                        </tr>
                                                    </table>
                                                    <br>

                                                    <h3>Détails Paiement</h3>
                                                    <table>
                                                        <tr>
                                                            <td>Tarif Chauffeur HT</td>
                                                            <td><b>{{ $data['no_driver_amount'] }} FCFA</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Montant de réduction</td>
                                                            <td><b>{{ $data['reduction_amount'] }} FCFA</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Montant Véhicule HT</td>
                                                            <td><b>{{ $reservation->amount }} FCFA</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Montant total HT</td>
                                                            <td><b>{{ $reservation->amount + $data['no_driver_amount'] }} FCFA</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Montant total TTC</td>
                                                            <td><b>{{ $data['ttc'] }} FCFA</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Caution</td>
                                                            <td><b>{{ $data['bail'] }} FCFA</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><br><h2>Total à payer</h2></td>
                                                            <td><br><h2>{{ $data['total'] }} FCFA</h2></td>
                                                        </tr>
                                                    </table>

                                                </div>

                                            </div>
                                            <div class="footer">

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">
                                        <div style="line-height: 26px;">
                                            <a href="{{ route('extranet.downloadInvoice', [$invoice_download->reservation_id, $invoice_download->mode, 'reservation']) }}" style="color: #ffffff; text-decoration: none;" target="_blank">TELECHARGER</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>


                </table>

            </td>
        </tr>

    </table>
    <!-- end section -->
@endsection