@extends('layout.v_template')
@section('title','Detail Terkirim')
@section('content')

<table class="table">  
    <tr>
        <th width="100px">Kode Terkirim</th>
        <th width="30px">:</th>
        <th>{{ $terkirim->kd_terkirim }}</th>   
    </tr>
    <tr>
        <th width="100px">Barang Terkirim</th>
        <th width="30px">:</th>
        <th>{{ $terkirim->barang_terkirim }}</th>   
    </tr>
    <tr>
        <th width="100px">Penerima</th>
        <th width="30px">:</th>
        <th>{{ $terkirim->penerima }}</th>   
    </tr>
    <tr>
        <th width="100px">Foto</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_penerima/'.$terkirim->foto_penerima) }}" width="400px"></th>   
    </tr>
    <tr>
        <th><a href="/terkirim" class="btn btn-success tbn-sm">Kembali</a></th>
    </tr>
</table>

@endsection