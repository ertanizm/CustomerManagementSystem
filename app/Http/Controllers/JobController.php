<?php

namespace App\Http\Controllers;
use App\Models\Cari;
use App\Models\CustomJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function detail($id){
     $job=CustomJob::find($id);
     if(!$job){

     }  
     return view('detail',compact('job')); 
    }

    public function complete(Request $request, $id){
        $completedJob = CustomJob::find($id);
        $completedJob->durum=1;
        $completedJob->save();

        //return response()->json(['message'=>'iş başarıyla tamamlandı']);
        return redirect()->route('home');

           
    }
    

    public function list(){
        $job = Cari::all();
        return view('list', compact('job'));

    }
    public function joblist(){
        $userid = auth()->user()->id;
        $job = CustomJob::where('kullaniciid', $userid)
                                ->where('durum', 1)
                                ->get();        
                                return view('joblist', compact('job'));

    }
    public function updatedetail($id){
        $job=CustomJob::find($id);
        if(!$job){
   
        }  
        return view('updatedetail',compact('job')); 
       }
       public function update(Request $request, $id){
        $completedJob = CustomJob::find($id);
        $islemyuzdesizs = $request->input('islemyuzdesi');
        $completedJob->islemyuzdesi=$islemyuzdesizs;
        $completedJob->save();

        //return response()->json(['message'=>'iş başarıyla tamamlandı']);
        return redirect()->route('home');

           
    }

}
