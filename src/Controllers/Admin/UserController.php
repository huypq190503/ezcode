<?php
namespace Admin\Mvcoop\Controllers\Admin;

use Admin\Mvcoop\Commons\Controller;
use Admin\Mvcoop\Models\User;

class UserController extends Controller
{
    private User $user;

    private string $folder = 'users.';

    const PATH_UPLOAD = '/uploads/users/';
    public function __construct()
    {
        $this->user = new User;
    }
    // Danh sách
    public function index()
    {
        $data['users'] = $this->user->getAll();
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
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath = null;
            if (!empty($avatar)) {

                $avatarPath = self::PATH_UPLOAD .time(). $avatar['name'];

                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = null;
                }
            }
            // print_r($avatarPath);
            // die;
            $this->user->insert($name, $email, $password, $avatarPath);
            header('Location: /admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    // Xem chi tiết theo ID
    public function show($id)
    {
        $user = $this->user->getByID($id);
        if (!empty($_POST)) {

            if (empty($user)) {
                e404();
            }
            header('Location: /admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }

    // Cập nhật theo ID
    public function update($id)
    {
        $user = $this->user->getByID($id);

        if(empty($user)){
            e404($user);
        }
        
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath =  $user['avatar'];
            if (!empty($avatar)) {

                $avatarPath = self::PATH_UPLOAD .time(). $avatar['name'];

                if (!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)) {
                    $avatarPath = $user['avatar'];
                }
            }
            $this->user->update( $id, $name, $email, $password, $role , $avatarPath );
            $_SESSION['success'] = 'Thao tác thành công!';
            // header('Location: /admin/users/');
            header("Location: /admin/users/$id/update");
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, ['user' => $user]);
    }

    // Delete theo ID
    public function delete($id)
    {
        $user = $this->user->getByID($id);

        if (empty($user)) {
            e404();
        }        
        $this->user->deleteByID($user['id']);
        if(!empty($user['avatar']) && file_exists($user['avatar'])){
            unlink(PATH_ROOT.$user['avatar']);

        }
        header('Location: /admin/users');
        exit();


    }
}