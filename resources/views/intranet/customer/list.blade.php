@extends('intranet.layouts.app')

@section('content')
    <style>
        table td{
            vertical-align: middle;
        }
    </style>

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                @if($type == 'physical')
                    <a href="{{ route('intranet.createCustomer', $type) }}"><button class="btn btn-primary">Ajouter un Client Physique</button></a>
                @else
                    <a href="{{ route('intranet.createCustomer', $type) }}"><button class="btn btn-primary">Ajouter un Client Moral</button></a>
                @endif
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Client {{ $type == 'physical' ? 'Physique' : 'Moral' }}</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @if($type == 'physical')
                                    <th align="center">Actif</th>
                                    <th align="center">Photo</th>
                                    <th>Nom & Prénoms</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>CNI</th>
                                    <th>Actions</th>
                                @else
                                    <th align="center">Actif</th>
                                    <th align="center">Photo</th>
                                    <th>Nom Société</th>
                                    <th>Nom Personne Ressource</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @if($type == 'physical')
                                @foreach($customers as $customer)
                                    <tr>
                                        <td align="center"><i class="fa fa-circle {{ $customer->active ? 'green' : 'red' }}" onclick="toggleActive({{ $customer->id }}, $(this))"></i></td>
                                        <td align="center"><a href="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$customer->photo) }}" target="_blank"><img src="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$customer->photo) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50em"></a></td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->telephone }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->cni }}</td>
                                        <td>
                                            <a href="{{ route('intranet.createReservation', [$customer->id, 'customer'])  }}" onclick="return @if(!$customer->active) false @endif" class="toggle @if(!$customer->active)  disabled @endif"><i class="fa fa-bookmark" title="Reserver"></i></a>
                                            <a href="{{ route('intranet.createLeasing', [$customer->id, 'customer'])  }}" onclick="return @if(!$customer->active) false @endif" class="toggle @if(!$customer->active)  disabled @endif"><i class="fa fa-retweet" title="Louer"></i></a>
                                            <a href="{{ route('intranet.showCustomer', [$customer->id, $type])  }}"><i class="fa fa-eye" title="Voir"></i></a>
                                            <a href="{{ route('intranet.editCustomer', [$customer->id, $type]) }}"><i class="fa fa-edit" title="Modifier"></i></a>
                                            <a href="{{ route('intranet.deleteCustomer', [$customer->id, $type]) }}"><i class="fa fa-trash" title="Supprimer"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach($customers as $customer)
                                    <tr>
                                        <td align="center"><i class="fa fa-circle {{ $customer->active ? 'green' : 'red' }}"></i></td>
                                        <td align="center" valign="middle"><a href="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$customer->photo) }}" target="_blank"><img src="{{ url('storage/uploads/avatars/'.$customer->photo) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50em"></a></td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->resource_name }}</td>
                                        <td>{{ $customer->telephone }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>
                                            <a href="{{ route('intranet.createReservation', [$customer->id, 'customer'])  }}" onclick="return @if(!$customer->active) false @endif" class="toggle @if(!$customer->active)  disabled @endif"><i class="fa fa-bookmark" title="Reserver"></i></a>
                                            <a href="{{ route('intranet.createLeasing', [$customer->id, 'customer'])  }}" onclick="return @if(!$customer->active) false @endif" class="toggle @if(!$customer->active)  disabled @endif"><i class="fa fa-retweet" title="Louer"></i></a>
                                            <a href="{{ route('intranet.showCustomer', [$customer->id, $type])  }}"><i class="fa fa-eye" title="Voir"></i></a>
                                            <a href="{{ route('intranet.editCustomer', [$customer->id, $type]) }}"><i class="fa fa-edit" title="Modifier"></i></a>
                                            <a href="{{ route('intranet.deleteCustomer', [$customer->id, $type]) }}"><i class="fa fa-trash" title="Supprimer"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

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
            $.post('{{ route('intranet.toggleActiveUser') }}',{id: id, _token: "{{ csrf_token() }}"}, function(rsp){
                if(el.hasClass('green')) el.removeClass('green').addClass('red')
                else el.removeClass('red').addClass('green')
                var btn = el.parent().parent().children().eq(7).children('.toggle')
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