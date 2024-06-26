<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas'=>'required|file|image|max:5000',
        ]);
        $extfile=$request->berkas->getClientOriginalExtension();
        $nama=$request->input('namaFile');
        $namaFile='web-'.time().".".$nama.".".$extfile;

        $path = $request->berkas->move('gambar',$namaFile);
        $path = str_replace("\\","//", $path);

        $pathBaru=asset('gambar/'.$namaFile);
        echo "Proses upload berhasil, data disimpan pada: <a href='$pathBaru'>$nama.$extfile</a>";
        echo "<br>";
        echo "<img src='$pathBaru' alt='Gambar' style='max-width: 300px; max-height: 300px;' >";

        // $extfile=$request->berkas->getClientOriginalName();
        // echo "Variable path berisi:$path <br>";
        
        // $path = $request->berkas->storeAs('public',$namaFile);
        // $namaFile=$request->berkas->getClientOriginalName();
        // $path = $request->berkas->store('uploads');
        // echo $request->berkas->getClientOriginalName()." Lolos validasi";
        // dump($request->berkas);
        // dump($request->file('file'));
        // return "Pemrosesan file upload di sini";
        // if ($request->hasFile('berkas')) {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // }
        // else {
        //     echo "Tidak ada berkas yang diupload";
        // }
    }
}
