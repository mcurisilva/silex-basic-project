<?php

namespace dao;

class Dao {

  protected static $app;


  public static function setApp(\Silex\Application $app) {
    self::$app = $app;
  }
}
