@extends('firebase.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Buku
                        <a href="{{url('buku')}}" class="btn btn-sm btn-danger float-end">kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('update-buku/'.$key)}}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label>Pengarang Buku</label>
                            <input type="text" name="pengarang" value="{{ $editdatabuku['pengarang'] }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Judul Buku</label>
                            <input type="text" name="judul" value="{{ $editdatabuku['judul'] }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Buku</label>
                            <select class="form-control" name="jenis" >
                                <option value="{{ $editdatabuku['jenis'] }}"></option>
                                <option value="Novel">Novel</option>
                                <option value="Komik">Komik</option>
                                <option value="Biografi">Biografi</option>
                                <option value="Dongeng">Dongeng</option>
                                <option value="Karya Ilmiah">Karya Ilmiah</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Terbit Buku</label>
                            <input class="form-control" name="date" value="{{ $editdatabuku['date'] }}" type="text">
                        </div>

                        <div class="form-group mb-3">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" value="{{ $editdatabuku['penerbit'] }}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Sinopsis Buku</label>
                            <input class="form-control" name="sinopsis" value="{{ $editdatabuku['sinopsis'] }}" type="text">
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