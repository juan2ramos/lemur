<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
    {{HTML::image('images/lemur.png')}}
		<h2>Nuevo comentario</h2>
         <p>Link idea  {{HTML::link('admin/ideas/'.$id_idea)}}  </p>
        <h3>Comentario :</h3>
        <p>{{$comentario}}</p>
	</body>
</html>