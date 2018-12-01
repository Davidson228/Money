<?php
require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Credits');
$app->initLayout('Centered');

$intro = $app->layout->add('Header')->set('Welcome');
/*$form = $app->layout->add('Form');
$form->setModel(new Clients($db));

$form->onSubmit(function($form) {
  $form->model->save();
  return $form->success('Success');

});*/
//$layout->Add['ui'=>'hidden divider'];
$client = new Clients($db);
$client -> load($_SESSION['user_id']);


$crud = $app->layout->add('CRUD');

$crud->addDecorator('name', new \atk4\ui\TableColumn\Link('table.php?guests_id={$id}'));
$crud->setModel(new Clients($db));
