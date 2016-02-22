<?php

if(!defined('KIRBY'))
  {
die();
  }

$kirby = kirby();
$site  = $kirby->site();

$kirbyNotifierEmail  = c::get('kirbyNotifierEmail');
$kirbyNotifierPanel  = c::get('kirbyNotifierPanel');
$kirbyNotifierRemote = c::get('kirbyNotifierRemote');

  if(empty(c::get('kirbyNotifierEmail'))||empty(c::get('kirbyNotifierPanel'))||empty(c::get('kirbyNotifierRemote')))
    {
  echo '<b>Notifier Error - config not set.</b>';
    }

function activeDIR($url)
  {
substr($url,-1) != '/'?$url.= '/':$url = $url;
$path = parse_url($url, PHP_URL_PATH);
$pathTrimmed = trim($path, '/');
$pathTokens = explode('/', $pathTrimmed);

  if (substr($path, -1) !== '/')
    {
  array_pop($pathTokens);
    }

return end($pathTokens);
  }

  if(isset($_SESSION))
    {
  $kirbySession = session_id();
    }
  else
    {
  $kirbySession = $_SESSION['kirby_session_fingerprint'];
    }

if($site->user() && activeDIR($_SERVER['REQUEST_URI']) === $kirbyNotifierPanel && !isset($_COOKIE[$kirbySession]))
  {
$spaceUser = $site->user()->firstName().$site->user()->lastName() == ''?'':' ';
$quoteUser = $spaceUser?'"':'';
$adminUser = $site->user()->hasRole('admin')?'':'no ';
$blueprint = '../site/plugins/notifier/blueprint.php';

  if(file_exists($blueprint))
    {
  include_once($blueprint);
    }
  else
    {
  echo '<b>Notifier Error - blueprint not found.</b>';
    }

setcookie($kirbySession,1);
  }

?>