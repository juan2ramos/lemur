@extends('layouts.layout')

@section('contend')

<section id='contend'>
    <div class="perfil">
        <h2>Perfil</h2>

        <p>Cambia la información de tu perfil y manten actualizados tus datos.</p>

        {{ Form::open(array('url' => 'updateUser', 'id'=>'user-update','files'=> true)) }}

        <div id="profile-picture">
                <p>Foto de perfil</p>
                <figure>
                    <?php
                        $imageUser = (empty($user['imagen']))?'images/user-profile.png':'upload/'.$user['imagen'];
                    ?>
                    {{HTML::image($imageUser,null,['id'=>'imagen-perfil'])}}
                </figure>
                <div id="contend-picture">
                    <p id="p-picture">
                        Puedes subir un archivo JPG, GIF o PNG con un peso menor a 3MB. Al cargar un archivo estas
                        declarando que tienes los permisos para distribuir esta foto y que
                        no violas los derechos de autor.
                    </p>
                    <label class="cargar">
                        Seleccionar archivo<span>
							    <input type="file" id="imagenUser" name="imagenUser"/>
							    </span>
                    </label>
                    <input type="text" id="url-archivo"  placeholder="No se ha seleccionado ningún archivo"/>
                </div>
            </div>
            <h3>Información de perfil</h3>
            <input type="text" name="nombre" class="half" placeholder="Nombres" value="{{$user['nombre']}}">
            <input type="text" name="apellidos" class="half" placeholder="Apellidos" value="{{$user['apellidos']}}">
            <input type="text" name="email" class="half" placeholder="Correo electrónico" value="{{$user['email']}}">
            <input type="text" name="user_name" class="half" placeholder="Nombre de usuario" value="{{$user['user_nameº']}}">

            <input type="text" name="edad" class="half" placeholder="Edad" value="{{$user['edad']}}">
            <input type="text" name="genero" class="half" placeholder="Género" value="{{$user['genero']}}">
            <input type="text" name="profesion" class="half" placeholder="Profesión" value="{{$user['profesion']}}">
            <input type="text" name="nivel_estudios" class="half" placeholder="Nivel de estudios" value="{{$user['nivel_estudios']}}">
            <input type="text" name="intereses" class="half" placeholder="Intereses" value="{{$user['intereses']}}">
            <input type="text" name="estado_civil" class="half" placeholder="Estado civil" value="{{$user['estado_civil']}}">
            <input type="text" name="pais" class="half" placeholder="País" value="{{$user['pais']}}">
            <input type="text" name="ciudad" class="half" placeholder="Ciudad" value="{{$user['ciudad']}}">

            <input type="text" name="password" class="half" placeholder="Nueva contraseña" >
            <input type="text" name="password_confirmation" class="half" placeholder="Confirmar nueva contraseña">

            <textarea  name="sobre_ti" placeholder="Cuentanos sobre tí" class="text">{{$user['sobre_ti']}}</textarea>
            <textarea name="habilidades" placeholder="Cuales son tus habilidades especiales" class="text">{{$user['habilidades']}}</textarea>
            {{ Form::hidden('images', 'null', array('id' => 'imagesUpload')) }}
            <input class="submit2" type="submit" value="Guardar">
        </form>
    </div>
</section>
@stop

@section('javascript')
{{HTML::script('js/updateUser.js')}}
{{HTML::script('js/upload.js')}}

@stop