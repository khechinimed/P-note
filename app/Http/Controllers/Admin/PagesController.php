<?php

namespace App\Http\Controllers\Admin;



use File;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return App
     */
    public function index()
    {
        $pages = DB::table('pages')->get();

        return view('admin.pages', ['pages' => $pages]);
    }



	public function view_notes()
    {
        $notes = DB::table('notes')->get();

        return view('admin.notes', ['notes' => $notes]);
    }



	public function view_delete($id)
	{

		DB::delete('delete from notes where id = ?',[$id]);

      return back();

	}

	protected function delete_all(Request $request)
    {


	   $data = $request->all();
	   $noteid = $data['note_id'];

	   foreach($noteid as $note)
	   {
		   DB::delete('delete from notes where id = ?',[$note]);
	   }

      return back();

	}



	public function showform($id) {
      $pages = DB::select('select * from pages where page_id = ?',[$id]);
      return view('admin.edit-page',['pages'=>$pages]);
   }




   protected function pagedata(Request $request)
    {






		 $data = $request->all();

         $page_id=$data['page_id'];

		$page_title=$data['page_title'];

		/* $page_desc=htmlentities(htmlspecialchars($data['page_desc']));*/



		$page_desc = e(Input::get('page_desc'));


		DB::update('update pages set page_title="'.$page_title.'",page_desc="'.$page_desc.'" where page_id = ?', [$page_id]);

			return back()->with('success', 'Page has been updated');





    }






	public function destroy($id) {

		$image = DB::table('testimonials')->where('id', $id)->first();
		$orginalfile=$image->image;
		$testimonialphoto="/testimonialphoto/";
       $path = base_path('images'.$testimonialphoto.$orginalfile);
	  File::delete($path);
      DB::delete('delete from testimonials where id = ?',[$id]);

      return back();

   }

}
