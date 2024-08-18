<?php

namespace controllers;

use core\db\MySQL;
use models\PostModel;
use core\helpers\Constants;

class PostController
{
    private $postModel;
    public function __construct()
    {
        $this->postModel = new PostModel(new MySQL());
    }

    public function createPost($data, $images)
    {
        $uploadDir = 'C:\xampp\htdocs\student-registration-system\www\admin\posts\uploads/';
        $imagePaths = [];
        foreach ($images['tmp_name'] as $key => $tmpName) {
            $image = basename($images['name'][$key]);
            $targetFilePath = $uploadDir . $image;

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $imagePaths[] = $targetFilePath;
            } else {
                throw new \Exception("Filed to upload image:" . $image);
            }
        }

        return $this->postModel->createPost(Constants::$POST_TBL, Constants::$POST_IMAGES_TBL, $data, $imagePaths);
    }
    public function index()
    {
        $posts = $this->postModel->getAllPosts(Constants::$POST_TBL, Constants::$POST_IMAGES_TBL);
        return $posts;
    }
    public function getPostById($id)
    {
        return  $this->postModel->getPostById(Constants::$POST_TBL, Constants::$POST_IMAGES_TBL, $id);
    }
    public function updatePost($id, $data, $images)
    {
        $uploadDir = 'C:\xampp\htdocs\student-registration-system\www\admin\posts\uploads/';
        $imagePaths = [];
        foreach ($images['tmp_name'] as $key => $tmpName) {
            $image = basename($images['name'][$key]);
            $targetFilePath = $uploadDir . $image;

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $imagePaths[] = $targetFilePath;
            } else {
                throw new \Exception("Filed to upload image:" . $image);
            }
        }
        return $this->postModel->updatePost(Constants::$POST_TBL, Constants::$POST_IMAGES_TBL, $id, $data, $imagePaths);
    }

    public function deletePost($id)
    {
        $this->postModel->deletePost(Constants::$POST_TBL, Constants::$POST_IMAGES_TBL, $id);
    }
}
