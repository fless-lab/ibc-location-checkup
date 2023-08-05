@extends('intranet.layouts.app')

@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modifier un Chauffeur</h3>
                    </div>
                    <form role="form" action="{{ route('intranet.updateDriver', $driver->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {!! method_field('PUT') !!}
                        <div class="box-body">

                            <div class="form-group">
                                <label >Photo</label>
                                <input type="file" name="photo">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label>
                                <input value="{{ $driver->name }}" type="text" class="form-control" name="name" placeholder="Entrez votre nom et prénoms">
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input value="{{ $driver->telephone }}" type="text" class="form-control" name="telephone" placeholder="Entrez votre numero de téléphone">
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection