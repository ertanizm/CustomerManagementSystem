<?php

namespace App\Http\Controllers;

use App\Models\CustomJob;
use App\Models\Cari;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(){
    $userid =auth()->user()->id;
    $bekleyenisler = CustomJob::where('kullaniciid',$userid)->where('durum',0)->count();;
    $toplamyapilanisler = CustomJob::where('kullaniciid',$userid)->where('durum',1)->count();;
    $custom_jobs = CustomJob::where('kullaniciid',$userid)->where('durum',0)->get();;
    return view('home', compact('custom_jobs','bekleyenisler','toplamyapilanisler'));

// Toplam Yapılan İşler
/*$completedJobsCount = DB::table('customjobs')
    ->where('kullaniciid', $userid) 
    ->where('durum', 1)
    ->count();
    return view('home', compact('custom_jobs'));*/
  } 
  
  //barkodu küçük dediler :(
    //public function cari(){
      
      //return view('cari');
    //   public function cari(){
    //     $carikartis = Cari::all();
    //     return view('home',compact('carikartis'));
    // }
    // //}
    // public function caripost(Request $request)
    // {
    //     $carikodus = $request->input('carikodu');
    //     $cariadis = $request->input('cariadi');
    //     $tckns = $request->input('tckn');
    //     $adress = $request->input('adres');
        
    //     $cariJob = new Cari();

    //     $cariJob->carikodu = $carikodus;
    //     $cariJob->cariadi = $cariadis;
    //     $cariJob->tckn = $tckns;
    //     $cariJob->adres = $adress;

    //     $cariJob->save();

    //     return redirect()->back()->with('success', 'Form submitted successfully.');
    // }
    

}
