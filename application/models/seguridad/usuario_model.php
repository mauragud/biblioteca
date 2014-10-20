<?php

class Usuario_model extends CI_Model{
    
    public function checkUsuario($tabla){
        return $this->db
                ->where('usuario',$this->input->post('usuario'))
                ->get($tabla)
                ->result();
    }
    
    
    public function crear($tabla){
        $password = sha1($this->input->post('password'));
        $data = array(
            'usuario' => $this->input->post('usuario'),
            'password' => hash('sha256', $password),
            'email' => $this->input->post('email')
        );
        return $this->db->insert($tabla, $data);
    }
}

