@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createCarmodel') }}"><button class="btn btn-primary">Ajouter un Modèle</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">



                    <div class="box-header with-border">
                        <h3 class="box-title">Modèles de véhicule</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Modèle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carmodels as $carmodel)
                                <tr>
                                    <td>{{ $carmodel->name }}</td>
                                    <td>
                                        {{--                                            <a href="{{ route('intranet.showCarmodel', $carstate->id)  }}"><i class="fa fa-eye"></i></a>--}}
                                        <a href="{{ route('intranet.editCarmodel', $carmodel->id) }}"><i class="fa fa-edit"></i></a>
                                        @if(!$carmodel->busy()) <a href="{{ route('intranet.deleteCarmodel', $carmodel->id) }}"><i class="fa fa-trash"></i></a> @endif
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