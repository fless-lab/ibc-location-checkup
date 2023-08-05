@extends('intranet.layouts.app')

@section('content')
    <div class="col-md-12" style="padding: 30px">
        <!-- Widget: car widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ url(env('STORAGE_PATH').'white_back.jpg') }}'); height: 200px">
                <div style="display: flex; justify-content: space-between">
                    <div style="display: inline-block">
                        <h3 class="widget-user-username">{{ $car->mark->name }}</h3>
                        <h5 class="widget-car-desc">{{ $car->carmodel->name }}</h5>
                    </div>
                    <div style="display: inline-block">
                        <h3 class="widget-user-username">{{ $car->cartype->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="widget-user-image" style="left: 43% !important">
                @php
                    foreach ($car->carfiles as $carfile){
                        $imageName = $carfile->name;
                        break;
                    }
                @endphp
                <a href="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" target="_blank">
                    <img style="border: none; width: 200px; height: 200px; margin-top: 38px; object-fit: cover; border-radius: 50em" src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" alt="User Avatar">
                </a>
            </div>
            <div class="box-footer">
                <div class="row" style="margin-top: 50px">
                    <form action="{{ $reservation ? route('intranet.updatecarReservation', $reservation->id) : route('intranet.updatecarLeasing', $leasing->id) }}" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="col-sm-12" style="display: flex; justify-content: space-between">
                            {{--<h3 style="margin-left: 10px">Avant</h3>--}}
                            {{--<br>--}}
                            <div style="padding: 80px">
                                <h3 style="margin-left: 10px">Avant</h3>
                                <br>
                                <table class="description-table">
                                    @if($back)
                                        <tr>
                                            <td>Etat<br><br></td>
                                            <td><b>{{ $back->state }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Dégâts<br><br></td>
                                            <td><b>{{ $back->damage }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Kilométrage<br><br></td>
                                            <td><b>{{ $back->kilometrage }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Niveau d'essence<br><br></td>
                                            <td><b>{{ $back->gasoline }}</b><br><br></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Etat<br><br></td>
                                            <td><b>{{ $car->carstate->name }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Dégâts<br><br></td>
                                            <td><b>{{ $car->damage }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Kilométrage<br><br></td>
                                            <td><b>{{ $car->kilometrage }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Niveau d'essence<br><br></td>
                                            <td><b>{{ $car->gasoline }}</b><br><br></td>
                                        </tr>
                                    @endif

                                </table>
                            </div>
                            <div style="padding: 80px">
                                <h3 style="margin-left: 10px">Après</h3>
                                @if($back)
                                    <br>
                                    <table class="description-table">
                                        <tr>
                                            <td>Etat<br><br></td>
                                            <td><b>{{ $car->carstate->name }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Dégâts<br><br></td>
                                            <td><b>{{ $car->damage }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Kilométrage<br><br></td>
                                            <td><b>{{ $car->kilometrage }}</b><br><br></td>
                                        </tr>
                                        <tr>
                                            <td>Niveau d'essence<br><br></td>
                                            <td><b>{{ $car->gasoline }}</b><br><br></td>
                                        </tr>
                                    </table>
                                @else
                                    <table class="description-table">
                                        <tr>
                                            <td>Etat</td>
                                            <td>
                                                <select name="carstate_id" id="">
                                                    @foreach($carstates as $carstate)
                                                        <option value="{{ $carstate->id }}">{{ $carstate->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dégâts</td>
                                            <td><textarea name="damage" style="height: 40px"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>Kilométrage</td>
                                            <td><input type="text" name="kilometrage"/></td>
                                        </tr>
                                        <tr>
                                            <td>Niveau d'essence</td>
                                            <td><input type="text" name="gasoline"/></td>
                                        </tr>
                                    </table>
                                @endif

                            </div>


                        </div>
                        <div style="margin: auto; width: 100%; text-align: center">
                        @if($back)
                            <a href="{{ $reservation ? route('intranet.indexReservation') : route('intranet.indexLeasing') }}">
                                <button class="btn btn-success"><b>Retourner à la liste</b></button>
                            </a>
                            @if(($car->kilometrage - $back->kilometrage) >= $rate->kilometer)
                                <a href="{{ $reservation ? route('intranet.supInvoice', [$reservation->id, $type]) : route('intranet.supInvoice', [$leasing->id, $type]) }}" class="btn">
                                    <b>Télécharger la facture supplémentaire</b>
                                </a>
                            @endif
                        @else
                            <button class="btn btn-success" type="submit"><b>Enregistrer le retour de ce véhicule</b></button>
                        @endif
                        </div>
                    </form>



                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-car -->
    </div>
@endsection