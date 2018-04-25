<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use App\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of all media objects.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $media_items = Media::all();
        
        return view('media.index', ['media' => $media_items]);
        
    }
    
    /**
     * Store a newly created media object in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         
        $this->validate($request, [
            'file' => 'required|image|max:1999'
        ]);
        
        if ($request->hasFile('file')) {
            // Fetch the file from the input
            $file = $request->file('file');
            // Generate a unique filename for the media item using the user ID, time and original filename
            $filename = 'u' . auth()->user()->id . time() . $file->getClientOriginalName();
            // Store it on the local server file storage
            $location = public_path('media/' . $filename);
            Image::make($file)->save($location);
            
            auth()->user()->upload(
                new Media(['file' => $filename])
            );
        }
        
        return back();
    }
    
}
