<?php

namespace bo;

class Usuario extends \bo\Bo {

  public static function listar() {
    return \dao\Usuario::listar();
  }

}
