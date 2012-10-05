<?php
//definição das constantes da aplicação
define('APP_ROOT_PATH', __DIR__);
define('APP_CONFIG_PATH', __DIR__.'/../config');
define('APP_VIEW_PATH', __DIR__.'/../src/view');

//inclusão do autoload do composer
require_once APP_ROOT_PATH.'/../vendor/autoload.php';

use Symfony\Component\Yaml\Parser;

$app = new Silex\Application();

$yaml = new Parser();

//configura as rotas da aplicação
$routing = $yaml->parse(file_get_contents(APP_CONFIG_PATH.'/routing.yml'));
if (isset($routing['routings'])) {
  foreach($routing['routings'] as $routing) {
    $method = isset($routing['method']) ? $routing['method'] : 'get';
    $app->$method($routing['url'], $routing['class']);
  }
}

//seta as configurações da aplicação
$config = $yaml->parse(file_get_contents(APP_CONFIG_PATH.'/config.yml'));
if (isset($config['app'])) {
  $app['debug'] = isset($config['app']['debug']) ? $config['app']['debug'] : false;
}

//configura conexao com o banco
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $config['database']
));

//atribui a app ao dao e bo
\bo\Bo::setApp($app);
\dao\Dao::setApp($app);

$app->run();
