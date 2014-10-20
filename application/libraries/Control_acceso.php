<?php

class Control_acceso {

    public function __construct() {
        $this->CI = & get_instance();

        $controller = $this->CI->router->fetch_class();
        $method = $this->CI->router->fetch_method();
        $is_login = $this->CI->session->userdata('is_login');
        if ($controller != 'login' && !$is_login) {
            redirect('seguridad/login');
        } else if ($controller === 'login' && $is_login && $method != 'salir') {
            redirect('admin');
        }
    }

    public function crearSession() {
        $password = sha1($this->CI->input->post('password'));
        $passwordF = hash('sha256', $password);
        $query = $this->CI->db
                ->select('U.*')
                ->from('usuario U')
                ->where('U.usuario', $this->CI->input->post('usuario'))
                ->where('U.password', $passwordF)
                ->get()
                ->row();
        if ($query) {
            $data = array(
                'is_login' => TRUE,
                'id_usuario' => $query->id,
                'usuario' => $query->usuario,
                'email' => $query->email,
                'fecha_creacion' => $query->created
            );
            $this->CI->session->set_userdata($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
