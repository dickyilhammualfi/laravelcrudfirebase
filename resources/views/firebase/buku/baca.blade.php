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
                <?php session_start(); ?>
                <div class="card-header">
                    <h4>
                        DETAIL BUKU
                        <?php if(Session::has('email') == 'admin@gmail.com') { ?>
                            <a href="{{url('buku')}}" class="btn btn-sm btn-primary float-end">Kembali</a>
                        <?php } else if(Session::has('email') == 'staff@gmail.com') { ?>
                            <a href="{{url('bukustaff')}}" class="btn btn-sm btn-primary float-end">Kembali</a>
                        <?php } else { ?>
                            <a href="{{url('bukuguest')}}" class="btn btn-sm btn-primary float-end">Kembali</a>
                            <?php } ?>
                    </h4>
                </div>
                <div class="card-body">
                
                 
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                            @php $id=1; @endphp
                                <th scope="col">No Buku</th>
                                <th scope="col"> : {{ $id++ }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr><td>Nama Pengarang  </td>
                            <td> : {{ $bacabuku['pengarang']}}</td></tr>
                            <tr><td>Judul Buku </td>
                            <td> : {{ $bacabuku['judul'] }}</td></tr>
                            <tr><td>Jenis Buku </td>
                            <td> : {{ $bacabuku['jenis'] }}</td></tr>
                            <tr><td>Terbit Buku  </td>
                            <td> : {{ $bacabuku['date'] }}</td></tr>
                            <tr><td>Penerbit Buku </td>
                            <td> : {{ $bacabuku['penerbit'] }}</td></tr>
                            <tr><td>Sinopsis Buku </td>
                            <td> : {{ $bacabuku['sinopsis'] }}</td></tr></tr>
                            </tr>
                        </tbody>
                    </tabel>
                    
                </div>
            </div>
        </div>
    </div>
</div>   

@endsection