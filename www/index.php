<?php

require_once __DIR__ . '/../vendor/autoload.php';

\Tracy\Debugger::enable(\Tracy\Debugger::Development);

$trustedProxies = ['192.168.0.0/16', '10.0.0.0/8'];

dump('$_SERVER ------------------------------------->');
dump($_SERVER['REMOTE_ADDR']);
dump($_SERVER['HTTP_X_REAL_IP']);
dump($_SERVER);

dump('Symfony --------------------------------------->');

$symfony = Symfony\Component\HttpFoundation\Request::createFromGlobals();
$symfony::setTrustedProxies($trustedProxies, -1);

dump($symfony);
dump($symfony->isFromTrustedProxy());
dump($symfony->getHost());
dump($symfony->getHttpHost());
dump($symfony->getClientIp());

dump('Nette --------------------------------------->');

$nette = (new Nette\Http\RequestFactory);
$nette->setProxy($trustedProxies);
$netteRequest = $nette->fromGlobals();

dump($netteRequest);
dump($netteRequest->getRemoteAddress());
dump($netteRequest->getRemoteHost());