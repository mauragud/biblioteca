<?php

class Usuario extends CI_Controller {

    var $controlador;
    var $titulo_controlador;
    var $url;
    var $vista;

    public function __construct() {
        parent::__construct();
        $this->load->model('seguridad/' . modelo(), 'Controlador_model');
        $this->controlador = controlador();
        $this->titulo_controlador = humanize($this->controlador);
        $this->url = base_url() . 'seguridad/' . $this->controlador;
        $this->vista = 'seguridad/' . $this->controlador . '/';
    }

    public function index() {
        
    }

    public function crear() {
        if ($this->form_validation->run()) {
            
        } else {
            $data = array(
                'titulo' => 'Crar ' . $this->titulo_controlador,
                'contenido' => $this->vista . 'crear'
            );
            $this->load->view(THEME . TEMPLATE, $data);
        }
    }

    public function check_usuario() {
        if ($this->input->is_ajax_request()) {
            if ($this->Controlador_model->checkUsuario()) {
                $this->output->set_output('false');
            } else {
                $this->output->set_output('true');
            }
        } else {
            show_404();
        }
    }

}
