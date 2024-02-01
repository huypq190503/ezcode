<?php

namespace Admin\Mvcoop\Controllers\Admin;

use Admin\Mvcoop\Commons\Controller;
use Admin\Mvcoop\Models\Post;
use Admin\Mvcoop\Models\Category;

class PostController extends Controller
{
    private Post $post;
    private $category;

    private string $folder = 'posts.';

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }

    public function index()
    {
        $data['posts'] = $this->post->getAll();
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // thêm mới 
    public function create()
    {
        $category = $this->category->getAll();

        if (!empty($_POST)) {
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];
            $image = $_FILES['image'] ?? null;
            $imagePath = null;
            if (!empty($image)) {

                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }
            $category_id = $_POST['category_id'];

            $this->post->insert($category_id, $title, $excerpt, $content, $imagePath);
            header('Location: /admin/posts');
        }
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            ['category' => $category]
        );


    }
    public function update($id)
    {
        $post = $this->post->getById($id);
        $category = $this->category->getAll();


        if (!empty($_POST)) {
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];
            $image = $_FILES['image'] ?? null;
            $imagePath = $post['image'];
            if (!empty($image)) {

                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $post['image'];
                }
            }

            $category_id = $_POST['category_id'];

            $this->post->update($id, $category_id, $title, $excerpt, $content, $imagePath);
            // header("Location: /admin/posts/$id/update");
            header("Location: /admin/posts/");
        }


        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            ['post' => $post, 'category' => $category]
        );


    }



    // Xem chi tiết theo ID
    public function show($id)
    {
        $post = $this->post->getByID($id);
        if (!empty($_POST)) {

            if (empty($post)) {
                e404();
            }
            header('Location: /admin/posts');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['post' => $post]);
    }

    public function delete($id)
    {
        $post = $this->post->getByID($id);

        if (empty($post)) {
            e404();
        }
        $this->post->deleteByID($post['id']);
        if (!empty($post['image']) && file_exists($post['image'])) {
            unlink(PATH_ROOT . $post['image']);

        }
        header('Location: /admin/posts');
        exit();


    }




}