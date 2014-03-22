<?php


class Comentarios extends Eloquent
{

    protected $table = 'comentarios';
    private $errors = [];
    protected $fillable = ['id_user', 'id_idea', 'comentario','estado'];

    public function users()
    {
        return $this->belongsTo('User', 'id_users');
    }

    function isValid($input)
    {
        $rules = ['comentario' => ['required']];
        $messages = ['comentario.required' => 'Comentario requerido',];
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->passes())
            return true;

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


}