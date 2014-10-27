<?php

class Upload_foto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($path) {
        if($this->input->post('original')){
            unlink('./'.$this->input->post('original'));
        }   
        
        $config['upload_path'] = './fotos/'.$path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $this->output->set_output($this->upload->display_errors());
        } else{
            $data = $this->upload->data();
            $this->output->set_output(json_encode(array('archivo' => 'fotos/'.$path.'/'.$data['file_name'])));
        }
    }
    
    public function eliminar(){
        if($this->input->is_ajax_request()){
            unlink('./'.$this->input->post('foto'));
            if($this->input->post('id')){
                $this->db->where('id',$this->input->post('id'))->update($this->input->post('peticion'), array('foto' => NULL));
            }
            $this->output->set_output('Foto Eliminada');
        }else{
            show_404();
        }
    }

}
