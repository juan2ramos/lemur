 @if ($errors->any())
    <div class="alert-danger">
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif
 @if ($success)
 <div id="success" >
     <p>usuario actualizado</p>
 </div>

 @endif