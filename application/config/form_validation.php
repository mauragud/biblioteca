<?php

$config = array(
    'usuario' => array(
        array(
            'field' => 'usuario',
            'label' => 'Usuario',
            'rules' => 'trim|required|unique[usuario.usuario]'
        ),
        array(
            'field' => 'email',
            'label' => 'Correo electrónico',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'trim|required|min_length[4]'
        ),
        array(
            'field' => 're_password',
            'label' => 'Verificar Contraseña',
            'rules' => 'trim|required|min_length[4]|matches[password]'
        ),
    ),
    'actualizar_usuario' => array(
        array(
            'field' => 'usuario',
            'label' => 'Usuario',
            'rules' => 'trim|required|unique[usuario.usuario]'
        ),
        array(
            'field' => 'email',
            'label' => 'Correo electrónico',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'trim|min_length[4]'
        ),
        array(
            'field' => 're_password',
            'label' => 'Verificar Contraseña',
            'rules' => 'trim|min_length[4]|matches[password]'
        ),
    ),
    'tipo_libro' => array(
        array(
            'field' => 'descripcion',
            'label' => 'Descripción',
            'rules' => 'trim|required|unique[tipo_libro.descripcion]'
        )
    ),
    'ubicacion' => array(
        array(
            'field' => 'descripcion',
            'label' => 'Descripción',
            'rules' => 'trim|required|unique[tipo_libro.descripcion]'
        ),
        array(
            'field' => 'foto',
            'label' => 'Foto',
            'rules' => 'trim'
        )
    ),
    'libro' => array(
        array(
            'field' => 'titulo',
            'label' => 'Titulo del libro',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'isbn',
            'label' => 'Isbn del libro',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'autor',
            'label' => 'Autor del libro',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'editorial',
            'label' => 'Editorial del libro',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'foto',
            'label' => 'Foto',
            'rules' => 'trim'
        ),
        array(
            'field' => 'ubicacion_id',
            'label' => 'Ubicacion del libro',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'tipo_libro_id',
            'label' => 'Tipo de libro',
            'rules' => 'trim|required'
        )
        
    ),
);

