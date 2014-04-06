@extends('layouts.admin')

@section('contend')
<h1>Menú</h1>


<table class=" table-primary ">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>Estado</th>

    </tr>
    <thead>
    <tbody>
    @foreach ($menu as $link)
    <tr>
        <td>{{ $link->texto }}</td>
        <td class="center">
            <?php $check = ($link->activo == 1)?'checked':'';?>
            {{Form::checkbox('activo', 'value', $check ,['class' => 'check','data-id' => $link->id ])}}
        </td>


    </tr>

    @endforeach
    </tbody>
</table>
{{HTML::link('admin/menu','',['id' => 'updateMenu'])}}
</section>
@stop

@section('javascript')
{{HTML::script('js/menu.js')}}
@stop