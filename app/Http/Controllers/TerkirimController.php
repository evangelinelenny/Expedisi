<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TerkirimModel;

class TerkirimController extends Controller
{

    public function __construct()
    {
        $this->TerkirimModel = new TerkirimModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data =[
            'terkirim'=> $this->TerkirimModel->allData(),
        ];
        return view('v_terkirim', $data);
    }

    public function detail($id_terkirim)
    {
        if (!$this->TerkirimModel->detailData($id_terkirim)) {
            abort(404);
        }
        $data =[
            'terkirim'=> $this->TerkirimModel->detailData($id_terkirim),
        ];
        return view('v_detailterkirim', $data);
    }

    public function add() 
    {
        return view('v_addterkirim');
    }

    public function insert()
    {

        Request()->validate([
            'kd_terkirim' => 'required|unique:tbl_terkirim,kd_terkirim|min:4|max:5',
            'barang_terkirim' => 'required',
            'penerima' => 'required',
            'foto_terkirim' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'kd_terkirim.required' => 'Wajib Diisi !!',
            'kd_terkirim.unique' => 'Kode Terkirim Ini Sudah Ada !!',
            'kd_terkirim.min' => 'Min 4 Karakter',
            'kd_terkirim.max' => 'Max 5 Karakter',
            'barang_terkirim.required' => 'Wajib Diisi !!',
            'penerima.required' => 'Wajib Diisi !!',
            'foto_terkirim.required' => 'Wajib Diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto 
        $file = Request()->foto_terkirim;
        $fileName = Request()->kd_terkirim . '.' . $file->extension();
        $file->move(public_path('foto_terkirim'), $fileName);

        $data = [
            'kd_terkirim' => Request()->kd_terkirim,
            'barang_terkirim' => Request()->barang_terkirim,
            'penerima' => Request()->penerima,
            'foto_terkirim' => $fileName,
        ];

        $this->TterkirimerkirimModel->addData($data);
        return redirect()->route('terkirim')->with('pesan','Data Berhasil Di Tambahkan !!');
    }

    public function edit($id_terkirim) 
    {
        if (!$this->TerkirimModel->detailData($id_terkirim)) {
            abort(404);
        }
        $data =[
            'terkirim'=> $this->TerkirimModel->detailData($id_terkirim),
        ];
        return view('v_editterkirim', $data);
    }

    public function update($id_terkirim)
    {

        Request()->validate([
            'kd_terkirim' => 'required|min:4|max:5',
            'barang_terkirim' => 'required',
            'penerima' => 'required',
            'foto_terkirim' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'kd_terkirim.required' => 'Wajib Diisi !!',
            'kd_terkirim.min' => 'Min 4 Karakter',
            'kd_terkirim.max' => 'Max 5 Karakter',
            'barang_terkirim.required' => 'Wajib Diisi !!',
            'penerima.required' => 'Wajib Diisi !!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if(Request()->foto_terkirim <> "") {
            //jika ingin ganti foto
            //upload gambar/foto 
            $file = Request()->foto_terkirim;
            $fileName = Request()->kd_terkirim . '.' . $file->extension();
            $file->move(public_path('foto_terkirim'), $fileName);
            $data = [
                'kd_terkirim' => Request()->kd_terkirim,
                'barang_terkirim' => Request()->barang_terkirim,
                'penerima' => Request()->penerima,
                'foto_terkirim' => $fileName,
            ];

            $this->TerkirimModel->editData($id_terkirim, $data);
        }else{
            //jika tidak ingin ganti foto
            $data = [
                'kd_terkirim' => Request()->kd_terkirim,
                'barang_terkirim' => Request()->barang_terkirim,
                'penerima' => Request()->penerima,
            ];
            $this->TerkirimModel->editData($id_terkirim, $data);
        }
        
        return redirect()->route('terkirim')->with('pesan','Data Berhasil Di Update !!');
    }

    public function delete($id_terkirim)
    {
        //hapus atau delete foto
        $terkirim = $this->TerkirimModel->detailData($id_terkirim);
        if ($terkirim->foto_terkirim <> "") {
            unlink(public_path('foto_terkirim') . '/' . $terkirim->foto_terkirim);
        }
        
        $this->TerkirimModel->deleteData($id_terkirim);
        return redirect()->route('terkirim')->with('pesan','Data Berhasil Di Hapus !!');
    }
}