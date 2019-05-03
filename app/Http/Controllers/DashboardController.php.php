<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
		$editprofile = DB::select('select * from users where id = ?',[$userid]);
		$data = array('editprofile' => $editprofile);
		return view('dashboard')->with($data);
    }


	public function sangvish_logout()
	{
		Auth::logout();
       return back();
	}


	public function sangvish_deleteaccount()
	{
		$userid = Auth::user()->id;


		$userdetails = DB::table('users')
		 ->where('id', '=', $userid)
		 ->get();








	 $uemail = $userdetails[0]->email;









		DB::delete('delete from users where id!=1 and id = ?',[$userid]);
		return back();
	}




	 protected function sangvish_edituserdata(Request $request)
    {




		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email'





        	]);

		 $data = $request->all();

         $id=$data['id'];

		$input['email'] = Input::get('email');

		$input['name'] = Input::get('name');


		$rules = array(



        'email'=>'required|email|unique:users,email,'.$id,
		'name' => 'required|regex:/^[\w-]*$/|max:255|unique:users,name,'.$id,
		'photo' => 'max:1024|mimes:jpg,jpeg,png'


        );


		$messages = array(

            'email' => 'The :attribute field is already exists',
            'name' => 'The :attribute field must only be letters and numbers (no spaces)'

        );





		 $validator = Validator::make(Input::all(), $rules, $messages);



		if ($validator->fails())
		{
			 $failedRules = $validator->failed();

			return back()->withErrors($validator);
		}
		else
		{


		$name=$data['name'];
		$email=$data['email'];
		$password=bcrypt($data['password']);



		$phone=$data['phone'];


		$currentphoto=$data['currentphoto'];


		$image = Input::file('photo');
        if($image!="")
		{
            $userphoto="/userphoto/";
			$delpath = base_path('images'.$userphoto.$currentphoto);
			File::delete($delpath);
			$filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = base_path('images'.$userphoto.$filename);

                Image::make($image->getRealPath())->resize(200, 200)->save($path);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}


		if($data['password']!="")
		{
			$passtxt=$password;
		}
		else
		{
			$passtxt=$data['savepassword'];
		}

		$admin=$data['usertype'];

		$gender = $data['gender'];


		DB::update('update users set name="'.$name.'",email="'.$email.'",password="'.$passtxt.'",gender="'.$gender.'",phone="'.$phone.'",photo="'.$savefname.'",admin="'.$admin.'" where id = ?', [$id]);



			return back()->with('success', 'Account has been updated');
        }




    }


}
