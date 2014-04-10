<?php


/**
 * Class Ideas
 */
class   Ideas extends Eloquent
{
    protected $perPage = 2;
    protected $table = 'ideas';
    protected $fillable =
        [
            'titulo',
            'descripcion',
            'problematica',
            'solucion',
            'url_video',
            'id_categorias',
            'id_users',
            'estado_publicacion',
            'numero_votos'
        ];
    private $errors = [];

    function images()
    {

        return $this->hasMany('Imagenes', 'id_idea');

    }

    public function categorias()
    {
        return $this->belongsTo('Categorias', 'id_categorias');
    }

    public function users()
    {
        return $this->belongsTo('User', 'id_users');
    }

    function votos()
    {

        return $this->hasMany('Votos', 'id_idea');

    }
    public function votosPersona(){
        return $this->belongsToMany('user', 'votos', 'id_idea', 'id_usuario');
    }
    public function isValid($data)
    {
        $rules = [
            'titulo' => ['required', 'max:30'],
            'descripcion' => ['required', 'max:500'],
            'problematica' => ['required', 'max:500'],
            'solucion' => ['required', 'max:500'],
            'captchaSum' => ['required', 'same:captcha'],
            'id_categorias' => ['not_in:0'],
        ];

        $messages = [
            'titulo.max' => 'max',
            'descripcion.max' => 'max des.',
            'problematica.max' => 'Tmax.',
            'solucion.max' => 'Tmaxxx',
            'url_video.url' => 'url',
            'id_categorias.numeric' => 'numeric',
            'captchaSum.same' => '¡Ups! suma incorrecta. ',
            'images.not_in' => 'Imagen requerida',
            'id_categorias.digits_between' => 'digits_between:1,3',
            'titulo.required' => 'atributo requerido',
            'descripcion.required' => 'atributo requerido.',
            'problematica.required' => 'atributo requerido',
            'solucion.required' => 'atributo requerido',
            'url_video.required' => 'atributo requerido',
            'id_categorias.not_in' => 'Debe seleccionar una categoría',
            'captchaSum.required' => 'atributo requerido',
        ];
        $validator = Validator::make($data, $rules, $messages);

        /*
        $validator->sometimes('images', 'not_in:null', function ($data) {
            return empty($data->url_video);
        });
        $validator->sometimes('url_video', 'required|url', function ($data) {
            return $data->images == 'null';
        });
        */
        if ($validator->passes()) {
            return true;
        }
        $this->errors = $validator->errors();

        return false;
    }

    /**
     * @return array
     */
    public function getErrors()
    {


        return $this->errors;
    }

    public function comentarios()
    {
        return $this->belongsToMany('user', 'comentarios', 'id_idea', 'estado')->withPivot('comentario');
    }

    public function comentariosAll()
    {
        return $this->belongsToMany('user', 'comentarios', 'id_idea', 'id_user')->withPivot('comentario', 'created_at','id');
    }

}