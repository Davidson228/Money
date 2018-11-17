<?php

$db = new \atk4\data\Persistence_SQL('mysql:dbname=credit;host=localhost','root','');

class Borrow extends \atk4\data\Model {
  public $table = 'borrow';
  function init() {
    parent::init();
      $this->addField('amount');
      $this->addField('date');
      $this->hasOne('guests_id',new Guests)->addTitle();
  }
}
