<?php

require_once __DIR__ . '/../vendor/autoload.php';

\Tracy\Debugger::enable(\Tracy\Debugger::Production);

$trustedProxies = ['192.168.0.0/16', '10.0.0.0/8'];

bug();