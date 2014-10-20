<?php

class Usuario_model extends CI_Model{
    
    public function checkUsuario(){
        return $this->db
                ->where('usuario',$this->input->post('usuario'))
                ->get('usuario')
                ->result();
    }
}

