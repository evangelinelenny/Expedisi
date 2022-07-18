@extends('layout.v_template')
@section('title','Terkirim')

@section('content')
    <a href="/terkirim/add" class="btn btn-primary btn-sm">Add</a> <br>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('pesan') }}
    </div>
    @endif
    <table class='table table bordered'>
        <thead>
            <tr> 
                <th>No</th>
                <th>Kode Terkirim</th>
                <th>Barang Terkirim</th>
                <th>Penerima</th>
                <th>Foto Penerima</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($terkirim as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->kd_terkirim }}</td>
                    <td>{{ $data->barang_terkirim }}</td>
                    <td>{{ $data->penerima }}</td>
                    <td><img src="{{ url('foto_penerima/'.$data->foto_penerima) }}" width="100px"></td>
                    <td>
                        <a href="/terkirim/detail/{{ $data->id_terkirim }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/terkirim/edit/{{ $data->id_terkirim }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_terkirim }}">
                        Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@foreach ($terkirim as $data)
    <div class="modal modal-danger fade" id="delete{{ $data->id_terkirim }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $data->barang_terkirim }}</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini..??</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/terkirim/delete/{{ $data->id_terkirim }}" class="btn btn-outline">Yes</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endforeach

@endsection