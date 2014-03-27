<?php


class Publicidad extends Eloquent
{

    protected $table = 'publicidad';
    private $errors = [];
    protected $fillable = ['titulo', 'texto', 'imagen','estado'];



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