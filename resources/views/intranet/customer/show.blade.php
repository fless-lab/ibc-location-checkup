@extends('intranet.layouts.app')

@section('content')
    <div class="col-md-12" style="padding: 30px">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('{{ url(env('STORAGE_PATH').'white_back.jpg') }}'); height: 200px">
                <div style="display: flex; justify-content: space-between">
                    <div style="display: inline-block">
                        <h3 class="widget-user-username">{{ $customer->name }}</h3>
                        <h5 class="widget-user-desc">
                            <a href="mailto:{{ $customer->email }}" style="color: #a5e2ff">{{ $customer->email }}</a>
                        </h5>
                        <h5 class="widget-user-desc">{{ $customer->telephone }}</h5>
                    </div>
                    <div style="display: inline-block">
                        <h3 class="widget-user-username">Client {{ $type == 'physical' ? 'Physique' : 'Moral' }}</h3>
                    </div>
                </div>
            </div>
            <div class="widget-user-image" style="left: 43% !important">
                <a href="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$customer->photo) }}" target="_blank">
                    <img style="border: none; width: 200px; height: 200px; margin-top: 38px; object-fit: cover; border-radius: 50em" src="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$customer->photo) }}" alt="User Avatar">
                </a>
            </div>
            <div class="box-footer">
                <div class="row" style="margin-top: 50px">

                    <div class="col-sm-12" style="display: flex; justify-content: space-between">
                        <div>
                            <table class="description-table">
                                @if($type == 'physical')
                                    <tr>
                                        <td>Numéro CNI</td>
                                        <td><b>{{ $customer->cni }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Adresse</td>
                                        <td><b>{{ $customer->address }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Actif</td>
                                        <td><i class="fa fa-circle {{ $customer->active ? 'green' : 'red' }}"></i></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>Nom de la personne ressource</td>
                                        <td><b>{{ $customer->resource_name }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Numéro de la personne ressource</td>
                                        <td><b>{{ $customer->resource_num }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Numéro de l'opérateur économique</td>
                                        <td><b>{{ $customer->operator_num }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Adresse</td>
                                        <td><b>{{ $customer->address }}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Actif</td>
                                        <td><i class="fa fa-circle {{ $customer->active ? 'green' : 'red' }}"></i></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div>
                            <a href="{{ route('intranet.indexCustomer', $type) }}">
                                <button class="btn btn-success"><i class="fa fa-caret-left"></i> &nbsp; Retourner à la liste</button>
                            </a>
                        </div>


                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
@endsection