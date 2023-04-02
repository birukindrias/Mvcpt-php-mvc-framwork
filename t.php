#!/usr/bin/env php8.2
<?php

function getIPs($withV6 = true)
{
    preg_match_all('/inet' . ($withV6 ? '6?' : '') . ' addr: ?([^ ]+)/', `ifconfig`, $ips);
    return $ips[1];
}

$ips = getIPs();
var_dump($ips);
var_dump($withV6);
