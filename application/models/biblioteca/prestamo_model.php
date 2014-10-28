<?php

class Prestamo_model extends CI_Model {

    public function getAll($tabla) {
        return $this->db
                        ->select('L.titulo, L.foto, P.*')
                        ->from($tabla . ' P')
                        ->join('libro L', 'L.id = P.libro_id')
                        ->where('P.estado', 1)
                        ->get()
                        ->result();
    }

    public function get($id, $tabla) {
        return $this->db
                        ->where('id', $id)
                        ->get($tabla)
                        ->row();
    }

    public function crear($tabla) {
        foreach ($this->input->post() as $key => $value) {
            if ($key != 'id')
                $data[$key] = $value !== '' ? $value : NULL;
        }
        return $this->db->insert($tabla, $data);
    }

    public function actualizar($tabla, $id) {
        $data = array(
            'fecha_devolucion' => time(),
            'estado' => 0
        );
        return $this->db->where('id', $id)->update($tabla, $data);
    }

}
