<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\View\View;
use App\Services\ImageService;

class ImagesController extends Controller
{
      private $images;
      public function __construct(ImageService $imageService){
        $this->images = $imageService;

      }


    function index() {
     $images = $this->images->all();
        return view('welcome',['imagesInView'=>$images]);
    }

   

    function create() {
    

        return view('create');
    }

    function show($id) {
    
        $myImage = $this->images->one($id);
        return view('show',['imageInView'=>$myImage->image]);
    }

    function edit($id) {
        $image = $this->images->one($id);
        return view('edit', ['imageInView'=>$image]);
    }

    function store(Request $request) {
  
    
        $image=$request->file('image');
        //dd($image->isValid());
        //dd(get_class_methods($image));
     //dd(storage_path());
     
        $this->images->add($image);
      
        return redirect('/');
     }

     function update(Request $request, $id){
        //$image = $request->file('image');
        $this->images->update($id, $request->image);

            return redirect('/');
        }

        function delete($id){
            $this->images->delete($id);
            return redirect('/');
        }
}
