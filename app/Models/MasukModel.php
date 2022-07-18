<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasukModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_masuk')->get();
    }

    public function detailData($id_masuk)
    {
        return DB::table('tbl_masuk')->where('id_masuk', $id_masuk)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_masuk')->insert($data);
    }

    public function editData($id_masuk, $data)
    {
        DB::table('tbl_masuk')
            ->where('id_masuk', $id_masuk)
            ->update($data);
    }

    public function deleteData($id_masuk)
    {
        DB::table('tbl_masuk')
            ->where('id_masuk', $id_masuk)
            ->delete();
    }
}