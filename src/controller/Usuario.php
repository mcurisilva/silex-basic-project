<?php

namespace controller;

class Usuario extends \controller\Controller {

  public function usuarios(\Silex\Application $app) {
    $usuarios = \bo\Usuario::listar();

    $retorno = '';
    foreach ($usuarios as $usuario)
      $retorno .=  "<h1>{$usuario['nome']}</h1>";

    include APP_VIEW_PATH.'/lista_usuario.php';
  }
}
