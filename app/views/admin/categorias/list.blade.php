@extends('layouts.admin')

@section('contend')
<h1>Lista de usuarios</h1>
<p>
    <a href="{{ route('admin.users.create') }}" id="new-user">Nueva Categoría</a>
</p>
<table class=" table-primary ">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Fecha Inicio</th>
        <th>Fecha Cierre</th>
        <th>Acciones</th>
    </tr>
    <thead>
    <tbody>
    @foreach ($categorias as $categoria)
    <tr>
        <td>{{ $categoria->nombre }}</td>
        <td class="center">{{ $categoria->estado }}</td>
        <td>{{ $categoria->fecha_inicio }}</td>
        <td>{{ $categoria->fecha_cierre }}</td>
        <td class="center">
            <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="view">
                <i class="icon-pencil"></i>
            </a>
            <a href="{{ route('admin.users.show', $categoria->id) }}" class="edit">
                <i class="icon-eye"></i>
            </a>

            <a href="{{ route('admin.users.edit', $categoria->id) }}" class="delete">
                <i class="icon-close"></i>
            </a>
        </td>
    </tr>

    @endforeach
    </tbody>
</table>


{{ $categorias->links() }}
</section>
@stop