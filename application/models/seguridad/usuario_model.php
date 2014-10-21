<?php

class Usuario_model extends CI_Model {

    public function getAll($tabla) {
        return $this->db
                        ->get($tabla)
                        ->result();
    }

    public function get($id, $tabla) {
        return $this->db
                        ->where('id', $id)
                        ->get($tabla)
                        ->row();
    }

    public function crear($tabla) {
        $password = sha1($this->input->post('password'));
        $data = array(
            'usuario' => $this->input->post('usuario'),
            'password' => hash('sha256', $password),
            'email' => $this->input->post('email')
        );
        return $this->db->insert($tabla, $data);
    }

    public function actualizar($tabla) {
        if ($this->input->post('password')) {
            $password = sha1($this->input->post('password'));
            $data['password'] = hash('sha256', $password);
        }
        $data['usuario'] = $this->input->post('usuario');
        $data['email'] = $this->input->post('email');
        return $this->db
                        ->where('id', $this->input->post('id'))
                        ->update($tabla, $data);
    }

    public function eliminar($id,$tabla) {
        return $this->db
                        ->where('id', $id)
                        ->delete($tabla);
    }

    public function check($tabla) {
        $id = $this->input->post('id');
        if ($id)
            $this->db->where('id !=', $id);
        $this->db->where('usuario', $this->input->post('usuario'));
        $query = $this->db->get($tabla);
        return $query->result();
    }

}
