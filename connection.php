<?php
session_start();

$db = new
\atk4\data\Persistence_SQL('mysql:dbname=heroku_33a09646a43f60a;host=eu-cdbr-west-02.cleardb.net','root','');
class ReminderBox extends \atk4\ui\View {
  public $ui = 'piled segment';
  public function setModel(\atk4\data\Model $guests) {
    $this->add('Header')->set('Please repay my loan, '.$guests['name']);
    $this->add('Text')->addParagraph('I have loaned you a total of '.$guests['total_borrowed']);
     '$ from which you still owe me' ($guests['total_borrowed']-$guests['total_returned'].'$. Please pay back!');
    $this ->add('Text')->addParagrph('Thanks!');
  }
}


class Clients extends \atk4\data\Model {
 public $table = 'clients';
 function init() {
   parent::init();
   $this->addField('name');
   $this->addField('phone');
   $this->addField('email');
   $this->addField('login');
   $this->addField('password');
 //  $this->addField('password',['type']);
 $this->hasMany('Guests',new Guests);


 }
}

class Guests extends \atk4\data\Model {
  public $table = 'guests';
  function init() {
    parent::init();
    $this->hasMany('Borrow',new Borrow())->addField('total_borrowed',['aggregate'=>'sum', 'field'=>'amount']);
    $this->hasMany('Returned',new Returned())->addField('total_returned',['aggregate'=>'sum', 'field'=>'amount']);
    $this->addField('name');
    $this->addField('friend_name');
    $this->addField('email');
    $this->hasOne('clients_id',new Clients)->addTitle();


  }
}

class Borrow extends \atk4\data\Model {
 public $table = 'borrow';
 function init() {
   parent::init();
   $this->addField('amount');
   $this->addField('date',['type'=>'date']);
   $this->hasOne('guests_id',new Guests)->addTitle();
 }
}

class Returned extends \atk4\data\Model {
  public $table = 'returned';
  function init() {
    parent::init();
      $this->addField('amount');
      $this->addField('date',['type'=>'date']);
       $this->hasOne('guests_id',new Guests)->addTitle();
  }
}
