<?php

require_once(dirname(__DIR__,1).'/define.php');
require_once(BASE_DIR.'/models/Controller.php');

class GenreController extends Controller {
  public function index(){
    $this->view('Genre/index');
  }
}