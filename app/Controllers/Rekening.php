<?php

namespace App\Controllers;

use App\Models\RekeningModel;
use App\Models\JenisModel;
use App\Models\TunaiModel;

class Rekening extends BaseController
{
    protected $rekeningModel;
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
        $this->data['page_title'] = 'Rekening';
        $this->data['rekening'] = $this->rekeningModel->getRekening();      
        return view('rekening/index', $this->data);
    }

    public function detail($id)
    {
        $this->data['page_title'] = 'Detail Rekening';
        $this->data['rekening'] = $this->rekeningModel->getRekening($id)->getRow();    
        // if data not found
        if (empty($this->data['rekening'])) :
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        endif;
        return view('rekening/detail', $this->data);
    }

    public function create()
    {
        $this->data['page_title'] = 'Detail Rekening';
        $this->data['validation'] = \Config\Services::validation();
        return view('rekening/create', $this->data);
    }
    public function save()
    {
        // validation
        if (!$this->validate([
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
            //return redirect()->to('/rekening/create')->withInput()->with('validation', $validation);
            return redirect()->to('/rekening/create')->withInput();
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
        // simpan ke db rekening
        $this->rekeningModel->save([
            'date' => $this->request->getVar('tanggal'),
            'pemasukan' => $this->request->getVar('pemasukan'),
            'pengeluaran' => $this->request->getVar('pengeluaran'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jenis' => $this->request->getVar('jenis'),
            'file' => $namaFile
        ]);
        // ID yang dimasukan
        $idRekening = $this->rekeningModel->InsertID();
        // jika jenisnya adalah tarik tunai maka simpan ke table tunai
        if($this->request->getVar('jenis')=='Tarik Tunai'):
            $this->tunaiModel->save([
                'date' => $this->request->getVar('tanggal'),
                'id_rekening' => $idRekening,
                'pemasukan' => $this->request->getVar('pengeluaran'),
                'keterangan' => $this->request->getVar('keterangan'),
                'jenis' => $this->request->getVar('jenis'),
                'file' => $namaFile
            ]);
        endif;

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
        return redirect()->to('/rekening');
    }

    public function delete($id)
    {
        //cari file berdasarkan id
        $rekening = $this->rekeningModel->find($id);
        if ($rekening['file'] != NULL) :
            //hapus file
            unlink('uploads/' . $rekening['file']);
        endif;
        $this->rekeningModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/rekening');
    }

    public function edit($id)
    {
        $this->data['page_title'] = 'Edit Rekening';
        $this->data['validation'] = \Config\Services::validation();
        $this->data['rekening'] = $this->rekeningModel->getRekening($id)->getRow();
        // if data not found
        if (empty($this->data['rekening'])) :
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan.');
        endif;
        return view('rekening/edit', $this->data);
    }

    public function update($id)
    {
        // validation
        if (!$this->validate([
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
            return redirect()->to('/rekening/edit/' . $id)->withInput();
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
            $fileUpload->move('uploads' , $namaFile);
            //cari file berdasarkan id
            $rekening = $this->rekeningModel->find($id);
            if ($rekening['file'] != NULL) :
                //hapus file
                unlink('uploads/' . $oldFile);
            endif;
        endif;

        $this->rekeningModel->save([
            'id' => $id,
            'date' => $this->request->getVar('tanggal'),
            'pemasukan' => $this->request->getVar('pemasukan'),
            'pengeluaran' => $this->request->getVar('pengeluaran'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jenis' => $this->request->getVar('jenis'),
            'file' => $namaFile
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil diubah');
        return redirect()->to('/rekening/' . $id);
    }

}
