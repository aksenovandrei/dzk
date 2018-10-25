<?php

namespace App\Http\Controllers\Admin;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->template = 'admin.dashboard';
        $this->title = 'Панель Администратора';
    }

    public function index()
    {
        $this->content = view('admin._content');
        return $this->renderOutput();
    }
}
