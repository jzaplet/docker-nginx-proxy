<?php

require_once __DIR__ . '/../vendor/autoload.php';

\Tracy\Debugger::enable(\Tracy\Debugger::Development);

$nette = (new Nette\Http\RequestFactory)->fromGlobals();
$symfony = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

dump($symfony->getClientIp());
dump($symfony->getClientIps());

dump($nette->getRemoteAddress());
dump($nette->getRemoteHost());

dump($_SERVER['REMOTE_ADDR']);
dump($_SERVER['HTTP_X_REAL_IP']);