<?php

class Ubicacion_model extends CI_Model {

    public function getAll($tabla) {
        return $this->db
                        ->get($tabla)
                        ->result();
    }

    public function get($id,$tabla) {
        return $this->db
                        ->where('id', $id)
                        ->get($tabla)
                        ->row();
    }
    
     public function getArray($tabla) {
        $query = $this->db->get($tabla)->result();
        $data[''] = 'Seleccione';
        foreach ($query as $row) {
            $data[$row->id] = $row->descripcion;
        }
        return $data;
    }

    public function crear($tabla) {
        foreach ($this->input->post() as $key => $value) {
            if ($key != 'id')
                $data[$key] = $value !== '' ? $value : NULL;
        }
        return $this->db->insert($tabla, $data);
    }

    public function actualizar($tabla) {
        foreach ($this->input->post() as $key => $value) {
            if ($key != 'id')
                $data[$key] = $value !== '' ? $value : NULL;
        }
        return $this->db->where('id', $this->input->post('id'))->update($tabla, $data);
    }

    public function eliminar($id, $tabla) {
        return $this->db
                        ->where('id', $id)
                        ->delete($tabla);
    }

    public function check($tabla) {
        $id = $this->input->post('id');
        if ($id)
            $this->db->where('id !=', $id);
        $this->db->where('descripcion', $this->input->post('descripcion'));
        $query = $this->db->get($tabla);
        return $query->result();
    }

}
