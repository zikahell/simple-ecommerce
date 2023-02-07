<?php

class Database {

  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "ar";
  private $conn;

  public function __construct()
  {
    $this->conn = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
    if(!$this->conn){
      die("Error connceting to db");
    }
  }
  public function insert($sql){
    if(!mysqli_query($this->conn,$sql)){
      die("failed add to db");
    }
  }
  public function update($sql){
    if(!mysqli_query($this->conn,$sql)){
      die("failed update to db");
    }
  }
  public function read($table){
    $sql = "SELECT * FROM $table";
    $result = mysqli_query($this->conn,$sql);
    $data = [];
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
        $data [] = $row;
        
      }
      return $data;
    } else
      return $data=null;
    
  }
  public function find($table,$id){
    $sql = "SELECT * FROM $table WHERE `id` = '$id'";
    $result = mysqli_query($this->conn,$sql);
    $data = [];
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
        $data [] = $row;
      }
    }
    return $data;
  }

  public function delete($table,$id){
    $sql = "DELETE FROM $table WHERE `id` = '$id'";
    mysqli_query($this->conn,$sql);
  }

  

  
  


}