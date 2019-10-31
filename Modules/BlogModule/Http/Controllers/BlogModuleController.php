<?php

namespace Modules\BlogModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\BlogModule\Entities\Blog;
use Modules\BlogModule\Repository\BlogRepository;
use File;
class BlogModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

     protected $BlogReps;
     public function __construct(BlogRepository $BlogReps )
     {
         $this->BlogReps=$BlogReps;
     }

     public function index()
     {   $blogs=$this->BlogReps->find();
         return view('blogmodule::index',compact('blogs'));
     }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $blogs = $this->BlogReps->find();
        return view('blogmodule::create',compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'photo' => 'required'

        ]);

        if ($request->hasFile('photo')) {
          $file =$request->file('photo');
           $ext= $file->getClientOriginalExtension();
           $filename='coverimage' . '_' . time() . '.' . $ext;
            $file->storeAs('public/storage', $filename);
            // dd($path);



        }
        else{
            echo 'FileNotFoundException';

        }

        $blogs =new Blog();
        $blogs->name =$request->name;
        $blogs->photo =$filename;
        $blogs->save();



        return redirect('/blogmodule')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blogmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $blogs =Blog::find($id);
        return view('blogmodule::edit',compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $blogs=blog::find($id);
        $blogs->name=$request->name;
        $blogs->photo=$request->photo;
        //$blogs->save();

        $request->validate([
            'name' => 'required',
            'photo' => 'required'

        ]);

        if ($request->hasFile('photo')) {

            //delete old photo
            $image_path= url('localhost/laravel/tasksolution/public/storage/storage/'. $blogs->photo);
            File::delete($image_path);
            // unlink($image_path);

            //store new image
            $file =$request->file('photo');
            $ext= $file->getClientOriginalExtension();
            $filename='coverimage' . '_' . time() . '.' . $ext;
            $file->storeAs('public/storage', $filename);
            //dd($filename);
            $blogs->name =$request->name;
            $blogs->photo =$filename;



        }
        else{
            echo 'FileNotFoundException';

        }

        $blogs->update();
        $blogs->save();

        return redirect('/blogmodule')->with('success', 'success');    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $blogs = Blog::find($id);

        $blogs->photo=$request->photo;
        //$blogs->save();

        if ($request->hasFile('photo')) {

            //delete old photo
            $image_path= url('localhost/laravel/tasksolution/public/storage/storage/'. $blogs->photo);
            File::delete($image_path);
            // unlink($image_path);

        }

        $blogs->delete();

        return redirect()->back();
    }
}
