<?php
//OOP classes, objects method, assignments
//Can also put actualy value inside the class but not good practice but the constants
class Database{
  public $host = DB_HOST;
  public $username = DB_USER;
  public $password = DB_PASS;
  public $db_name = DB_NAME;

  //Link will represent mysqli objects
  public $link;
  //error property
  public $error;
/*
*       Class Construtor
*/
//Construtor it just calls automatically when you create object
//add credentials here
public function __construct(){
  //Assign variables to calss by using this they become class properties instead of just this function
  //Calls connect function.If you're in a function in a class and you want to call another function in the class, use this
  //same thing with properties
  $this->connect();
}

/*
*       Connecter
*/
private function connect(){
  //Assign this link to our connection_aborted
  $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

  //Make sure we are connected
  if (!$this->link) {
    $this->error = "Connection failed ".$this->link->connect_error;
    return false;
  }
}

/*
*       Select
*/

public function select($query){
  $result = $this->link->query($query) or die($this->link->error.__LINE__);

  if ($result->num_rows > 0) {
    //Return result so we can access it from outside
    return $result;
    } else {return false;}
  }

  /*
  *       Insert
  */

  public function insert($query){
    $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

    if ($insert_row) {
      //Redirect
      //using get variable to show message when redirect
      header("Location: index.php?msg=".urlencode('Record Added'));
      //put exit after headers
      exit();
    } else {die ('Error : ('.$this->link->errno .') '.$this->link->error);}
  }

  /*
  *       Update
  */

  public function update($query){
    $update_row = $this->link->query($query) or die($this->link->error.__LINE__);

    if ($update_row) {
      //Redirect
      //using get variable to show message when redirect
      header("Location: index.php?msg=".urlencode('Record Updated'));
      exit();
    } else {die ('Error : ('.$this->link->errno .') '.$this->link->error);}
  }

  /*
  *       Delete
  */

  public function delete($query){
    $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

    if ($delete_row) {
      //Redirect
      //using get variable to show message when redirect
      header("Location: index.php?msg=".urlencode('Record Deleted'));
      exit();
    } else {die ('Error : ('.$this->link->errno .') '.$this->link->error);}
  }
}
