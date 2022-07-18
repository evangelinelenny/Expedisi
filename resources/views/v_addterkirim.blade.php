@extends('layout.v_template')
@section('title','Add Terkirim')

@section('content')

<form action="/terkirim/insert" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Kode terkirim</label>
                    <input name="kd_terkirim" class="form-control" value="{{ old('kd_terkirim') }}">
                    <div class="text-danger">
                        @error('kd_terkirim')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Barang Terkirim</label>
                    <input name="barang_terkirim" class="form-control" value="{{ old('barang_terkirim') }}">
                    <div class="text-danger">
                        @error('barang_terkirim')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Penerima</label>
                    <input name="penerima" class="form-control" value="{{ old('penerima') }}">
                    <div class="text-danger">
                        @error('penerima')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Foto Penerima</label>
                    <input type="file" name="foto_penerima" class="form-control">
                    <div class="text-danger">
                        @error('foto_penerima')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>

</form>

@endsection