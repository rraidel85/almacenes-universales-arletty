<div class="table-responsive">
    <table class="table table-bordered table-striped" id="recursos-table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('ver-rol')
                            <a href="{{ route('roles.show', [$role->id]) }}"
                                class='btn btn-light bg-green'>
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('editar-rol')
                            <a href="{{ route('roles.edit', [$role->id]) }}"
                                class='btn btn-light bg-blue'>
                                <i class="far fa-edit"></i>
                            </a>
                        @endcan
                        @can('borrar-rol')
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-light bg-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
