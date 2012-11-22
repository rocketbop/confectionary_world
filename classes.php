<?php
class person {
	
	private $name;
	protected $role;
	
	public function __construct() {
		
		echo "<p>Creating person object </p>";
		
		$this->role = "unknown role";
		
	}
	
	
	public function __destruct() {
		
		echo "<p>Destroying person object in memory </p>";
		
	}
	
	public function setName($name) {
		
		$this->name = $name;
	}
	
	public function printName() {
		
		echo "<p>" . $this->name;
		
	}
	
	public function printRole() {
	
		echo "<p>" .  $this->role;
	
	}
	
}


class teacher extends person {
	
	public function __construct() {
		
		$this->role = "Teacher";
	}
	
}

$person1 = new person;
//$person1->name="TEsting";
$person1->setName("John");
$person1->printName();
$person1->printRole();

$person2 = new person;
$person2->setName("Gerard");
$person2->printName();

$person3 = new teacher;
$person3->setName("Sharon");
$person3->printName();
$person3->printRole();

