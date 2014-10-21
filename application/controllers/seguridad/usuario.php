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
                'breads' => array(array('ruta' => $this->url, 'titulo' => $this->titulo_controlador),
                    array('ruta' => 'javascript:;', 'titulo' => 'Crear'))
            );
            $this->load->view(THEME . TEMPLATE, $data);
        }
    }

    public function actualizar($id = FALSE) {
        if ($id) {
            if ($this->form_validation->run('actualizar_usuario')) {
                if ($this->Controlador_model->actualizar($this->controlador)) {
                    mensaje_alerta('hecho', 'actualizar');
                } else {
                    mensaje_alerta('error', 'actualizar');
                }
                redirect($this->url);
            } else {
                $data = array(
                    'titulo' => 'Crear ' . $this->titulo_controlador,
                    'contenido' => $this->vista . 'crear',
                    'data' => $this->Controlador_model->get($id, $this->controlador),
                    'breads' => array(array('ruta' => $this->url, 'titulo' => $this->titulo_controlador),
                        array('ruta' => 'javascript:;', 'titulo' => 'Crear'))
                );
                $this->load->view(THEME . TEMPLATE, $data);
            }
        } else {
            show_404();
        }
    }
    
    public function eliminar($id = FALSE){
        if($id){
            if($this->Controlador_model->eliminar($id,$this->controlador)){
                mensaje_alerta('hecho', 'eliminar');
            }else{
                mensaje_alerta('error', 'eliminar');
            }
            redirect($this->url);
        }else{
            show_404();
        }
    }

    public function check() {
        if ($this->input->is_ajax_request()) {
            if ($this->Controlador_model->checkUsuario($this->controlador)) {
                $this->output->set_output('false');
            } else {
                $this->output->set_output('true');
            }
        } else {
            show_404();
        }
    }

}
