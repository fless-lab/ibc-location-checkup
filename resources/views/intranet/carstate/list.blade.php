@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createCarstate') }}"><button class="btn btn-primary">Ajouter un Etat</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">



                    <div class="box-header with-border">
                        <h3 class="box-title">Etats de véhicule</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Etat</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($carstates as $carstate)
                                    <tr>
                                        <td>{{ $carstate->name }}</td>
                                        <td>
{{--                                            <a href="{{ route('intranet.showCarstate', $carstate->id)  }}"><i class="fa fa-eye"></i></a>--}}
                                            <a href="{{ route('intranet.editCarstate', $carstate->id) }}"><i class="fa fa-edit"></i></a>
                                            @if(!$carstate->busy()) <a href="{{ route('intranet.deleteCarstate', $carstate->id) }}"><i class="fa fa-trash"></i></a> @endif
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