<?php

namespace Admin\Mvcoop\Controllers\Admin;

use Admin\Mvcoop\Commons\Controller;
use Admin\Mvcoop\Models\Category;

class CategoryController extends Controller{

    private $category;
    private string $folder = 'categories.';

    // const PATH_UPLOAD = '/uploads/categories/';
    public function __construct()
    { 
        $this->category = new Category;
    }

    public function index()
    {
        $data['categories'] = $this->category->getAll();
        // echo '<pre>';
        // print_r($this->folder . __FUNCTION__);
        // die;
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data // $data = $user
        );
    }

        // Thêm mới
        public function create()
        {
            if (!empty($_POST)) {
                $name = $_POST['name'];
                // print_r($avatarPath);
                // die;
                $this->category->insert($name);
                header('Location: /admin/categories');
                exit();
            }
    
            return $this->renderViewAdmin($this->folder . __FUNCTION__);
        }

    
        // Cập nhật theo ID
        public function update($id)
        {
            $category = $this->category->getByID($id);
            if (!empty($_POST)) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $this->category->update($id,$name);
                header('Location: /admin/categories');
                exit();
            }
    
            return $this->renderViewAdmin($this->folder . __FUNCTION__, ['category' => $category]);
        }
    
        // Delete theo ID
        public function delete($id)
        {
            $category = $this->category->getByID($id);
    
            if (empty($category)) {
                e404();
            }        
            $this->category->deleteByID($category['id']);

            header('Location: /admin/categories');
            exit();
    
    
        }
    
}