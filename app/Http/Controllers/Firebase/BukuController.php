<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth;






class BukuController extends Controller
{

    public function __construct(Database $database, Auth $auth)
    { 
        $this->database = $database;
        $this->tablename = 'buku';
        $this->auth = $auth;
        
    }

    public function index()
    {
        $buku = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.buku.index', compact('buku'));
    }

    public function login(){
        return view('firebase.login.login');
    }

    public function ceklogin(Request $request){

        $email = $request->email;
        $clearTextPassword = $request->password;
        session_start();
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $clearTextPassword);
            $idTokenString = $signInResult->idToken();

                    
            
            if($idTokenString && $email == 'admin@gmail.com'){
                Session::put('firebaseUserId', $signInResult->firebaseUserId());
                Session::put('idToken', $idTokenString);
                Session::put('email', $email);
                Session::save();
                return redirect('buku')->with('status','Berhasil Login Sebagai Admin');
            }else if($idTokenString && $email == 'staff@gmail.com'){
                
                Session::put('firebaseUserId', $signInResult->firebaseUserId());
                Session::put('idToken', $idTokenString);
                Session::put('email', $email);
                Session::save();
                return redirect('bukustaff')->with('status','Berhasil Login Sebagai Staff');                 
            }else if($idTokenString){
                
                Session::put('firebaseUserId', $signInResult->firebaseUserId());
                Session::put('idToken', $idTokenString);
                Session::save();
                return redirect('bukuguest')->with('status','Berhasil Login Sebagai Guest');                 
            }
            else{
                return redirect('login')->with('status','Tidak Berhasil login');
            }
       

        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return redirect('login')->with('status','Kata Sandi Salah ..!');
                    break;
                case 'EMAIL_NOT_FOUND':
                    return redirect('login')->with('status','Email tidak ditemukan');
                    break;
                case 'A password must be a string with at least 6 characters.':
                    return redirect('login')->with('status','Pasword Minimal 6 Karater');
                    break;
                default:
                    dd($e->getMessage());
                    break;
            }
        }
        
        
    }

    public function daftar(){
        return view('firebase.daftar.daftar');
    }

    public function cekdaftar(Request $request){
        $userProperties = [
            'email' => $request->email,
            'emailVerified' => false,
            'phoneNumber' => '+62'.$request->telepon,
            'password' => $request->password,
            'displayName' => $request->nama,
        ];
        try {
        $createdUser = $this->auth->createUser($userProperties);
        if($createdUser){
            return redirect('login')->with('status','Berhasil Membuat Akun'); 
        }else{
            return redirect('daftar')->with('status','Buku Tidak Ditambahkan');
        }
    } catch (\Throwable $e) {
        switch ($e->getMessage()) {
            case 'The email address is already in use by another account.':
                return redirect('daftar')->with('status','Email sudah digunakan.');
                break;
            case 'A password must be a string with at least 6 characters.':
                return redirect('daftar')->with('status', 'Kata sandi minimal 6 karakter.');
                break;
            default:
                dd($e->getMessage());
                break;
        }
    }
    }

    public function ceklogout(){

        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
            unset($_SESSION['email']);
            Session::forget('firebaseUserId');
            Session::forget('idToken');
            Session::forget('email');
            Session::save();
            return redirect('login')->with('status','Berhasil Keluar dari Akun'); 
        } else {
            return redirect('login')->with('status','Masih Belum Login'); 
        }
    }

    public function staff(){
        $buku = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.buku.staff', compact('buku'));
    }

    public function bukuguest(){
        $buku = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.buku.guest', compact('buku'));
    }

    public function baca($id)
    {
        $key = $id;
        $bacabuku = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($bacabuku)
        {
            return view ('firebase.buku.baca', compact('bacabuku', 'key'));
        }
        else 
        {
            return redirect('guest')->with('status','ID Buku Tidak Ditemukan');
        }
    }

    public function tambah()
    {
        return view('firebase.buku.tambah');
    }

    public function simpanbuku(Request $request)
    {
        $postData = [
            'pengarang' => $request->pengarang,
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'date' => $request->date,
            'penerbit' => $request->penerbit,
            'sinopsis' => $request->sinopsis,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('buku')->with('status','Buku Berhasil Ditambahkan');
        }
        else
        {
            return redirect('buku')->with('status','Buku Tidak Ditambahkan');
        }
    }
    public function editbuku($id)
    {
        $key = $id;
        $editdatabuku = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdatabuku)
        {
            return view ('firebase.buku.edit', compact('editdatabuku', 'key'));
        }
        else 
        {
            return redirect('buku')->with('status','ID Buku Tidak Ditemukan');
        }

    }
    public function updatebuku(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'pengarang' => $request->pengarang,
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'date' => $request->date,
            'penerbit' => $request->penerbit,
            'sinopsis' => $request->sinopsis,
        ];

        $res_updatebuku = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if ($res_updatebuku)
        {
            return redirect('buku')->with('status','Update Buku Berhasil');
        }
        else
        {
            return redirect('buku')->with('status','Buku tidak diupdate');
        }
    }
    public function hapusbuku($id)
    {
        $key = $id;
        $del_buku = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_buku)
        {
            return redirect('buku')->with('status','Hapus Buku Berhasil');
        }
        else
        {
            return redirect('buku')->with('status','Buku tidak dihapus');
        }
    }
}
