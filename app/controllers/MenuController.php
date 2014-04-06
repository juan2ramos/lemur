<?php


class menuController extends  \BaseController{




    public function show(){


        $menu = Menu::all();
        return View::make('admin.menu',compact('menu'));


    }
    function update(){

        $menu = Menu::find(Input::get('id'));
        $menu->fill(Input::all());
        $menu->save();
        return Response::json(['success' => '1']);
    }

} 