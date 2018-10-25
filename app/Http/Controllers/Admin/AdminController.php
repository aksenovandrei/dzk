<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gate;

class AdminController extends Controller
{
    protected $a_rep; // articles
    protected $c_rep; // categories
    protected $t_rep; // tags
    protected $n_rep; // news
    protected $user;
    protected $template;
    protected $content = '<h2>'.'Нет данных для отображения'.'</h2>';
    protected $title;
    protected $vars;
    protected $where = false;

    public function __construct()
    {
        $this->user = Auth::user();
//        if (!$this->user) {
//           abort(404);
//        }
//        if (Gate::denies('VIEW_ADMIN')) {
//            Auth::logout();
//        }
    }
    public function renderOutput(){
        $this->vars = array_add($this->vars, 'title', $this->title);
        $navigation = view('admin._sidebar');
        $this->vars = array_add($this->vars, 'navigation', $navigation);

        $this->vars = array_add($this->vars, 'content', $this->content);

        return view($this->template)->with($this->vars);
    }
}
