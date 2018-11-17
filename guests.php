<?php

$db = new \atk4\data\Persistence_SQL('mysql:dbname=credit;host=localhost','root','');

class Guests extends \atk4\data\Model {
  public $table = 'guests';
  function init() {
    parent::init();
    $this->addField('name');
      $this->addField('friend name');
      $this->addField('email');


  }
}
