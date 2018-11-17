<?php

$db = new \atk4\data\Persistence_SQL('mysql:dbname=credit;host=localhost','root','');

class Return extends \atk4\data\Model {
  public $table = 'returned';
  function init() {
    parent::init();
      $this->addField('amount');
      $this->addField('date');
      $this->hasOne('guest_id',new Guests)->addTittle();
  }
}
