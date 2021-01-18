<?php

function getModulesArray(){
    $a=[
        '0' => 'Producto',
        '1' => 'Blog'
    ];

    return $a;
}

function getUserStatusArray($mode, $id){
    $status = [
        '0' => 'Registrado',
        '1' => 'verificado',
        '100' => 'Baneado'
    ];
    if(!is_null($mode)):
        return $status;
    else:
        return $status[$id];
    endif;  
}

function getRoleUserArray($mode, $id){
    $roles = [
        '0' => 'usuario',
        '1' => 'Administrador'
    ];
    if(!is_null($mode)):
        return $roles;
    else:
        return $roles[$id];
    endif;  
}
