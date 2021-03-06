<?php

class Libro extends CI_Controller {

    var $controlador;
    var $titulo_controlador;
    var $url;
    var $vista;

    public function __construct() {
        parent::__construct();
        $this->load->model('biblioteca/' . modelo(), 'Controlador_model');
        $this->load->model(array('parametrizacion/Tipo_libro_model', 'parametrizacion/Ubicacion_model'));
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
                'array' => $this->Tipo_libro_model->getArray('tipo_libro'),
                'array1' => $this->Ubicacion_model->getArray('ubicacion'),
                'breads' => array(array('ruta' => $this->url, 'titulo' => $this->titulo_controlador),
                    array('ruta' => 'javascript:;', 'titulo' => 'Crear'))
            );
            $this->load->view(THEME . TEMPLATE, $data);
        }
    }

    public function actualizar($id = FALSE) {
        if ($id) {
            if ($this->form_validation->run($this->controlador)) {
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
                    'array' => $this->Tipo_libro_model->getArray('tipo_libro'),
                    'array1' => $this->Ubicacion_model->getArray('ubicacion'),
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

    public function eliminar($id = FALSE) {
        if ($id) {
            if ($this->Controlador_model->eliminar($id, $this->controlador)) {
                mensaje_alerta('hecho', 'eliminar');
            } else {
                mensaje_alerta('error', 'eliminar');
            }
            redirect($this->url);
        } else {
            show_404();
        }
    }

    public function check() {
        if ($this->input->is_ajax_request()) {
            if ($this->Controlador_model->check($this->controlador)) {
                $this->output->set_output('false');
            } else {
                $this->output->set_output('true');
            }
        } else {
            show_404();
        }
    }

}
