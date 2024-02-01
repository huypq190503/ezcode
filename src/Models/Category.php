<?php

namespace Admin\Mvcoop\Models;

use Admin\Mvcoop\Commons\Model;

class Category extends Model{

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM categories order by id DESC ";

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
            $sql = "SELECT * FROM categories WHERE id =:id";
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
    public function insert($name)
    {
        try {
            $sql = "
                INSERT INTO categories(name) 
                VALUES (:name)
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':name', $name);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
    public function update($id, $name)
    {
        try {
            $sql = "
                UPDATE categories 
                SET name = :name
                WHERE id = :id
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);


            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM categories WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

}