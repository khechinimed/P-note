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

class UsersController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')
		         ->orderBy('id','desc')
				 ->get();

        return view('admin.users', ['users' => $users]);
    }


	public function destroy($id) {

		$image = DB::table('users')->where('id', $id)->first();
		$orginalfile=$image->photo;
		$userphoto="/userphoto/";
       $path = base_path('images'.$userphoto.$orginalfile);
	  File::delete($path);


		$userdetails = DB::table('users')
		 ->where('id', '=', $id)
		 ->get();

	  $getshop = DB::table('shop')
		 ->where('user_id', '=', $id)
		 ->get();

	  $getshop_count = DB::table('shop')
		 ->where('user_id', '=', $id)
		 ->count();




	 $uemail = $userdetails[0]->email;

	  DB::delete('delete from seller_services where user_id = ?',[$id]);
	  DB::delete('delete from rating where email = ?',[$uemail]);

	  if(!empty($getshop_count))
		 {
		 $shopid = $getshop[0]->id;
		 DB::delete('delete from booking where shop_id = ?',[$shopid]);
		 DB::delete('delete from withdraw where withdraw_shop_id = ?',[$shopid]);
		 }


	   DB::delete('delete from shop_gallery where user_id = ?',[$id]);
	   DB::delete('delete from shop where user_id = ?',[$id]);


      DB::delete('delete from users where id!=1 and id = ?',[$id]);

      return back();

   }

}
