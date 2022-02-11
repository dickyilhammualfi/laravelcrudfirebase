@extends('firebase.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Tambah Buku
                        <a href="{{url('buku')}}" class="btn btn-sm btn-danger float-end">kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('tambah-buku')}}" method="POST">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Pengarang Buku</label>
                            <input type="text" name="pengarang" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Judul Buku</label>
                            <input type="text" name="judul" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Buku</label>
                            <select class="form-control" name="jenis">
                                <option value="Novel">Novel</option>
                                <option value="Komik">Komik</option>
                                <option value="Biografi">Biografi</option>
                                <option value="Dongeng">Dongeng</option>
                                <option value="Karya Ilmiah">Karya Ilmiah</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Terbit Buku</label>
                            <input class="form-control" name="date" placeholder="MM/DD/YYYY" type="text">
                        </div>

                        <div class="form-group mb-3">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Sinopsis Buku</label>
                            <input class="form-control" name="sinopsis"  type="text">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   


@endsection