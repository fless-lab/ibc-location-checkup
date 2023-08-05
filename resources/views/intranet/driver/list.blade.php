@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createDriver') }}"><button class="btn btn-primary">Enregistrer un Chauffeur</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Chauffeurs</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom & Prénoms</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver)
                                <tr>
                                    <td align="center"><a href="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$driver->photo) }}" target="_blank"><img src="{{ url('storage/uploads/avatars/'.$driver->photo) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50em"></a></td>
                                    <td>{{ $driver->name }}</td>
                                    <td>{{ $driver->telephone }}</td>
                                    <td>
                                        <a href="{{ route('intranet.showDriver', $driver->id)  }}"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('intranet.editDriver', $driver->id) }}"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('intranet.deleteDriver', $driver->id) }}"><i class="fa fa-trash"></i></a>
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