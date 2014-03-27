@extends('layouts.admin')

@section('contend')
<h1>Lista de Categorías</h1>
<p>
    {{HTML::link('admin/excel','Exportar a Excel',['id' => 'export'])}}

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

            {{HTML::decode(
            HTML::link('admin/users/destroy/'.$user->id,'
            <i class="icon-close"></i>
            ',['class' => 'delete', 'onclick' => "return confirm('Esta seguro de eliminar el usuario?')"])
            )}}
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