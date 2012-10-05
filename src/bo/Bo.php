<?php


namespace bo;


class Bo {

  protected static $app;

  public static function setApp(\Silex\Application $app) {
    self::$app = $app;
  }

}
