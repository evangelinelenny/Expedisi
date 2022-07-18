<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TerkirimModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_terkirim')->get();
    }

    public function detailData($id_terkirim)
    {
        return DB::table('tbl_terkirim')->where('id_terkirim', $id_terkirim)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_terkirim')->insert($data);
    }

    public function editData($id_terkirim, $data)
    {
        DB::table('tbl_terkirim')
            ->where('id_terkirim', $id_terkirim)
            ->update($data);
    }

    public function deleteData($id_terkirim)
    {
        DB::table('tbl_terkirim')
            ->where('id_terkirim', $id_terkirim)
            ->delete();
    }
}