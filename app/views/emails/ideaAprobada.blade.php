<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
    {{HTML::image('images/lemur.png')}}
		<h2>Tu idea fue aprobada</h2>
        <p>Felicitaciones! tu idea {{HTML::link('vota-por-una-idea/'.$id ,$titulo)}} ha sido aprobada por el equipo de Diseño! Consigue la mayor cantidad de votos para hacer de tu idea la ganadora! Éxitos!</p>


	</body>
</html>