<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\File;

class IndexController extends Controller
{

    public function callFoto()
    {
        $gel = Foto::all();
        return view('/welcome',array('yaz'=>$gel));
    }



    public function fotoekle(Request $request)
    {
        // Veriler doğrulandı.
        $request->validate([
            'name'  => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        //newImageName -> bir adet değişken yazdık. Adını belirledim.

        $newImageName = time(). '-' . $request->name. '.'. $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $foto = Foto::create([
            'name'  => $request->name,
            'image' => $newImageName
        ]);

        return back();
    }

    public function fotoSil(int $id)
    {
        $sil = Foto::find($id);
        $resimYol = public_path().'/images/'.$sil->image;
        unlink($resimYol);


        $sil->delete();
        return back();
    }


    public function editGet(int $id)
    {
        $gel2 = Foto::where('id',$id)->first();
        return view('/edit',['yaz2'=> $gel2]);
    }


    public function editFotoPost(Request $request, $id)
    {

        $request->validate([
            'name'  => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048'
        ]);


        $foto = Foto::find($id);

        $destination = public_path('images'.$foto->image);

        if(File::exists($destination))  //file yukardan tanımlama lasımyoksa hata verir.!
        {
            File::delete($destination);
        }
        $newImageName = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $guncel = Foto::where('id',$request->id)->update([
            'name'  => $request->name,
            'image' => $newImageName
        ]);


        return back();

    }




























    public function editfotoSil(int $id)
    {
        $sil = Foto::find($id);
        $resimYol = public_path().'/images/'.$sil->image;
        unlink(base_path($resimYol));

        //Foto::where('image',$sil->image)->delete();


        $sil->delete('image');

        //veritaabnında sadece imagenin versini silmem gerek.
        return back();
    }
}
