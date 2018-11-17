<?php

require 'vendor/autoload.php';
require 'connection.php';



$app = new \atk4\ui\App('Credits');
$app->initLayout('Centered');

/*$form1 = $app->layout->add('Form');
$form1->setModel(new Clients($db));
$form1->onSubmit(function($form1){
  $form1->model->save();
  return $form1->success('OK');
});*/

$clients = new Clients($db);
//$clients -> load($_SESSION['clients_id']);
$guests = $clients->ref('Guests');
$form2 = $app->layout->add('Form');
$form2->setModel(new Clients($db),['login','password']);
$form2->buttonSave->set('Login');
$form2->onSubmit(function($form2) use ($clients) {
  $clients->tryLoadBy('login',$form2->model['login']);
  if($clients['password'] == $form2->model['password']) {
    $_SESSION['user_id'] = $clients->id;
    return new \atk4\ui\jsExpression('document.location="main.php"');
  } else {
    $clients->unload();
    $er = (new \atk4\ui\jsNotify('No such user.'));
    $er->setColor('red');
  }
});

$grid = $app->layout->add('Grid');
$grid->setModel(new Clients($db));
$grid->addQuickSearch(['name','phone','email','login','password']);

/*$form3 = $app->layout->add('Form');
$form3->setModel(new Guests($db));
$form3->onSubmit(function($form3){
  $form3->model->save();
  return $form3->success('OK');
});

$app->add(['Header','Borrow',1,'aligned'=>'center']);

$form4 = $app->layout->add('Form');
$form4->setModel(new Borrow($db));
$form4->onSubmit(function($form4){
  $form4->model->save();
  return $form4->success('OK');
});

$app->add(['Header','Return',1,'aligned'=>'center']);

$form5 = $app->layout->add('Form');
$form5->setModel(new Returned($db));
$form5->onSubmit(function($form5){
  $form5->model->save();
  return $form5->success('OK');
});*/

  $button = $app->add('Button');
  $button->set('Admin');
  $button->link('check.php');
