<?php

class Libro_model extends CI_Model {

    public function getAll($tabla) {
        return $this->db
                        ->select('L.*,TL.descripcion tipo_libro, U.descripcion ubicacion, U.foto foto_ubicacion')
                        ->from($tabla . ' L')
                        ->join('tipo_libro TL', 'TL.id = L.tipo_libro_id')
                        ->join('ubicacion U', 'U.id = L.ubicacion_id')
                        ->get()
                        ->result();
    }

    public function get($id, $tabla) {
        return $this->db
                        ->where('id', $id)
                        ->get($tabla)
                        ->row();
    }
    
    public function getArray($tabla){
        $query = $this->db->get($tabla)->result();
        $data[''] = 'Seleccione';
        foreach ($query as $row) {
            $data[$row->id] = $row->titulo . ' - ' .$row->autor;
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
