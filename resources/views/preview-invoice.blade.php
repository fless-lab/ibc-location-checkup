<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<style>
    .invoice{
        padding: 20px;
        font-family: "Montserrat";
        background: #fff;
    }
    .invoice i{
        color: #ccc;
        font-size: 30px
    }
    .invoice .fa-car{
        color: #3c8dbc
    }

    .invoice table{
        width: 100%
    }
    .invoice table td{
        width: 50%
    }
    .invoice .header{
        display: flex;
        justify-content: space-between;
    }
    .invoice .body{

    }
    .invoice .body .top{
        display: flex;
        justify-content: space-between;
    }
    .invoice .body .middle{

    }
    .invoice .footer{

    }
</style>

<div class="invoice">
    <div class="header">
        <div class="left">
{{--            {{ date('d/m/y') }}--}}
            <img src="{{ url(env('STORAGE_PATH').'logo_easy.png') }}" style="width: 180px"/><br>
            @if($data->express)
                <br>
                <i style="font-size: 12px; color: gray"><i class="fas fa-arrow-right" style="font-size: 12px !important;"></i> {{ $data->express }}</i>
            @endif
        </div>
        <div class="right">
            @if($data->mode == 'paypal')
                <i class="fab fa-paypal"></i>
            @elseif($data->mode == 'flooz')
                <img src="{{ url(env('STORAGE_PATH').'flooz.jpg') }}" style="width: 100px" alt="flooz">
            @elseif($data->mode == 'tmoney')
                <img src="{{ url(env('STORAGE_PATH').'tmoney.png') }}" style="width: 100px" alt="tmoney">
            @elseif($data->mode == 'local')
                <i class="fa fa-address-card"></i>
            @else
                <i class="fab fa-visa"></i>
            @endif
        </div>
    </div>
    <div class="body">
        <div class="top">
            <div >
               <h3>{{ $data->user->name }}</h3>
                {{ $data->user->email }}<br>
                {{ $data->user->telephone }}<br>
                {{ $data->user->address }}
            </div>
            <div>

                <br>
                <i>{{ $data->numfac }}</i>
            </div>
            <div >
                <h3>Location Véhicule</h3>
                {{--spark@spark.org<br>--}}
                +22891455151<br>
                367 Rue Agodja Kodjoviakopé
            </div>
        </div>
        <div class="middle">
            <h3>Détails Véhicule</h3>
            <table>
                <tr>
                    <td>Marque</td>
                    <td><b>{{ $data->car->mark->name }}</b></td>
                </tr>
                <tr>
                    <td>Modèle</td>
                    <td><b>{{ $data->car->carmodel->name }}</b></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><b>{{ $data->car->cartype->name }}</b></td>
                </tr>
                <tr>
                    <td>Etat</td>
                    <td><b>{{ $data->car->carstate->name }}</b></td>
                </tr>
                <tr>
                    <td>Couleur</td>
                    <td><b>{{ $data->car->color }}</b></td>
                </tr>
                <tr>
                    <td>Immatriculation</td>
                    <td><b>{{ $data->car->registration }}</b></td>
                </tr>
                <tr>
                    <td>Chauffeur</td>
                    <td><b>{{ $data->driver ? 'avec' : 'sans' }}</b></td>
                </tr>
                <tr>
                    <td>Date Début</td>
                    <td><b>{{ $data->type == 'leasing' ? $data->created_at->format('d-m-Y H:i:s') : $data->date_start->format('d-m-Y H:i:s') }}</b></td>
                </tr>
                <tr>
                    <td>Date Retour</td>
                    <td><b>{{ $data->date_back->format('d-m-Y H:i:s') }}</b></td>
                </tr>
            </table>

            <h3>Détails Paiement</h3>
            <table>
                <tr>
                    <td>Tarif Chauffeur HT</td>
                    <td><b>{{ $data->no_driver_amount }} FCFA</b></td>
                </tr>
                <tr>
                    <td>Montant de réduction</td>
                    <td><b>{{ $data->reduction_amount }} FCFA</b></td>
                </tr>
                <tr>
                    <td>Montant Véhicule HT</td>
                    <td><b>{{ $data->amount }} FCFA</b></td>
                </tr>
                <tr>
                    <td>Montant total HT</td>
                    <td><b>{{ $data->amount + $data->no_driver_amount }} FCFA</b></td>
                </tr>
                <tr>
                    <td>Montant total TTC</td>
                    <td><b>{{ $data->ttc }} FCFA</b></td>
                </tr>
                <tr>
                    <td>Caution</td>
                    <td><b>{{ $data->bail }} FCFA</b></td>
                </tr>
                <tr>
                    <td><br><h2>Total à payer</h2></td>
                    <td><br><h2>{{ $data->total }} FCFA</h2></td>
                </tr>
            </table>

        </div>

    </div>
    <div class="footer">

    </div>
</div>