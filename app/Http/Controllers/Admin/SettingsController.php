<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class SettingsController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }


	public function showform() {
      $settings = DB::select('select * from settings where id = ?',[1]);




	  $data=array('settings'=>$settings);
      return view('admin.settings')->with($data);
   }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

	  protected $fillable = ['name', 'email','password','phone'];

    protected function editsettings(Request $request)
    {






		 $data = $request->all();


		$site_name=$data['site_name'];








		 $rules = array(

		'site_logo' => 'max:1024|mimes:jpg,jpeg,png',
		'site_favicon' => 'max:1024|mimes:jpg,jpeg,png'



        );

		$messages = array(



        );

		$validator = Validator::make(Input::all(), $rules, $messages);



		if ($validator->fails())
		{
			$failedRules = $validator->failed();

			return back()->withErrors($validator);
		}
		else
		{

		$currentlogo=$data['currentlogo'];


		$image = Input::file('site_logo');
        if($image!="")
		{
            $settingphoto="/settings/";
			$delpath = base_path('images'.$settingphoto.$currentlogo);
			File::delete($delpath);
			$filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = base_path('images'.$settingphoto.$filename);
			$destinationPath=base_path('images'.$settingphoto);

                /*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/

				Input::file('site_logo')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentlogo;
		}




		$currentfav = $data['currentfav'];



		$images = Input::file('site_favicon');
        if($images!="")
		{
            $settingphotos="/settings/";
			$delpaths = base_path('images'.$settingphotos.$currentfav);
			File::delete($delpaths);
			$filenames  = time() . '.' . $images->getClientOriginalExtension();

            $paths = base_path('images'.$settingphotos.$filenames);
			$destinationPaths=base_path('images'.$settingphotos);

                Image::make($images->getRealPath())->resize(24, 24)->save($paths);

				/* Input::file('site_logo')->move($destinationPath, $filename);*/
				$savefav=$filenames;
		}
        else
		{
			$savefav=$currentfav;
		}






		$site_desc=$data['site_desc'];
		$site_keyword=$data['site_keyword'];


		if($data['site_desc']!="")
		{
			$desctxt=$site_desc;
		}
		else
		{
			$desctxt=$data['save_desc'];
		}


		if($data['site_keyword']!="")
		{
			$keytxt=$site_keyword;
		}
		else
		{
			$keytxt=$data['save_key'];
		}


		if($data['site_topmsg']!="")
		{
			$topmsg=$data['site_topmsg'];
		}
		else
		{
			$topmsg=$data['save_topmsg'];
		}







		$fb = $data['site_facebook'];

		if($data['site_facebook']!="")
		{
			$facebook = $fb;
		}
		else
		{
			$facebook = $data['save_facebook'];
		}

		$twi = $data['site_twitter'];

		if($data['site_twitter']!="")
		{
			$twitter = $twi;
		}
		else
		{
			$twitter = $data['save_twitter'];
		}




		$gpl = $data['site_gplus'];

		if($data['site_gplus']!="")
		{
			$gplus = $gpl;
		}
		else
		{
			$gplus = $data['save_gplus'];
		}







		$copys = $data['site_copyright'];

		if($data['site_copyright']!="")
		{
			$copyrights = $copys;
		}
		else
		{
			$copyrights = $data['save_copyright'];
		}




		$adheader = $data['site_header_ad'];

		if($data['site_header_ad']!="")
		{
			$headerad = htmlentities($data['site_header_ad']);

		}
		else
		{
			$headerad = htmlentities($data['save_header_ad']);
		}



		$adfooter = $data['site_footer_ad'];

		if($data['site_footer_ad']!="")
		{
			$footerad = htmlentities($data['site_footer_ad']);
		}
		else
		{
			$footerad = htmlentities($data['save_footer_ad']);
		}






		DB::update('update settings set site_name="'.$site_name.'",site_desc="'.$desctxt.'",site_topmsg="'.$topmsg.'",site_header_ad="'.$headerad.'",site_footer_ad="'.$footerad.'",site_keyword="'.$keytxt.'",
		site_facebook="'.$facebook.'",site_twitter="'.$twitter.'",site_gplus="'.$gplus.'",
		site_logo="'.$savefname.'",site_favicon="'.$savefav.'",site_copyright="'.$copyrights.'" where id = ?', [1]);

			return back()->with('success', 'Settings has been updated');


		}


    }
}
