@extends('intranet.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div style="padding: 15px; float: right">
                <a href="{{ route('intranet.createUser') }}"><button class="btn btn-primary">Enregistrer un Utilisateur</button></a>
            </div>
            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary">


                    <div class="box-header with-border">
                        <h3 class="box-title">Utilisateurs</h3>
                    </div>
                    <div class="box-body">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th align="center">Actif</th>
                                <th>Photo</th>
                                <th>Rôle</th>
                                <th>Nom & Prénoms</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td align="center"><i class="fa fa-circle {{ $user->active ? 'green' : 'red' }}" onclick="toggleActive({{ $user->id }}, $(this))"></i></td>
                                    <td align="center"><a href="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$user->photo) }}" target="_blank"><img src="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$user->photo) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50em"></a></td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        <a href="{{ route('intranet.showUser', $user->id)  }}"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('intranet.editUser', $user->id) }}"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('intranet.deleteUser', $user->id) }}"><i class="fa fa-trash"></i></a>
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