<?php
namespace Modules\BlogModule\Repository;
use Modules\BlogModule\Entities\Blog;
class BlogRepository{


   #index
    public function find() {

       $blogs=Blog::all();
        return $blogs;
   }

   #insert

   public function save($data){
   $blogs=Blog::create($data);
   return $blogs;
   }
   //edit

   public function finds($id) {

    $blogs=Blog::all();
     return $blogs;
}

   #update
  /* public function update($id,$data){

    $blogs =Blog::find($id);
    $blogs->update($data);
    $blogs->save();
    return $blogs;
   }
   */

   #delete

   public function delete($data){

    if ($data->photo) {
        $file_path = url('localhost/laravel/tasksolution/public/storage/storage/'. $data->photo);
        File::delete($file_path);
    }

     Blog::destroy($data->id);
   }

}
