<?php

namespace Admin\Mvcoop\Controllers\Client;

use Admin\Mvcoop\Commons\Model;
use Admin\Mvcoop\Commons\Controller;

use Admin\Mvcoop\Models\Category;
use Admin\Mvcoop\Models\User;

// use Model;

class HomeController extends Controller
{
    public function index()
    {
        // $username = 'Pham Quoc Huy';
        // $email = 'abc@gmail.com';
        // $password = 1;

        // $nameCate = "PHP02";

        // $user = new User;
        // $categories = new Category;
        // $user -> insert($username, $email, $password);
        // $cate = $categories -> insert('Javascript');
        // $cate = $categories -> getAll();
        // $catee = $categories -> getById(1);

        // echo '<pre>';
        // print_r($cate);        
        // print_r($catee);        
        // $update = $user ->update(2,'Tran Van B','avc@gmail.com',2);
        
        // $data = $user ->getById(2);
        // print_r($data);
        // die;

        // $dataa = $user ->getAll();
        // echo '<pre>';
        // print_r($dataa);
        // die;
        
        // $delete = $user ->deleteByID(1);


        return $this->renderViewClient('home');
    }
}