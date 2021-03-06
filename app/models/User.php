<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    private $errors;
    protected $table = 'users';
    protected $fillable =
        ['email',
            'nombre',
            'apellidos',
            'password',
            'edad',
            'genero',
            'profesion',
            'nivel_estudios',
            'intereses',
            'estado_civil',
            'pais',
            'ciudad',
            'sobre_ti',
            'habilidades',
            'imagen',
            'role',
            'screen_name_twitter',
            'activo',
            'key'
        ];
    protected $perPage = 2;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }


    /**
     * @param $data
     * @return bool
     */
    public function isValid($data)
    {
        $rules = [
            'email' => 'required|email',
            'nombre' => 'required|min:4|max:40',
            'password' => 'min:8',
            'apellidos' => 'required'
        ];
        $mesages = [
            'email.required' => 'El mail es requerido',
            'email.email' => '¡Ups! verifica que tu correo este correcto.',
            'email.unique' => 'este usuario ya existe',
            'nombre.required' => 'Nombre es requerido',
            'nombre.min' => 'el nombre debe ser minimo de 4 caracteres',
            'password.min' => 'minimo 8 caracteres',
            'apellidos.required' => 'El apellido es requerido',
            'password.required' => 'la contraseña es requerida'
        ];
        if ($this->exists) {


        } else { // Si no existe...
            $rules['email'] .= '|unique:users';
            $rules['password'] .= '|required';
        }
        $validator = Validator::make($data, $rules, $mesages);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if (!empty ($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    function ideas()
    {

        return $this->hasMany('Ideas', 'id_users');

    }

    /**
     * @return string
     */
    public function getErrors()
    {
        return $this->errors;
    }

}