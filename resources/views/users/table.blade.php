<div class="table-responsive">
    <table class="table table-bordered table-striped" id="recursos-table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $rolName)
                            <h5><span class="badge">{{ $rolName }}</span></h5>
                        @endforeach
                    @else
                        <p>----</p>
                    @endif
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>

                        @can('ver-usuario')
                            <a href="{{ route('users.show', [$user->id]) }}"
                                class='btn btn-light bg-green'>
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan

                        @can('editar-usuario')
                            <a href="{{ route('users.edit', [$user->id]) }}"
                                class='btn btn-light bg-blue'>
                                <i class="far fa-edit"></i>
                            </a>
                        @endcan
                        @can('borrar-usuario')
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-light bg-danger', 'onclick' => "return confirm('¿Estas seguro?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
