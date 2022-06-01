<?php

require_once 'database.php';

class User {
    private $conn;

    // Constructor
    public function __construct(){
      $database = new Database();
      $db = $database->dbConnection();
      $this->conn = $db;
    }


    // Excutar querys
    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    // Insertar
    public function insert($nombre, $apellido, $subject, $mensaje, $email){
      try{
        $stmt = $this->conn->prepare("INSERT INTO contactos (nombre, apellido, subject, mensaje, email) VALUES(:nombre, :apellido, :subject, :mensaje, :email)");
        $stmt->bindparam(":nombre", $nombre);
        $stmt->bindparam(":apellido", $apellido);
        $stmt->bindparam(":subject", $subject);
        $stmt->bindparam(":mensaje", $mensaje);
        $stmt->bindparam(":email", $email);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    public function insertSub($email){
      try{
        $stmt = $this->conn->prepare("INSERT INTO subscribe (email) VALUES(:email)");
        $stmt->bindparam(":email", $email);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    public function insertventa($usuario,$nombre, $precio, $fecha){
      try{
        $stmt = $this->conn->prepare("INSERT INTO ventas (usuario, nombre, precio, fecha) VALUES(:usuario, :nombre, :precio, :fecha)");
        $stmt->bindparam(":usuario", $usuario);
        $stmt->bindparam(":nombre", $nombre);
        $stmt->bindparam(":precio", $precio);
        $stmt->bindparam(":fecha", $fecha);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }



    // Update
    public function update($usuario,$nombre, $telefono, $concepto, $medidas, $precio, $fecha, $id){
        try{
          $stmt = $this->conn->prepare("UPDATE datos SET usuario = :usuario, nombre = :nombre, telefono = :telefono, concepto = :concepto, medidas = :medidas, precio = :precio, fecha = :fecha WHERE id = :id");
          $stmt->bindparam(":usuario", $usuario);
          $stmt->bindparam(":nombre", $nombre);
          $stmt->bindparam(":telefono", $telefono);
          $stmt->bindparam(":concepto", $concepto);
          $stmt->bindparam(":medidas", $medidas);
          $stmt->bindparam(":precio", $precio);
          $stmt->bindparam(":fecha", $fecha);
          $stmt->bindparam(":id", $id);
          $stmt->execute();
          return $stmt;
        }catch(PDOException $e){
          echo $e->getMessage();
        }
    }


    // Eliminar
    public function delete($id){
      try{
        $stmt = $this->conn->prepare("DELETE FROM datos WHERE id = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return $stmt;
      }catch(PDOException $e){
          echo $e->getMessage();
      }
    }

    // Metodo redirijir URL 
    public function redirect($url){
      header("Location: $url");
    }
}
?>
