<html>
    <head>
        <style type="text/css">
            body {
                font-family: brown;
            }
            table td{
                height: 45px
            }
        </style>
    </head>
    <body>
        <p style="text-align: right">{{ date('d-m-Y') }}</p>
        <table style="width: 100%">
            <tr>
                <td style="width: 50%">
                    @if($data->reservation)
                        {{ $data->reservation->user->name }}<br>
                        {{ $data->reservation->user->email }}<br>
                        {{ $data->reservation->user->telephone }}<br>
                        {{ $data->reservation->user->address }}<br>
                    @else
                        {{ $data->leasing->user->name }}<br>
                        {{ $data->leasing->user->email }}<br>
                        {{ $data->leasing->user->telephone }}<br>
                        {{ $data->leasing->user->address }}<br>
                    @endif
                </td>
                <td style="text-align: right">
                    Location Véhicule <br>
                    Gblinkomé, Lomé, Togo
                </td>
            </tr>
        </table>
        <h3 style="text-align:center; text-transform: uppercase">Facture supplémentaire</h3>
        <br>
        <h3>{{ $data->type == 'leasing' ? 'Location' : 'Reservation' }}</h3>
        <div>
            <table>
                <tr>
                    <td>Véhicule </td>
                    <td><b>{{ $data->car->mark->name }} - {{ $data->car->carmodel->name }} - {{ $data->car->cartype->name }}</b></td>
                </tr>
                <tr>
                    <td>Catégorie</td>
                    <td><b>{{ $data->car->category->name }}</b></td>
                </tr>
                <tr>
                    <td>Date de début</td>
                    <td><b>{{ $data->reservation ? $data->reservation->date_start : $data->leasing->created_at }}</b></td>
                </tr>
                <tr>
                    <td>Date de fin</td>
                    <td><b>{{ $data->reservation ? $data->reservation->date_back : $data->leasing->date_back }} </b></td>
                </tr>
            </table>
        </div>
        <br><br>

        <table width="100%">
            <tr>
                <td width="50%">
                    <div>
                        <h3>Avant</h3>
                        <table class="description-table">
                            <tr>
                                <td>Etat</td>
                                <td><b>{{ $data->back->state }}</b></td>
                            </tr>
                            <tr>
                                <td>Dégâts</td>
                                <td><b>{{ $data->back->damage }}</b></td>
                            </tr>
                            <tr>
                                <td>Kilométrage</td>
                                <td><b>{{ $data->back->kilometrage }}</b></td>
                            </tr>
                            <tr>
                                <td>Niveau d'essence</td>
                                <td><b>{{ $data->back->gasoline }}</b></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <div>
                        <h3 style="margin-left: 10px">Après</h3>
                        <table class="description-table">
                            <tr>
                                <td>Etat</td>
                                <td><b>{{ $data->car->carstate->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Dégâts</td>
                                <td><b>{{ $data->car->damage }}</b></td>
                            </tr>
                            <tr>
                                <td>Kilométrage</td>
                                <td><b>{{ $data->car->kilometrage }}</b></td>
                            </tr>
                            <tr>
                                <td>Niveau d'essence</td>
                                <td><b>{{ $data->car->gasoline }}</b></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <div style="text-align: right">
            <h3>Montant supplémentaire à payer</h3>
            <h4>{{ $data->rate->sup_amount }} FCFA</h4>
        </div>
    </body>
</html>


