<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends Controller {
	public function index()
	{
		$this->render('home');
	}
}
