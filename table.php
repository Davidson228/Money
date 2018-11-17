<?php
require 'connection.php';

$guests = new Guests($db);
$guests -> load($_SESSION['user_id']);

/*$crud = $app->layout->add('CRUD');
$crud->setModel(new Guests($db));
$crud->addDecorator('name', new \atk4\ui\TableColumn\Link('table.php?guests_id={$id}'));*/

$borrow = $guests->ref('Borrow');
$returned = $guests->ref('Returned');

$crud = $app->layout->add('CRUD');
$crud->setModel($returned);


$crud = $app->layout->add('CRUD');
$crud->setModel($borrow);
