@extends('firebase.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
        @if(session('status'))
            <center>
                <h4 class ="alert alert-success mb-3">{{session('status')}}</h4>
            </center>    
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        HALAMAN LOGIN
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('ceklogin')}}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>   


@endsection