<?php

function getModulesArray(){
    $a=[
        '0' => 'Producto',
        '1' => 'Blog'
    ];

    return $a;
}

function getUserStatusArrayKey($id){
    $status = [
        '0' => 'Registrado',
        '1' => 'verificado',
        '100' => 'Baneado'
    ];
    return $status[$id];
}

function getRoleUserArrayKey($id){
    $roles = [
        '0' => 'usuario',
        '1' => 'Administrador'
    ];
    return $roles[$id];
}
