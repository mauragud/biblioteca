<?php

class Upload_foto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($path) {
        $config['upload_path'] = './fotos/'.$path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Filedata')) {
            $this->output->set_output($this->upload->display_errors());
        } else{
            $data = $this->upload->data();
            $this->output->set_output('fotos/'.$path.'/'.$data['file_name']);
        }
    }

}
