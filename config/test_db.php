<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'pgsql:host=ec2-52-203-118-49.compute-1.amazonaws.com;port=5432;dbname=ddsfrk9olcimk6';

return $db;
