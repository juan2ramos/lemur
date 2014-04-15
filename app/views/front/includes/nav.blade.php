				<ul>
                    <?php
                    $menu = Menu::where('activo', '=', '1 order by id DESC')->get();
                    $pieces = explode('/', Request::path());
                    $sub = '';
                    if(!empty($pieces[0])){
                        $sub = ($pieces[0] == 'vota-por-una-idea' || $pieces[0] == 'detalle-idea')?'categorias':false;
                    }
                    ?>
                    @foreach($menu as $link)
                    <?php
                        $current = (Request::path() == $link->url)?'current':'';
                        $current = ($sub == $link->url)?'current':'';

                    ?>
                    <li class="{{$link->id_html}}-class {{$current}}">

                        {{ HTML::decode(HTML::link($link->url, '<p>' .$link->texto. '</p>', array('id' => $link->id_html))) }}

                    </li>
                    @endforeach

                </ul>
