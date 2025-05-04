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
        // dump($request->berkas);
        // dump($request->file('file'));
        //AA
        // return "Pemrosesan file upload di sini";

        // B
//        if ($request->hasFile('berkas')) {
//            echo "path(): " . $request->berkas->path();
//            echo "<br>";
//            echo "extension(): " . $request->berkas->extension();
//            echo "<br>";
//            echo "getClientOriginalExtension(): " . $request->berkas->getClientOriginalExtension();
//            echo "<br>";
//            echo "getMimeType(): " . $request->berkas->getMimeType();
//            echo "<br>";
//            echo "getClientOriginalName(): " . $request->berkas->getClientOriginalName();
//            echo "<br>";
//            echo "getSize(): " . $request->berkas->getSize();
//        } else {
//            echo "Tidak ada berkas yang diupload";
//        }

        // C
//        $request->validate([
//            'berkas' => 'required|file|image|max:500',
//        ]);
//        echo $request->berkas->getClientOriginalName() . "lolos validasi";

        // D
//        $request->validate([
//            'berkas' => 'required|file|image|max:500',
//        ]);
//        $path = $request->berkas->store('uploads');
//        $path = $request->berkas->storeAs('uploads', 'berkas');
//        $namaFile = $request->berkas->getClientOriginalName();
//        $extFile = $request->berkas->getClientOriginalName();
//        $namaFile = 'web-' . time() . '.' . $extFile;
//        $path = $request->berkas->storeAs('uploads', $namaFile);
//        echo "proses upload berhasil, berkas disimpan di: " . $path;

        // E
        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);
        $extFile = $request->berkas->getClientOriginalName();
        $namaFile = 'web-' . time() . '.' . $extFile;
        $path = $request->berkas->storeAs('public', $namaFile);

        $pathBaru = asset('storage/' . $namaFile);
        echo "proses upload berhasil, berkas disimpan di: " . $path;
        echo "<br>";
        echo "Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
    }
}
