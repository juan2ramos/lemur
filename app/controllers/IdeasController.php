<?php
use Carbon\Carbon;

/**
 * Class IdeasController
 */
class IdeasController extends \BaseController
{


    /**
     * @return View
     */
    public function getIndex()
    {
        $ideas = new Ideas;
        $hidden = 'hidden';
        $categorias = Categorias::whereRaw('estado = 1 and NOW() BETWEEN fecha_inicio AND fecha_cierre')->lists('nombre', 'id');
        $combobox = [0 => "Elige una categoría "] + $categorias;

        return View::make('front.ideasForm', compact('ideas', 'categorias', 'form_data', 'hidden', 'combobox'));

    }

    /**
     * @return Json
     */
    public function create()
    {
        $images = explode(';', input::get('images'));
        $idea = new Ideas;

        $ideaData = Input::all();
        $ideaData['id_users'] = Auth::user()->id;
        if ($idea->isValid($ideaData)) {
            $idea = Ideas::create($ideaData);
            array_shift($images);
            foreach ($images as $image) {
                $img = Imagenes::create(['url' => $image]);
                $idea->images()->save($img);
            }
            return Response::json(['success' => true, 'message' => 'Tu idea ha sido suboda corretamente']);
        }

        return Response::json($idea->getErrors());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        if ($user->isValid($data)) {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        } else {
            return Response::json($user->getErrors());
        }
        //return Input::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function showAllForCategories($id)
    {
        if (!Categorias::open($id)) return Redirect::to('/categorias');

        $cierreCategoria = Carbon::parse(Categorias::find($id)->fecha_cierre)->endOfDay();

        $ideas = Ideas::whereRaw('id_categorias = ' . $id . ' and estado_publicacion = 1')->get();

        if ($ideas->isEmpty())
            return Redirect::to('/categorias');
        $ideasImage = $this->imagenesForideas($ideas);
        $categoria = Categorias::find($id);
        $crono = true;

        return View::make('front.vota-por-una-idea', compact('categoria','ideasImage', 'crono', 'cierreCategoria'));

    }

    function search()
    {
        //$ideas = Ideas::whereRaw('titulo LIKE "%' . Input::get('word') . '%" and estado_publicacion = 1 ')->get();
        $ideas =  DB::table('categorias')
            ->join('ideas', 'categorias.id', '=', 'ideas.id_categorias')
            ->whereRaw('categorias.estado = 1
            AND NOW() BETWEEN categorias.fecha_inicio AND categorias.fecha_cierre
            AND ideas.estado_publicacion = 1
                AND ideas.titulo LIKE "%' . Input::get('word') . '%"')
            ->select('ideas.*')
            ->get();
            ;



        if (is_null($ideas))
            return Redirect::to('/categorias');
        $ideasImage = $this->imagenesForideasSearch($ideas);
        $cierreCategoria = null;
        return View::make('front.search', compact('ideasImage','cierreCategoria'));

    }
    private function imagenesForideasSearch($ideas)
    {

        foreach ($ideas as $key => $value) {

            $idea = Ideas::find($value->id);

            $ideas[$key]->imagen = (empty($idea->images[0])) ? 'images/detalle_idea.jpg' : 'upload/' . $idea->images[0]['url'];

            //$ideas[$key]->voto = $idea->votos->count();

        }

        return $ideas;

    }
    /**
     * @param $ideas
     * @return mixed
     */
    private function imagenesForideas($ideas)
    {

        foreach ($ideas as $key => $value) {

            $idea = Ideas::find($value['id']);

            $ideas[$key]->imagen = (empty($idea->images[0])) ? 'images/detalle_idea.jpg' : 'upload/' . $idea->images[0]['url'];

            //$ideas[$key]->voto = $idea->votos->count();

        }

        return $ideas;

    }

    public function votar()
    {
        if (!Auth::user()) {
            return Response::json(['success' => 2]);
        }
        $id_idea = Input::get('id');
        $id_usuario = Auth::user()->id;
        $votos = Votos::whereRaw('id_usuario = ' . $id_usuario . ' and id_idea = ' . $id_idea)->get();
        if (!$votos->isEmpty()) {
            return Response::json(['success' => 0, 'message' => 'Ya votaste por esta idea']);
        }

        $votosNew = new Votos;
        $votosNew->id_idea = $id_idea;
        $votosNew->id_usuario = $id_usuario;
        $votosNew->save();
        $idea = Ideas::find($id_idea);
        $NVotos = $idea->numero_votos + 1;
        $idea->numero_votos = $NVotos;
        $idea->save();
        return Response::json(['success' => 1, 'votos' => $NVotos, 'id' => $id_idea, 'message' => 'aro']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        if (!is_numeric($id)) return Redirect::to('/categorias');
        $idea = Ideas::whereRaw('id = ' . $id . ' and estado_publicacion = 1')->get();
        if ($idea->isEmpty()) return Redirect::to('/categorias');
        if (!Categorias::open($idea[0]->id_categorias)) return Redirect::to('/categorias');
        $cierreCategoria = Carbon::parse(Categorias::find($idea[0]->id_categorias)->fecha_cierre)->endOfDay();


        $images = $idea[0]->images;
        $user = $idea[0]->users;
        $UserIdea['imagen'] = $user['imagen'];
        $UserIdea['nombre'] = $user['nombre'];
        $video = (empty($idea[0]->url_video)) ? false : $idea[0]->url_video;
        if ($video) {
            $url = explode("=", $video);
            $video = (empty($url[1])) ? false : $url[1];
        }
        $crono = true;
        $comentarios = $this->comentarios($id);
        return View::make('front.detalle-idea', compact('video', 'idea', 'images', 'UserIdea', 'comentarios', 'crono', 'cierreCategoria'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return 'error 404';
        }
        $form_data = ['route' => ['admin.users.update', $user->id], 'method' => 'PATCH'];
        $action = 'Editar';

        return View::make('admin/users/form', compact('user', 'form_data', 'action'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);

        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null($user)) {
            App::abort(404);
        }

        // Obtenemos la data enviada por el usuario
        $data = Input::all();

        // Revisamos si la data es válido
        if ($user->isValid($data)) {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        } else {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors($user->errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Ideas::destroy($id);
        return Redirect::to('admin/idea');
    }

    function  adminShow($id = false)
    {

        $categorias = [0 => "Todas las categorías "] + Categorias::all()->lists('nombre', 'id');

        if (!$id || $id == 0) {
            $id = 0;
            $ideas = Ideas::paginate(20);
            return View::make('admin/ideas/list', compact('ideas', 'categorias', 'id'));
        }
        $ideas = Ideas::where('id_categorias', '=', $id)->paginate(20);

        return View::make('admin/ideas/list', compact('ideas', 'categorias', 'id'));


    }

    public function comentarios($id)
    {
        return Ideas::find($id)->comentarios;
    }

    function adminUpdate($id)
    {
        $idea = Ideas::find($id);
        $user = $idea->users;
        $comentarios = $idea->comentariosAll->all();
        $categorias = Categorias::all()->lists('nombre', 'id');
        $comboBox = $categorias;
        $comboBoxPublicacion = [
            0 => 'Inactivo',
            1 => 'Activo'
        ];
        $images = $idea->images;

        $votos = $idea->votosPersona;
        return View::make('admin/ideas/form', compact('idea', 'user', 'comentarios', 'comboBox', 'comboBoxPublicacion', 'images', 'votos'));

    }

    function updateAdmin()
    {
        $input = Input::all();
        $idea = Ideas::find(Input::get('id'));
        $idea->fill($input);
        $idea->save();

        if($idea['estado_publicacion'] == 1){
            $data = [
                'id' => $idea['id'],
                'titulo' => $idea['titulo'],

            ];
            $user = User::find($idea['id_users']);
            Mail::send('emails.ideaAprobada', $data, function ($message) use ($user){

                $message->subject('Idea Aprobada');
                $message->to($user['email']);
            });
        }

        $categorias = Categorias::all()->lists('nombre', 'id');
        $user = $idea->users;
        $comboBox = $categorias;
        $comboBoxPublicacion = [
            0 => 'Inactivo',
            1 => 'Activo'
        ];
        $images = $idea->images;
        $comentarios = $idea->comentariosAll->all();
        $votos = $idea->votosPersona;
        return View::make('admin/ideas/form', compact('idea', 'user', 'comentarios', 'comboBox', 'comboBoxPublicacion', 'images', 'votos'));


    }
}