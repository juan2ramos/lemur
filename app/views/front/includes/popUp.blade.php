<section id="popUp-contend">
    <div class="close">
        {{HTML::image('images/close2.png')}}

    </div>
    <div id="ingresa-cuenta" class="hidden">
        <h2>Ingresa a tu Cuenta</h2>
        {{ Form::open(array('url' => 'login', 'id'=>'form-login')) }}


        <div class="form">
            <label for="email">Correo electrónico:<span>*</span></label>
            <input type="text" name="email">
            <label for="password">Contraseña:<span>*</span></label>
            <input type="password" name="password">
            <a href="password">¿Olvidaste tu contraseña?</a>
            <input type="submit" value="Ingresa" id="sumbit-inicio">
        </div>
        <div class="form form-net">
            <p>Ingresa con</p>
            <ul>
                <li>
                   {{HTML::decode(HTML::link('facebook',
                    '<img src="images/facebook.png" alt=""/>')
                   )}}

                </li>

                <!--  <li>
                     <div id="signin-button" class="show">
                         <div class="g-signin"
                              data-callback="loginFinishedCallback"
                              data-clientid="798327401166-gkbconqk72a7t73prfp8rd6svpdss9q4.apps.googleusercontent.com"
                              data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
                              data-height="short"
                              data-cookiepolicy="single_host_origin"
                              data-width = "iconOnly"
                              data-cookiepolicy = "none"
                              data-accesstype = offline
                             >
                         </div>
                 </li> -->
             </ul>

         </div>
         {{ Form::close() }}
     </div>
     <div id="registra-cuenta" class="hidden">
         <h2>Regístrate</h2>

         {{ Form::open(array('url' => 'register', 'id'=>'form-register')) }}
             <div class="form">
                 <label for="nombre">Nombre:<span>*</span></label>
                 <input name="nombre" type="text">
                 <label for="apellidos">Apellidos:<span>*</span></label>
                 <input name="apellidos" type="text">
                 <label for="email">Correo electrónico:<span>*</span></label>
                 <input name="email" type="text">
                 <label for="password">contraseña:<span>*</span></label>
                 <input type="password" name="password" >
                 <input type="submit" value="Regístrate" id="sumbit-registro">
                 <p class="term">
                     Al crear tu cuenta aceptas los
                     <a href="terminos-y-condiciones"> terminos y condiciones.</a>
                 </p>
             </div>
             <div class="form form-net">
                 <p>Regístrate con</p>
                 <ul>
                     <li>
                         {{HTML::decode(HTML::link('facebook',
                         '<img src="images/facebook.png" alt=""/>')
                         )}}

                     </li>



 <!--                    <li>
                         <div id="signin-button" class="show">
                             <div class="g-signin"
                                  data-callback="loginFinishedCallback"
                                  data-clientid="798327401166-gkbconqk72a7t73prfp8rd6svpdss9q4.apps.googleusercontent.com"
                                  data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
                                  data-height="short"
                                  data-cookiepolicy="single_host_origin"
                                  data-width = "iconOnly"
                                 >
                             </div>
                     </li> -->
                </ul>


            </div>
        {{ Form::close() }}
    </div>
    <div id="contend-about" class="hidden">
        <h1>Lemur Studio</h1>

        <h3>Sobre nosotros</h3>

        <p>En Lemur Studio estamos continuamente en la tarea de dar a conocer cada vez más el Diseño en Colombia,
            mostrar su importancia en una sociedad y cómo éste puede ayudarla en gran manera. Es así como grandes países
            desarrollados como Alemanía, Suiza y otros, se basan en el Diseño, el desarrollo y la innovación como motor
            de desarrollo y progreso de su país.</p>

        <p>En Lemur Studio, y con éste proyecto queremos ayudar a la sociedad a diseñar, producir y comercializar las
            ideas de producto que tienen pero que por alguna razón no las han podido hacer realidad, retribuyéndoles
            económicamente por ello, dándoles a conocer el diseño y haciéndolos parte de él.</p>

        <div id="images">
            <img src="images/pajaro.png">
            <img src="images/pajaro2.png">
            <img src="images/gato.png">
        </div>
        <p>Al igual que muchas de las empresas más innovadoras, Lemur Studio tiene la visión de diseñar desde la
            perspectiva del usuario y de manera participativa, esto ha inspirado y convencido a diversos clientes y les
            da la confianza para llegar a Lemur Studio, en donde constantemente les proporcionamos experiencias
            extraordinarias, que se traducen en el retorno de su inversión, ya que sin importar su tamaño, todos
            nuestros clientes son igual de importantes y nuestro objetivo es darles soluciones que lleguen más allá de
            sus expectativas.</p>

        <p>Nuestro trabajo, no es un trabajo cualquiera, es un trabajo en donde nos mueve la pasión, nos divertimos y
            disfrutamos haciéndolo, razón por la cual podemos prometer resultados excelentes.</p>

        <p>“La única manera de hacer un gran trabajo es amar lo que se hace”<br>
            Steve Jobs.</p>
    </div>
    <div id="popUp-detail" class="hidden">
        <figure>

            <img src="images/detalle_idea.jpg">

            <div id="prev"><</div>
            <div id="next">></div>
        </figure>
    </div>
</section>
{{HTML::link('google','',['id' => 'google'])}}