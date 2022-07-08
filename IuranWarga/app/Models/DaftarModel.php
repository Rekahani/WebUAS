<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarModel extends Model
{
  protected $table = 'warga';
  protected $allowedFields = ['nik', 'nama', 'kelamin', 'alamat', 'no_rumah', 'status'];


  public function getDaftar($nik = false)
  {

    if ($nik === false) {
      return $this->paginate(10, 'warga');
    }

    return $this->where([
      'nik' => $nik
    ])->first();
  }

  public function getAll($status = false)
  {

    $builder = $this->table('warga');
    $builder->join('iuran', 'warga.id = iuran.warga_id');
    $builder->select('*');
    $query = $builder->get();
    return $query->getResult();

    if ($status == '1') {
      $warga = $this->table('warga')->where('status', 1);
    } elseif ($status == '0') {
      $warga = $this->table('warga')->where('status', 0);
    } else {
      $warga = $this->table('warga');
    }

    return $warga->getAll();
  }

  public function search($keyword)
  {
    $builder = $this->table('warga');
    $builder->like('nik', $keyword);
    $builder->orLike('nama', $keyword);
    $builder->orLike('alamat', $keyword);
    $builder->orLike('no_rumah', $keyword);
    return $builder;
  }
}