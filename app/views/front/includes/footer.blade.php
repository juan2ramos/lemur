				<p>
                    ®2013 Todos los Derechos Reservados Lemur Studio 
                    <a href="mailto:info@lemurstudio.com.co" >info@lemurstudio.com.co</a> 
                    - Desarrollado por:                     
                </p>
                {{
                    HTML::decode(
                        HTML::link('http://mi-martinez.com',
                            HTML::image(
                                'images/logomim.png','mi-martinez.com'
                            ),
                            ['target' => '_blank','title' => 'Diseño Web']
                        )
                    )
                }}
                <p> y </p> 
                {{
                    HTML::decode(
                        HTML::link('http://mouseinteractivo.com',
                            HTML::image(
                                'images/mouseint.png','Mouse Intercativo'
                            ),
                            ['target' => '_blank','title' => 'Diseño Web Bogotá']
                        )
                    )
                }}