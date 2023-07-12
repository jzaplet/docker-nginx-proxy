<?php

require_once __DIR__ . '/../vendor/autoload.php';

\Tracy\Debugger::enable(\Tracy\Debugger::Development);

$nette = (new Nette\Http\RequestFactory);
$nette->setProxy('0.0.0.0');
$netteRequest = $nette->fromGlobals();


$symfony = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$symfony::setTrustedProxies(['REMOTE_ADDR'], -1);

dump($symfony->isFromTrustedProxy());

dump($symfony->getClientIp());
dump($symfony->getClientIps());

dump($netteRequest->getRemoteAddress());
dump($netteRequest->getRemoteHost());

dump($_SERVER['REMOTE_ADDR']);
dump($_SERVER['HTTP_X_REAL_IP']);

dump($_SERVER);