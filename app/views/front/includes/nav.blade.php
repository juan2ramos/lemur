				<ul>
                    <?php
                    $menu = Menu::where('activo', '=', '1')->get();

                    ?>
                    @foreach($menu as $link)
                    <?php $current = (Request::path() == $link->url)?'current':''?>
                    <li class="{{$link->id_html}}-class {{$current}}">

                        {{ HTML::decode(HTML::link($link->url, '<p>' .$link->texto. '</p>', array('id' => $link->id_html))) }}

                    </li>
                    @endforeach

                </ul>
