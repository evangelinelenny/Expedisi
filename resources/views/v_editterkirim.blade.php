@extends('layout.v_template')
@section('title','Edit Terkirim')

@section('content')

<form action="/terkirim/update/{{ $terkirim->id_terkirim }}" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Kode terkirim</label>
                    <input name="kd_terkirim" class="form-control" value="{{ $terkirim->kd_terkirim }}" readonly>
                    <div class="text-danger">
                        @error('kd_terkirim')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Barang Terkirim</label>
                    <input name="barang_terkirim" class="form-control" value="{{ $terkirim->barang_terkirim }}">
                    <div class="text-danger">
                        @error('barang_terkirim')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Penerima</label>
                    <input name="penerima" class="form-control" value="{{ $terkirim->penerima }}">
                    <div class="text-danger">
                        @error('penerima')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-sm 12">
                    <div class="col-sm-4">
                        <img src="{{ url('foto_penerima/'.$terkirim->foto_penerima) }}" width="150px">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Ganti Foto Penerima</label>
                            <input type="file" name="foto_penerima" class="form-control">
                            <div class="text-danger">
                                @error('foto_penerima')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="col-sm 12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</form>  
    
@endsection