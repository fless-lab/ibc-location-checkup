@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createCartype') }}"><button class="btn btn-primary">Ajouter un Type</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">



                    <div class="box-header with-border">
                        <h3 class="box-title">Types de véhicule</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartypes as $cartype)
                                <tr>
                                    <td>{{ $cartype->name }}</td>
                                    <td>
                                        {{--                                            <a href="{{ route('intranet.showCarmodel', $carstate->id)  }}"><i class="fa fa-eye"></i></a>--}}
                                        <a href="{{ route('intranet.editCartype', $cartype->id) }}"><i class="fa fa-edit"></i></a>
                                        @if(!$cartype->busy()) <a href="{{ route('intranet.deleteCartype', $cartype->id) }}"><i class="fa fa-trash"></i></a> @endif
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