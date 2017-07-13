<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index() {
    return $this->view('admin.page.dashboard.index');
  }
}
