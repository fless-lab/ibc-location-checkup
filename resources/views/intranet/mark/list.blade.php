@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createMark') }}"><button class="btn btn-primary">Ajouter une Marque</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">



                    <div class="box-header with-border">
                        <h3 class="box-title">Marques de véhicule</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($marks as $mark)
                                    <tr>
                                        <td>{{ $mark->name }}</td>
                                        <td>
{{--                                            <a href="{{ route('intranet.showMark', $mark->id)  }}"><i class="fa fa-eye"></i></a>--}}
                                            <a href="{{ route('intranet.editMark', $mark->id) }}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('intranet.deleteMark', $mark->id) }}"><i class="fa fa-trash"></i></a>
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