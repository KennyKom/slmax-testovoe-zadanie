<?php
require_once "dbconnect.php";
require_once "person.php";
require_once "persons_list.php";

$host_name = "db_host";
$user_name = "user";
$user_pswd = "123";
$db_name = "testdb";

$dbc = DBConnect::init($host_name, $user_name, $user_pswd, $db_name);

person::initTable();

$pl1 = new persons_list('>= 1');

foreach ($pl1->getPersons() as $p) {
	$r = $p->getUser();
	var_dump($r);
}



$p1 = person::createNew('Lena', 'Pirkin', '2001-01-01', 1, 'Moscow');
$p2 = person::createNew('Serge', 'Pushkin', '1995-09-18', 0, 'Minsk');
$p3 = person::createNew('Artur', 'Linch', '1977-07-07', 0, 'Paris');

$p1->save();
$p2->save();
$p3->save();

$pl2 = new persons_list('>= 1');

foreach ($pl2->getPersons() as $p) {
	$r = $p->getUser();
	var_dump($r);
}

$pl2->deletePersons();
