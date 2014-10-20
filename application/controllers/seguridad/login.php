<?php

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|callback__verificar_usuario');
        $this->form_validation->set_message('_verificar_usuario', 'Usuario o Contraseña incorrecta');
        if ($this->form_validation->run()) {
            if (!$this->control_acceso->crearSession()) {
                redirect('seguridad/login');
            } else {
                redirect('admin');
            }
        } else {
            $this->load->view('seguridad/login/index');
        }
    }
    
    public function _verificar_usuario() {
        $password = sha1($this->input->post('password'));
        $passwordF = hash('sha256', $password);
        
        $query = $this->db
                ->where('usuario', $this->input->post('usuario'))
                ->where('password', $passwordF)
                ->get('usuario');
        if ($query->num_rows() > 0)
            return TRUE;
        return FALSE;
    }
    
    public function salir() {
        $this->session->sess_destroy();
        redirect('seguridad/login');
    }
}

