<?php

namespace App\Controllers;


class Warga extends BaseController
{

  public function index()
  {
    $data = [
      'title' => 'Halaman Dashboard',
    ];

    return view('dashboard/index', $data);
  }
}