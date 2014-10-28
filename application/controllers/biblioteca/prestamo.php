<?php

class Prestamo extends CI_Controller {

    var $controlador;
    var $titulo_controlador;
    var $url;
    var $vista;

    public function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/' . modelo(), 'Controlador_model');
        $this->load->model(array('biblioteca/Libro_model'));
        $this->controlador = controlador();
        $this->titulo_controlador = humanize($this->controlador);
        $this->url = base_url() . 'biblioteca/' . $this->controlador;
        $this->vista = 'biblioteca/' . $this->controlador . '/';
    }

    public function index() {
        $data = array(
            'titulo' => $this->titulo_controlador,
            'contenido' => $this->vista . 'index',
            'datas' => $this->Controlador_model->getAll($this->controlador),
            'breads' => array(array('ruta' => 'javascript:;', 'titulo' => $this->titulo_controlador))
        );
        $this->load->view(THEME . TEMPLATE, $data);
    }

    public function crear() {
        if ($this->form_validation->run($this->controlador)) {
            if ($this->Controlador_model->crear($this->controlador)) {
                mensaje_alerta('hecho', 'crear');
            } else {
                mensaje_alerta('error', 'crear');
            }
            redirect($this->url);
        } else {
            $data = array(
                'titulo' => 'Crear ' . $this->titulo_controlador,
                'contenido' => $this->vista . 'crear',
                'array' => $this->Libro_model->getArray('libro'),
                'breads' => array(array('ruta' => $this->url, 'titulo' => $this->titulo_controlador),
                    array('ruta' => 'javascript:;', 'titulo' => 'Crear'))
            );
            $this->load->view(THEME . TEMPLATE, $data);
        }
    }

    public function actualizar($id = FALSE) {
        if ($id) {
            $this->Controlador_model->actualizar($this->controlador, $id);
            mensaje_alerta('hecho', 'actualizar');
            redirect($this->url);
        } else {
            show_404();
        }
    }

}
