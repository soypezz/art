<?php

require_once 'database.php';

//nota-user
class nota {
    private $conn;

    // Constructor
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Execute queries SQL
    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insert
    public function insert($usuario,$notas){
      try{
        $stmt = $this->conn->prepare("INSERT INTO notas (usuario, notas) VALUES(:usuario, :notas)");
        $stmt->bindparam(":usuario", $usuario);
        $stmt->bindparam(":notas", $notas);

        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    // Update
    public function update($usuario,$notas, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE notas SET usuario = :usuario, notas = :notas WHERE id = :id");
          $stmt->bindparam(":usuario", $usuario);
          $stmt->bindparam(":notas", $notas);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Delete
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM notas WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Redirect URL method
    public function redirect($url){
      header("Location: $url");
    }
}
?>