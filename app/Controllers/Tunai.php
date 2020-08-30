<?php

namespace App\Controllers;

use App\Models\RekeningModel;
use App\Models\JenisModel;
use App\Models\TunaiModel;

class Tunai extends BaseController
{
    protected $jenisModel;
    protected $tunaiModel;
    public function __construct()
    {
        $this->rekeningModel = new RekeningModel();
        $this->jenisModel = new JenisModel();
        $this->tunaiModel = new TunaiModel();
        $this->data['jenis'] = $this->jenisModel->getJenis();
    }

    public function index()
    {
        $this->data['page_title'] = 'Tunai';
        return view('tunai/index', $this->data);
    }

    public function detail($id)
    {
        $this->data['page_title'] = 'Detail Tunai';
        $this->data['tunai'] = $this->tunaiModel->getTunai($id)->getRow();
        // if data not found
        if (empty($this->data['tunai'])) :
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        endif;
        return view('tunai/detail', $this->data);
    }

    public function create()
    {
        $this->data['page_title'] = 'Detail Tunai';
        $this->data['validation'] = \Config\Services::validation();
        return view('tunai/create', $this->data);
    }
    public function save()
    {
        // validation
        if (!$this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Harus diisi cok!.']
            ],
            'keterangan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Harus diisi cok!.']
            ],
            'file' => [
                'rules' => 'max_size[file,5000]|is_image[file]|mime_in[file,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'ini bukan gambar mime in'
                ]
            ]
        ])) :
            //$validation = \Config\Services::validation();
            //return redirect()->to('/tunai/create')->withInput()->with('validation', $validation);
            return redirect()->to('/tunai/create')->withInput();
        endif;
        // ambil gambar
        $fileUpload = $this->request->getFile('file');
        // apakah tidak ada gambar yang diupload, error 4 adalah kosong/tidak ada file yang diupload
        if ($fileUpload->getError() == 4) :
            $namaFile = NULL;
        else :
            // generate nama sampul random
            $namaFile = $fileUpload->getRandomName();
            // pindahkan ke folder img
            $fileUpload->move('uploads', $namaFile);
        endif;
        // simpan ke db tunai
        $this->tunaiModel->save([
            'date' => $this->request->getVar('tanggal'),
            'pemasukan' => str_replace('.','',$this->request->getVar('pemasukan')),
            'pengeluaran' => str_replace('.','',$this->request->getVar('pengeluaran')),
            'keterangan' => $this->request->getVar('keterangan'),
            'jenis' => $this->request->getVar('jenis'),
            'file' => $namaFile
        ]);
        // jika jenisnya adalah tarik tunai maka simpan ke table tunai
        if ($this->request->getVar('jenis') == 'Tarik Tunai') :
            $this->tunaiModel->save([
                'date' => $this->request->getVar('tanggal'),
                'pemasukan' => str_replace('.','',$this->request->getVar('pemasukan')),
                'keterangan' => $this->request->getVar('keterangan'),
                'jenis' => $this->request->getVar('jenis'),
                'file' => $namaFile
            ]);
        endif;

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
        return redirect()->to('/tunai');
    }

    public function delete($id)
    {
        //cari file berdasarkan id
        $tunai = $this->tunaiModel->find($id);
        if ($tunai['file'] != NULL) :
            //hapus file
            unlink('uploads/' . $tunai['file']);
        endif;
        $this->tunaiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/tunai');
    }

    public function edit($id)
    {
        $this->data['page_title'] = 'Edit Tunai';
        $this->data['validation'] = \Config\Services::validation();
        $this->data['tunai'] = $this->tunaiModel->getTunai($id)->getRow();
        // if data not found
        if (empty($this->data['tunai'])) :
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        endif;
        return view('tunai/edit', $this->data);
    }

    public function update($id)
    {
        // validation
        if (!$this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Harus diisi cok!.']
            ],
            'keterangan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Harus diisi cok!.']
            ],
            'file' => [
                'rules' => 'max_size[file,5000]|is_image[file]|mime_in[file,image/jpeg,image/jpg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'ini bukan gambar mime in'
                ]
            ]
        ])) :
            return redirect()->to('/tunai/edit/' . $id)->withInput();
        endif;

        $fileUpload = $this->request->getFile('file');
        $oldFile = $this->request->getVar('oldFile');
        // cek gambar, apakah tetap gambar lama
        if ($fileUpload->getError() == 4) :
            $namaFile = $oldFile;
        else :
            // get random nama file
            $namaFile = $fileUpload->getRandomName();
            // pindahkan file 
            $fileUpload->move('uploads', $namaFile);
            //cari file berdasarkan id
            $tunai = $this->tunaiModel->find($id);
            if ($tunai['file'] != NULL) :
                //hapus file
                unlink('uploads/' . $oldFile);
            endif;
        endif;

        $this->tunaiModel->save([
            'id' => $id,
            'date' => $this->request->getVar('tanggal'),
            'pemasukan' => str_replace('.','',$this->request->getVar('pemasukan')),
            'pengeluaran' => str_replace('.','',$this->request->getVar('pengeluaran')),
            'keterangan' => $this->request->getVar('keterangan'),
            'jenis' => $this->request->getVar('jenis'),
            'file' => $namaFile
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');
        return redirect()->to('/tunai/' . $id);
    }
    public function bulan_tahun()
    {
        $sesdata = [
            'bulan'     => $this->request->getVar('bulan'),
            'tahun'     => $this->request->getVar('tahun')
        ];

        $this->session->set($sesdata);
        $this->data = [
            'bulan' =>  $this->session->get('bulan'),
            'tahun' =>  $this->session->get('tahun')
        ];
        return redirect()->to('/tunai');
    }

    public function gasBler()
    {
        $tahun = $this->session->get('tahun');
        $bulan = $this->session->get('bulan');
        $where = [
            'substr(date,6,2)' => $bulan,
            'substr(date,1,4)' => $tahun
        ];
        $data =  $this->tunaiModel->getWhere($where);
        foreach ($data->getResult() as $row)
        {
            echo $row->pengeluaran;
        }
    }
}
