<?php

namespace Admin\Mvcoop\Models;

use Admin\Mvcoop\Commons\Model;

class Post extends Model
{
    public function getAll()
    {
        try {
            $sql = "SELECT posts.*, categories.name AS category_name
            FROM posts
            JOIN categories ON posts.category_id = categories.id  order by id DESC ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

    public function getById($id)
    {
        try {
            $sql = "SELECT posts.*, categories.name AS category_name
            FROM posts
            JOIN categories ON posts.category_id = categories.id WHERE posts.id =:id";
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

    public function insert($category_id, $title, $excerpt, $content, $image)
    {
        try {
            $sql = "INSERT INTO `posts` (category_id, title, excerpt, content, image) 
            VALUES (:category_id,:title,:excerpt,:content, :image) ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

    public function update($id,$category_id, $title, $excerpt, $content, $image)
    {
        try {
            $sql = "UPDATE `posts` SET category_id = :category_id ,
            title = :title, excerpt = :excerpt, content = :content,
            image = :image WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':excerpt', $excerpt);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);
            $stmt->execute();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }

    }

    public function deleteByID($id)
    {
        try {
            $sql = "DELETE FROM `posts` WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

    // public function onecate()
    // {
    //     try {
    //         $sql = "SELECT c.id,  c.name, p.id AS post_id, p.title, p.excerpt, p.content, p.image, p.category_id
    //         FROM posts p
    //         INNER JOIN categories c ON p.category_id = c.id; ";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute();

    //         // Fetch the results
    //         $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    //         // Do something with $results (e.g., return or process further)
    //         return $results;

    //     } catch (\Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //         die();
    //     }
    // }


}