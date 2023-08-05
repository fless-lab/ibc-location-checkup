@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createSubcontracting', 'reservation') }}"><button class="btn btn-primary">Enregistrer une Sous-traitance pour Reservation</button></a>
                &nbsp; &nbsp;
                <a href="{{ route('intranet.createSubcontracting', 'leasing') }}"><button class="btn btn-primary">Enregistrer une Sous-traitance pour Location</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Sous-traitance</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Pour une</th>
                                <th></th>
                                <th>Société</th>
                                <th>Cession</th>
                                <th>Date de demande</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcontractings as $subcontracting)
                                <tr>
                                    <td>
                                        @if($subcontracting->reservation_id)
                                            <b>RESERVATION</b>
                                        @else
                                            <b>LOCATION</b>
                                        @endif
                                    </td>
                                    <td>
                                        @if($subcontracting->reservation_id)
                                            {{ $subcontracting->reservation->user->name .' - '. $subcontracting->reservation->car->mark->name .' - '. '[ '.$subcontracting->reservation->date_start->format('d-m-Y H:i:s').' à '.$subcontracting->reservation->date_back->format('d-m-Y H:i:s').' ]' }}
                                        @else
                                            {{ $subcontracting->leasing->user->name .' - '. $subcontracting->leasing->car->mark->name .' - '. '[ '.$subcontracting->leasing->created_at->format('d-m-Y H:i:s').' à '.$subcontracting->leasing->date_back->format('d-m-Y H:i:s').' ]' }}
                                        @endif
                                    </td>
                                    <td>{{ $subcontracting->company }}</td>
                                    <td>{{ $subcontracting->disposal_amount }}</td>
                                    <td>{{ $subcontracting->created_at }}</td>
                                    <td>
                                        {{--                                            <a href="{{ route('intranet.showCarmodel', $carstate->id)  }}"><i class="fa fa-eye"></i></a>--}}
                                        @if($subcontracting->reservation_id)
                                            <a href="{{ route('intranet.editSubcontracting', [$subcontracting->id, 'reservation']) }}"><i class="fa fa-edit"></i></a>
                                        @else
                                            <a href="{{ route('intranet.editSubcontracting', [$subcontracting->id, 'leasing']) }}"><i class="fa fa-edit"></i></a>
                                        @endif
                                        <a href="{{ route('intranet.deleteSubcontracting', $subcontracting->id) }}"><i class="fa fa-trash"></i></a>

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