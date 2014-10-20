<?php

class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $data = array(
            'titulo' => 'Administrador Biblioteca',
            'contenido' => 'admin'
        );
        $this->load->view(THEME . TEMPLATE, $data);
    }
}

