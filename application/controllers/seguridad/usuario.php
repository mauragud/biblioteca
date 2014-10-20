<?php

class Usuario extends CI_Controller {

    var $controlador;
    var $titulo_controlador;
    var $url;
    var $vista;

    public function __construct() {
        parent::__construct();
        $this->controlador = controlador();
        $this->titulo_controlador = humanize($this->controlador);
        $this->url = base_url() . 'seguridad/' . $this->controlador;
        $this->vista = 'seguridad/' . $this->controlador . '/';
    }

    public function index() {
        
    }

    public function crear() {
        if ($this->form_validation->run()) {
          echo 'prueba';
        } else {
            $data = array(
                'titulo' => 'Crar ' . $this->titulo_controlador,
                'contenido' => $this->vista . 'crear'
            );
            $this->load->view(THEME . TEMPLATE, $data);
        }
    }

}
