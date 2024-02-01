<?php

namespace Admin\Mvcoop\Controllers\Admin;

use Admin\Mvcoop\Commons\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        // dashboard : tên bladeone
        return $this->renderViewAdmin('dashboard');
    }
}