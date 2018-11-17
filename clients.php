<?php


$db = new \atk4\data\Persistence_SQL('mysql:dbname=credit;host=localhost','root','');

class Clients extends \atk4\data\Model {
  public $table = 'clients';
  function init() {
    parent::init();
    $this->addField('name');
      $this->addField('phone');
      $this->addField('email');
      $this->addField('login');
      $this->addField('password');
  }
}
