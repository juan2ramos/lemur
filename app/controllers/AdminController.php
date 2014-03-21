<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.admin';

	public function getIndex()
	{
		Session::put('nombre', 'juan');
		$title = 'Administracion';
		return $this->layout->content = View::make('admin.index',compact('title'));
	}
	public function getSession()
	{
		Session::forget('nombre');
		$title = 'sesion destroy';
		return $this->layout->content = View::make('admin.index',compact('title'));
	}

}