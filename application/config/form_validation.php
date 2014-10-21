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
        )
    ),
);

