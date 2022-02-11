@extends('firebase.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
        @if(session('status'))
            <center>
                <h4 class ="alert alert-danger mb-3">{{session('status')}}</h4>
            </center>    
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Daftar Akun
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('cekdaftar')}}" method="POST">
                        @csrf 

                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>No Telepon</label>
                            <input type="text" name="telepon" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input class="form-control" name="email" type="text">
                        </div>

                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" name="daftar_btn" class="btn btn-primary">Daftar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   


@endsection