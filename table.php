<?php
require 'connection.php';

$app = new \atk4\ui\App('Credits');
$app->initLayout('Centered');

$guests = new Clients($db);
$guests -> load($_GET['guests_id']);

/*$crud = $app->layout->add('CRUD');
$crud->setModel(new Guests($db));
$crud->addDecorator('name', new \atk4\ui\TableColumn\Link('table.php?guests_id={$id}'));*/

$borrow = $guests->ref('Borrow');
$returned = $guests->ref('Returned');

$crud = $app->layout->add('CRUD');
$crud->setModel($returned);


$crud = $app->layout->add('CRUD');
$crud->setModel($borrow);
