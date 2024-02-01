<?php

namespace Admin\Mvcoop\Models;

use Admin\Mvcoop\Commons\Model;

class User extends Model
{

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM users order by id DESC ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function getById($id)
    {
        try {
            $sql = "SELECT * FROM users WHERE id =:id";
            // ở where id không được để $id (nó sẽ drop database) nên để :id

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            // execute thực hiện câu truy vấn
            return $stmt->fetch();

        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function insert($name, $email, $password , $avatar = null)
    {
        try {
            $sql = "
                INSERT INTO users(name, email, password, avatar) 
                VALUES (:name, :email, :password, :avatar)
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':avatar', $avatar);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function update($id, $name, $email, $password, $role ,$avatar = null )
    {
        try {
            $sql = "
                UPDATE users 
                SET name = :name,
                    email = :email,
                    password = :password,
                    role = :role,
                    avatar = :avatar
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':avatar', $avatar);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function getByEmailAndPassword($email,$password){
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}