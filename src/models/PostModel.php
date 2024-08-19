<?php

namespace models;

use core\db\MySQL;
use PDOException;
use PDO;

class PostModel
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
        if (!$this->db instanceof \PDO) {
            die('Database connection failed: ' . $this->db); // This will show the connection error
        }
    }

    public function createPost($postTbl, $postImageTbl, $data, $images)
    {
        try {
            // Start transaction
            $this->db->beginTransaction();

            // Insert into post table
            $sql = "INSERT INTO $postTbl (title, description) 
                    VALUES (:title, :description)";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ':title' => $data['title'],
                ':description' => $data['description'],
            ]);

            if (!$result) {
                echo "Error inserting into $postTbl: ";
                print_r($statement->errorInfo());
                return false;
            }

            // Get the ID of the newly inserted post
            $postId = $this->db->lastInsertId();
            if (!$postId) {
                echo "Error: Unable to retrieve last inserted ID.";
                $this->db->rollBack();
                return false;
            }

            // Insert images
            $sql = "INSERT INTO $postImageTbl (post_id, image) 
                    VALUES (:post_id, :image)";
            $statement = $this->db->prepare($sql);

            foreach ($images as $image) {
                $result = $statement->execute([
                    ':post_id' => $postId,
                    ':image' => $image,
                ]);

                if (!$result) {
                    echo "Error inserting into $postImageTbl: ";
                    print_r($statement->errorInfo());
                    $this->db->rollBack();
                    return false;
                }
            }

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo "Transaction failed: " . $e->getMessage();
            return false;
        }
    }
    public function getAllPosts($postTbl, $postImageTbl)
    {
        try {
            $sql = "SELECT p.id,p.title,p.description,p.created_at,pimg.image
                    FROM $postTbl p 
                    LEFT JOIN $postImageTbl pimg ON p.id=pimg.post_id 
                    ORDER BY p.created_at DESC
                    ";
            $statement = $this->db->query($sql);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Organize results
            $posts = [];
            foreach ($data as $row) {
                $postId = $row['id'];
                if (!isset($posts[$postId])) {
                    $posts[$postId] = [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'created_at' => $row['created_at'],
                        'images' => []
                    ];
                }
                if ($row['image']) {
                    $posts[$postId]['images'][] = $row['image'];
                }
            }

            return array_values($posts);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllPostsByLimit($postTbl, $postImageTbl, $limit)
    {
        try {
            $sql = "SELECT p.id,p.title,p.description,p.created_at,pimg.image
                    FROM $postTbl p 
                    LEFT JOIN $postImageTbl pimg ON p.id=pimg.post_id 
                    ORDER BY p.created_at DESC
                    LIMIT $limit
                    ";
            $statement = $this->db->query($sql);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Organize results
            $posts = [];
            foreach ($data as $row) {
                $postId = $row['id'];
                if (!isset($posts[$postId])) {
                    $posts[$postId] = [
                        'id' => $row['id'],
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'created_at' => $row['created_at'],
                        'images' => []
                    ];
                }
                if ($row['image']) {
                    $posts[$postId]['images'][] = $row['image'];
                }
            }

            return array_values($posts);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getPostById($postTbl, $postImageTbl, $id)
    {
        try {
            $sql = "SELECT * FROM $postTbl WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $statement->execute([':id' => $id]);
            $post = $statement->fetch(\PDO::FETCH_ASSOC);

            if ($post) {
                $sqlImages = "SELECT image FROM $postImageTbl WHERE post_id = :post_id";
                $statementImages = $this->db->prepare($sqlImages);
                $statementImages->execute([':post_id' => $id]);
                $images = $statementImages->fetchAll(\PDO::FETCH_COLUMN);
                $post['images'] = $images;
            }

            return $post;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updatePost($postTbl, $postImageTbl, $id, $data, $images)
    {
        try {
            $this->db->beginTransaction();
            $sql = "UPDATE $postTbl SET title= :title,description=:description, updated_at=NOW() WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute([
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':id' => $id
            ]);

            if ($images) {
                $sql = "DELETE FROM $postImageTbl WHERE id=:id";
                $statement = $this->db->prepare($sql);
                $statement->execute([":id" => $id]);

                $sql = "INSERT INTO $postImageTbl(post_id,image) VALUES (:post_id,:image) ";
                $statement = $this->db->prepare($sql);

                foreach ($images as $image) {

                    $statement->execute([
                        ":post_id" => $id,
                        ":image" => $image
                    ]);
                }
            }
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return $e->getMessage();
        }
    }

    public function deletePost($postTbl, $postImageTbl, $id)
    {
        try {
            $sql = "DELETE FROM $postTbl 
                    WHERE id=:id
            ";
            $statement = $this->db->prepare($sql);
            $statement->execute([':id' => $id]);


            $sql = "DELETE FROM $postImageTbl
                    WHERE post_id=:id
            ";
            $statement = $this->db->prepare($sql);
            $statement->execute([':id' => $id]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
