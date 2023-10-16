<?php

namespace App\Http\Controllers;

use App\Models\Cari;
use Illuminate\Http\Request;
use App\Models\CustomJob;
use App\Notifications\CustomJobAddedNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function add(){
        $carikartis = Cari::all();
        
        return view('add',compact('carikartis'));
      }
    public function addPost(Request $request)
    {
        //$istanimis = $request->input('istanimi');
        $müsteriadis = $request->input('müsteriadi');
        //$tcknvkns = $request->input('tcknvkn');
        $aciklamas = $request->input('aciklama');
        $fiyats = $request->input('servisucreti');
        $baslangictarihs = $request->input('bastarih');
        $islemyuzdesis = $request->input('islemyuzdesi');
        $durums = $request->input('durum');
        $kullaniciids = $request->input('kullaniciid');

    
        $customJob = new CustomJob();

        $customJob->müsteriadi = $müsteriadis; 
        $customJob->aciklama = $aciklamas;
        $customJob->servisucreti = $fiyats;
        $customJob->bastarih = $baslangictarihs;
        $customJob->islemyuzdesi = $islemyuzdesis;
        $customJob->durum=false;
        $customJob->kullaniciid=$kullaniciids;

        
        $customJob->save();

    
        return redirect('home');
    }
    public function cari(){
        $carikartis = Cari::all();
        return view('cari',compact('carikartis'));
    }
    //}
    public function caripost(Request $request)
    {
        $carikodus = $request->input('carikodu');
        $cariadis = $request->input('cariadi');
        $tckns = $request->input('tckn');
        $adress = $request->input('adres');
        
        $cariJob = new Cari();

        $cariJob->carikodu = $carikodus;
        $cariJob->cariadi = $cariadis;
        $cariJob->tckn = $tckns;
        $cariJob->adres = $adress;

        $cariJob->save();

        return redirect('home');
    }
   
}
