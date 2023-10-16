<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cari;
use App\Models\CustomJob;
class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
 
        $user->save();
 
        return redirect('login');
    }
    public function login(){
        return view('login');
    }
    public function loginPost(Request $request){
        $credetails=[
            'name' => $request->name,
            'password'=>$request->password
        ];
        if(Auth::attempt($credetails)){
            if($request->name==="admin" && $request->password==="01041976"){
                return redirect('admin')->with('success','Giriş Başarılı');
            }
            else{

                return redirect('/home')->with('success','Giriş Başarılı');
            }
        }
        return redirect('login');
    }
    public function admin(){
        $carikartis = Cari::all();
        $kullanicis = User::all();
        return view('admin',compact('carikartis','kullanicis'));    
    }
    public function adminpost(Request $request){
        $müsteriadis = $request->input('müsteriadi');
        //$tcknvkns = $request->input('tcknvkn');
        $istanimis= $request->input('istanimi');
        $aciklamas = $request->input('aciklama');
        $fiyats = $request->input('servisucreti');
        $baslangictarihs = $request->input('bastarih');
        $islemyuzdesis = $request->input('islemyuzdesi');
        $durums = $request->input('durum');
        $kullaniciids = $request->input('kullaniciid');

        // $bitistarihs = $request->input('bitistarih');
    
        $customJob = new CustomJob();

        //$customJob->istanimi = $istanimis;
        $customJob->müsteriadi = $müsteriadis;
        $customJob->aciklama = $aciklamas;
        $customJob->servisucreti = $fiyats;
        $customJob->bastarih = $baslangictarihs;
        $customJob->islemyuzdesi = $islemyuzdesis;
        $customJob->durum=false;
        $customJob->istanimi = $istanimis;
        $customJob->kullaniciid=$kullaniciids;

        
        $customJob->save();
        
    
        return redirect('admin');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
