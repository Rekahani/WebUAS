<?php

namespace App\Models;

use CodeIgniter\Model;

class KasModel extends Model
{
  protected $table = 'iuran';
  protected $allowedFields = ['keterangan', 'tanggal', 'bulan', 'tahun', 'jumlah', 'warga_id', 'status'];

  public function getAll($id = false)
  {

    $builder = $this->table('iuran');
    $builder->join('warga', 'iuran.warga_id = warga.id');
    $builder->select('*');
    $query = $builder->get();
    return $query->getResult();

    if ($id === false) {
      return $this->paginate(10, 'iuran');
    }

    return $this->where([
      'id' => $id
    ])->first();
  }

  public function total()
  {
    $builder = $this->table('iuran');
    $builder->selectSum('jumlah');
    $query = $builder->get();
    return $query->getResult();
  }


  public function bulan()
  {
    $builder = $this->table('iuran');
    $builder->select('bulan');
    $query = $builder->get(1, 1);
    return $query->getResult();
  }

  // public function kas()
  // {
  //   $builder = $this->table('iuran');
  //   $builder->join('warga', 'iuran.warga_id = warga.id');
  //   $builder->select('*');

  // }



  public function search($keyword)
  {
    $builder = $this->table('iuran');
    $builder->like('nama', $keyword);
    return $builder;
  }
}