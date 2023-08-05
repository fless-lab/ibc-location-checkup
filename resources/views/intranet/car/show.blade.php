@extends('intranet.layouts.app')

@section('content')
    <div class="col-md-12" style="padding: 30px">
        <!-- Widget: car widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ url(env('STORAGE_PATH').'white_back.jpg') }}'); height: 200px">
                <div style="display: flex; justify-content: space-between">
                    <div style="display: inline-block">
                        <h3 class="widget-user-username">{{ $car->mark }}</h3>
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
                    <div class="col-sm-12" style="display: flex; justify-content: space-between">
                        <div>
                            <table class="description-table">
                                <tr>
                                    <td>Etat</td>
                                    <td><b>{{ $car->carstate->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Immatriculation</td>
                                    <td><b>{{ $car->registration }}</b></td>
                                </tr>
                                <tr>
                                    <td>Couleur</td>
                                    <td><b>{{ $car->color }}</b></td>
                                </tr>
                                <tr>
                                    <td>Disponible</td>
                                    <td><i class="fa fa-circle {{ $car->available ? 'green' : 'red' }}"></i></td>
                                </tr>
                                <tr>
                                    <td>Actif</td>
                                    <td><i class="fa fa-circle {{ $car->active ? 'green' : 'red' }}"></i></td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <a href="{{ route('intranet.indexCar') }}">
                                <button class="btn btn-success"><i class="fa fa-caret-left"></i> &nbsp; Retourner à la liste</button>
                            </a>
                        </div>


                    </div>
                    <br>
                    <div class="col-sm-12">
                        <h3 style="margin-left: 10px; fon-weight: bold">Images</h3>
                        <br>
                        @foreach($car->carfiles as $carfile)
                            <div class="col-sm-3">
                                <a href="{{ url(env('STORAGE_PATH').'uploads/cars/'.$carfile->name) }}" target="_blank">
                                    <img src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$carfile->name) }}" style="width: 100%; height: 200px; border-radius: 10px; object-fit: cover;" />
                                </a>
                            </div>
                            @if($loop->iteration == 4)
                                <br><br><br>
                            @endif
                        @endforeach
                    </div>

                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-car -->
    </div>
@endsection