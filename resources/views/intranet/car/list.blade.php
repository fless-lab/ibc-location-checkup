@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createCar') }}"><button class="btn btn-primary">Ajouter un Véhicule</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Véhicules</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th align="center" >Actif</th>
                                <th align="center" >Disponible</th>
                                <th align="center">Image</th>
                                <th>Marque</th>
                                <th>Type</th>
                                <th>Modèle</th>
                                <th>Catégorie</th>
                                <th>Etat</th>
                                <th>Couleur</th>
                                <th>Montant par Jour</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                @php
                                    $imageName = null;
                                    foreach ($car->carfiles as $carfile){
                                        $imageName = $carfile->name;
                                        break;
                                    }
                                @endphp
                                <tr>
                                    <td align="center"><i class="fa fa-circle {{ $car->active ? 'green' : 'red' }}" onclick="toggleActive({{ $car->id }}, $(this))"></i></td>
                                    <td align="center"><i class="fa fa-circle {{ $car->available ? 'green' : 'red' }}" onclick="toggleAvailable({{ $car->id }}, $(this))"></i></td>
                                    <td align="center"><a href="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" target="_blank"><img src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" alt="" style="width: 100px; border-radius: 10px"></a></td>
                                    <td>{{ $car->mark->name }}</td>
                                    <td>{{ $car->cartype->name }}</td>
                                    <td>{{ $car->carmodel->name }}</td>
                                    <td>{{ $car->category ? $car->category->name : '' }}</td>
                                    <td>{{ $car->carstate->name }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->amount }} FCFA</td>
                                    <td>
                                        <a href="{{ route('intranet.createReservation', [$car->id, 'car'])  }}" onclick="return @if(!$car->available OR !$car->active) false @endif" class="toggle @if(!$car->available OR !$car->active)  disabled @endif"><i class="fa fa-bookmark" title="Reserver"></i></a>
                                        <a href="{{ route('intranet.createLeasing', [$car->id, 'car'])  }}"  onclick="return @if(!$car->available OR !$car->active) false @endif" class="toggle @if(!$car->available OR !$car->active)  disabled @endif"><i class="fa fa-retweet" title="Louer"></i></a>
                                        <a href="{{ route('intranet.showCar', $car->id)  }}"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('intranet.editCar', $car->id) }}"><i class="fa fa-edit"></i></a>
{{--                                        @if(!$car->busy()) <a href="{{ route('intranet.deleteCar', $car->id) }}" ><i class="fa fa-trash"></i></a> @endif--}}
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

@push('scripts')
    <script>
        function toggleActive(id, el){
            $.post('{{ route('intranet.toggleActiveCar') }}',{id: id, _token: "{{ csrf_token() }}"}, function(rsp){
                if(el.hasClass('green')) el.removeClass('green').addClass('red')
                else el.removeClass('red').addClass('green')
                var btn = el.parent().parent().children().eq(8).children('.toggle')
                if (btn.hasClass('disabled')) {
                    btn.removeClass('disabled')
                    btn.attr('onclick', 'return true')
                }
                else{
                    btn.addClass('disabled')
                }
            })
        }
        function toggleAvailable(id, el){
            $.post('{{ route('intranet.toggleAvailableCar') }}',{id: id, _token: "{{ csrf_token() }}"}, function(rsp){
                if(el.hasClass('green')) el.removeClass('green').addClass('red')
                else el.removeClass('red').addClass('green')
                var btn = el.parent().parent().children().eq(8).children('.toggle')
                if (btn.hasClass('disabled')) {
                    btn.removeClass('disabled')
                    btn.attr('onclick', 'return true')
                }
                else{
                    btn.addClass('disabled')
                }
            })
        }
    </script>
@endpush