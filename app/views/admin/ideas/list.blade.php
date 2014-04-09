@extends('layouts.admin')

@section('contend')
<h1>Lista de Ideas</h1>

{{ Form::label('categoria', 'Categoría: ') }}
{{Form::select('Categorias', $categorias,$id,['id' => 'categorias'])}}
{{HTML::link('admin/idea/', '', ['id' => 'urlIdea'])}}
<table class=" table-primary ">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>descripción</th>
        <th>Votos</th>
        <th>Estado</th>
        <th>Categoria</th>
        <th>Acciones</th>
    </tr>
    <thead>
    <tbody>
    @foreach ($ideas as $idea)
    <tr>
        <td>{{ $idea->titulo }}</td>
        <td>{{ $idea->descripcion }}</td>
        <td>{{ $idea->numero_votos }}</td>
        <td>
            <?php
            echo ($idea->estado_publicacion == 1)? 'Aprobado':'No aprobado';
            ?>


        </td>
        <td>{{$idea->categoriaNombre}}</td>
        <td class="center">
            {{HTML::decode(
            HTML::link('admin/ideas/'.$idea->id,'
            <i class="icon-eye"></i>
            ',['class' => 'edit'])
            )}}
            {{HTML::decode(
            HTML::link('admin/ideas/destroy/'.$idea->id,'
            <i class="icon-close"></i>
            ',['class' => 'delete', 'onclick' => "return confirm('Esta seguro de eliminar la idea?')"])
            )}}

        </td>
    </tr>

    @endforeach
    </tbody>
</table>



</section>
@stop

@section('javascript')
{{HTML::script('js/ideasAdmin.js')}}

</script>
@stop