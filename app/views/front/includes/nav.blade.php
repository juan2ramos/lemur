				<ul>
                    <?php
                    $menu = Menu::where('activo', '=', '1 order by id DESC')->get();
                    $pieces = explode('/', Request::path());
                    $sub = '';
                    if(!empty($pieces[0])){
                        $sub = ($pieces[0] == 'vota-por-una-idea' || $pieces[0] == 'detalle-idea')?'categorias':false;
                    }
                    if($pieces[0] == 'envioTrabajo'){
                        $sub = 'trabaja-en-lemur';
                    }
                    if($pieces[0] == 'envioContacto'){
                        $sub = 'contacto';
                    }
                    if($pieces[0] == 'registro'){
                        $sub = '/';
                    }

                    ?>
                    @foreach($menu as $link)
                    <?php
                    if(!$sub)
                        $current = (Request::path() == $link->url)?'current':'';
                    else
                        $current = ($sub == $link->url)?'current':'';


                    ?>
                    <li class="{{$link->id_html}}-class {{$current}}">

                        {{ HTML::decode(HTML::link($link->url, '<p>' .$link->texto. '</p>', array('id' => $link->id_html))) }}

                    </li>
                    @endforeach

                </ul>
