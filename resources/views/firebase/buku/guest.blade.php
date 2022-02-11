@extends('firebase.app')

@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-12">

        @if(session('status'))
            <center>
                <h4 class ="alert alert-warning mb-3">{{session('status')}}</h4>
            </center>    
        @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        Daftar buku
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pengarang</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Jenis Buku</th>
                                <th scope="col">Terbit Buku</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Sinopsis</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $id=1; @endphp
                            @forelse ($buku as $key => $item)

                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item['pengarang']}}</td>
                                <td>{{ $item['judul'] }}</td>
                                <td>{{ $item['jenis'] }}</td>
                                <td>{{ $item['date'] }}</td>
                                <td>{{ $item['penerbit'] }}</td>
                                <td>{{ $item['sinopsis'] }}</td>
                                <td><a href="{{ url('bacabuku/'.$key) }}" class="btn btn-sm btn-info">Baca</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7"> Tidak Ada Buku </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </tabel>
                </div>
            </div>
        </div>
    </div>
</div>   

@endsection