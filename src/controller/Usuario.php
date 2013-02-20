<?php

namespace controller;

class Usuario extends \controller\Controller 
{

    public function usuarios(\Silex\Application $app) 
    {
        $usuarios = \bo\Usuario::listar();

        return $app['twig']->render('lista_usuario.twig', array('usuarios'=>$usuarios));
    }

}

