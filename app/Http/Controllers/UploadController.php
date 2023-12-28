<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid('cover-', true);
            $image->storeAs('images/tmp/' . $folder, $fileName);

            Session::put('folder', $folder);
            Session::put('fileName', $fileName);

            TemporaryImage::create([
                'folder' => $folder,
                'filename' => $fileName
            ]);
            return $folder;
        }
        return '';
    }

    public function delete()
    {
        $temporaryFolder = Session::get('folder');
        $temporaryImage = TemporaryImage::where('folder', $temporaryFolder)->first();
        if ($temporaryImage) {
            Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }

        return response()->noContent();
    }
}
