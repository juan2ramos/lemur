@extends('layouts.admin')

@section('contend')
<h1>Lista de usuarios</h1>
<p>
    <a href="{{ route('admin.users.create') }}" id="new-user" class="btn-admin">Nuevo Usuario</a>
</p>
<table class=" table-primary ">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Role</th>
        <th>Acciones</th>
    </tr>
    <thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->nombre }}</td>
        <td>{{ $user->apellidos }}</td>
        <td>{{ $user->email }}</td>
        <td class="center">{{ $user->role }}</td>
        <td class="center">

            <a href="{{ route('admin.users.show', $user->id) }}" class="edit">
                <i class="icon-eye"></i>
            </a>

            <a href="{{ route('admin.users.edit', $user->id) }}" class="delete">
                <i class="icon-close"></i>
            </a>
        </td>
    </tr>

    @endforeach
    </tbody>
</table>

{{ $users->links() }}
<div class="clearfix bshadow0 pbs">

</div>
</section>
@stop