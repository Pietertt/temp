<?php

require __DIR__ . '/../vendor/autoload.php';

use LdapRecord\Connection;
use LdapRecord\Container;

ldap_set_option(null, LDAP_OPT_DEBUG_LEVEL, 7);

$connection = new Connection([
    'hosts'    => ['openldap'],
    'port'     => 389,
    'use_ssl'  => true,
    //'use_tls'  => true,
    'username' => 'cn=admin, dc=ritsema-banck, dc=frl',
    'password' => 'admin',
]);

$connection->connect();


echo "success";
