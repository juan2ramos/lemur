@extends('layouts.admin')

@section('contend')
<h1>Lista de Ideas</h1>

<table class=" table-primary ">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>descripción</th>
        <th>Votos</th>
        <th>Acciones</th>
    </tr>
    <thead>
    <tbody>
    @foreach ($ideas as $idea)
    <tr>
        <td>{{ $idea->titulo }}</td>
        <td>{{ $idea->descripcion }}</td>
        <td>{{ $idea->numero_votos }}</td>
        <td class="center">
            {{HTML::decode(
            HTML::link('admin/ideas/'.$idea->id,'
            <i class="icon-eye"></i>
            ',['class' => 'edit'])
            )}}


            <a href="" class="delete">
                <i class="icon-close"></i>
            </a>
        </td>
    </tr>

    @endforeach
    </tbody>
</table>


{{ $ideas->links() }}
</section>
@stop