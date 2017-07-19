<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SummartController extends Controller
{
  public function index() {
    return $this->view('admin.page.summary.index');
  }
}
