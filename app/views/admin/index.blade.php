@extends('layouts.admin')
@section('title')
	{{ $title }}
@stop


@section('content')
    <h1>Ñandú</h1>
    <?php echo HTML::link('test/hola','ir a hola',array('id' => 'link')); ?>
    <?php echo HTML::image('image/juan2ramos_logo.svg','texto', array('class' => 'image')) ?>
@stop


@section('javascript')
	<?php echo HTML::script('js/script.js') ?>
@stop