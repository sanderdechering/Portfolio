<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Image::All();


        $unfiltered_files = Storage::allFiles('images/');
        $files = [];
        foreach ($unfiltered_files as $file){
            $info = pathinfo($file);
            if($info['extension'] != 'DS_Store'){
                array_push($files, $file);
            }
        }
        return view('image.index', compact('images', 'files') );
    }


    public function create()
    {
        //Create form in de project edit view
    }

    public function store(Request $request)
    {
        request()->validate([
            'project_id' => 'required',
            'main_image' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        ]);
        $image = new Image();
        $image->project_id = request('project_id');

        if (Image::where('main_image', '1')->get()){
            $image->main_image = 0;
        }else{
            $image->main_image = 1;
        }
        $image->title = $request->image->getClientOriginalName();
        $image->save();
        request()->image->move('storage/images', $image->title);
        return back();
    }

    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('image.edit', compact('image'));
    }

    function update(Image $image)
    {
        $i = (object) $image->attributesToArray();
        Image::where('project_id', $i->project_id)->where('main_image', 1)->update(['main_image'=> 0]);
        $image->update($this->validateRequest());
        return redirect('/admin/images/'. $image->id);
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect('admin/projects/'.$image->project_id)->with('message', 'Image '.$image->title.' deleted');
    }

    private function validateRequest()
    {
        return  request()->validate([
            'title' => 'required',
            'project_id' => 'required',
            'main_image' => 'required'
        ]);
    }
}
