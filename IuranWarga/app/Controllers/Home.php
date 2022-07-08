<?php

namespace App\Controllers;

use App\Models\DaftarModel;

class Home extends BaseController
{


    protected $DaftarModel;
    public function __construct()
    {
        $this->DaftarModel = new DaftarModel();
    }


    public function index()
    {

        // $daftar = $this->DaftarModel->findAll();

        $currentPage = $this->request->getVar('page_warga') ? $this->request->getVar('page_warga') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $warga = $this->DaftarModel->search($keyword);
        } else {
            $warga = $this->DaftarModel;
        }

        $data = [
            'title' => 'Daftar Warga',
            'daftar' => $warga->getDaftar(),
            'all' => $warga->getAll(),
            'pager'  => $this->DaftarModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pages/index', $data);
    }


    public function detail($nik)
    {
        $data = [
            'title' => 'Detail Warga',
            'warga' => $this->DaftarModel->getDaftar($nik)
        ];

        if (empty($data['warga'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data warga ' . $nik . ' tidak ditemukan');
        }
        return view('pages/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Warga',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nik' => [
                'rules' => 'required|numeric|is_unique[warga.nik]',
                'errors' => [
                    'required' => 'NIK warga harus diisi',
                    'numeric' => 'NIK warga harus berupa angka',
                    'is_unique' => 'NIK warga sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama warga harus diisi'
                ]
            ],
            'kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin warga harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat warga harus diisi'
                ]
            ],
            'no_rumah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'numeric' => 'No Rumah warga harus berupa angka',
                    'required' => 'No. Rumah warga harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status warga harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/pages/create')->withInput()->with('validation', $validation);
        }

        $data = [
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'kelamin' => $this->request->getPost('kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_rumah' => $this->request->getPost('no_rumah'),
            'status' => $this->request->getPost('status')
        ];
        $this->DaftarModel->save($data);

        session()->setFlashdata('pesan', 'Data warga berhasil ditambahkan');
        return redirect()->to('/warga');
    }

    public function edit($nik)
    {
        $data = [
            'title' => 'Form Edit Data Warga',
            'validation' => \Config\Services::validation(),
            'warga' => $this->DaftarModel->getDaftar($nik)
        ];
        if (empty($data['warga'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data warga ' . $nik . ' tidak ditemukan');
        }
        return view('pages/edit', $data);
    }

    public function update($id)
    {

        // cek apakah nik yang diupdate sudah ada atau belum
        $daftarLama = $this->DaftarModel->getDaftar($this->request->getPost('nik'));
        if (!empty($daftarLama) && $daftarLama['nik'] != $this->request->getPost('nik')) {
            session()->setFlashdata('pesan', 'NIK warga sudah terdaftar');
            return redirect()->to('/pages/edit/' . $this->request->getPost('nik'));
        } else {
            if (!$this->validate([
                'nik' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => 'NIK warga harus diisi',
                        'numeric' => 'NIK warga harus berupa angka'
                    ]
                ],
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama warga harus diisi'
                    ]
                ],
                'kelamin' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kelamin warga harus diisi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat warga harus diisi'
                    ]
                ],
                'no_rumah' => [
                    'rules' => 'required|numeric',
                    'errors' => [
                        'numeric' => 'No Rumah warga harus berupa angka',
                        'required' => 'No. Rumah warga harus diisi'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status warga harus diisi'
                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                return redirect()->to('/pages/edit/' . $this->request->getPost('nik'))->withInput()->with('validation', $validation);
            }
        }

        $this->DaftarModel->save([
            'id' => $id,
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'kelamin' => $this->request->getPost('kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'no_rumah' => $this->request->getPost('no_rumah'),
            'status' => $this->request->getPost('status')
        ]);
        session()->setFlashdata('pesan', 'Data warga berhasil diubah');
        return redirect()->to('/warga');
    }

    public function Kas($nik)
    {
        $data = [
            'title' => 'Tambah Kas Warga',
            'validation' => \Config\Services::validation(),
            'warga' => $this->DaftarModel->getDaftar($nik)
        ];
        return view('/daftar/create', $data);
    }



    public function delete($id)
    {
        $this->DaftarModel->delete($id);
        session()->setFlashdata('pesan', 'Data warga berhasil dihapus');
        return redirect()->to('/warga');
    }
}