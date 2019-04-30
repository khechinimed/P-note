<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Responsive\Url;

class NoteController extends Controller
{
    public function linkview(){

      return view('pages.note-link');

    }

    public function hide_notes($key)
  	{
  	    $data = array('key' => $key);
  		return view('pages.message')->with($data);

  	}


  	public function view_notes()
  	{

              return view('pages.message');
  	}


  	public function destroy_notes($key,$destroy)
  	{

  	   DB::update('update notes set note_status="expired",note_read_status="read" where note_key = ?', [$key]);
  	   return view('pages.note');
  	}


  	public function notes($key)
  	{

  			$token=csrf_token();
  			$access="";
  				$data = array('key' => $key, 'access' => $access, 'token' => $token);
  				return view('pages.view-message')->with($data);


  	}


  	public function another_notes($key,$access,$token)
  	{

  		$data = array('key' => $key, 'access' => $access, 'token' => $token);
  				return view('pages.view-message')->with($data);
  	}

  	/*public function destroy_notes($id,$destroy)
  	{
  	   DB::delete('delete from notes where id = ?',[$id]);
  	}*/


  	protected function hidden_form(Request $request)
      {
  			$data = $request->all();
  			$password = $data['password'];
  			$key = $data['key'];
  			$token = $data['_token'];
  			$check_pass = DB::table('notes')
  						   ->where('note_key', '=', $key)
  						   ->where('password', '=', $password)
  							 ->where('note_status', '=', "available")
  						   ->count();
  			if($check_pass==1)
              {
  				/*$data = array('key' => $key);
  				return view('view-message')->with($data);*/

  				$urls = '/view-message/' . $key.'/access/'.$token;
  				return redirect($urls);
  			}
  	        else if($check_pass==0)
  			{
  				$urls = '/message/' . $key;

  				return redirect($urls)->with('error', 'Invalid Password Or Notes Destroy');

  			}


  	}

    protected function linkview_form(Request $request){

      $validation = $request->validate([
        'note_desc' => 'required',
        'password'  => 'required | min:6 | max:10 ',
        'cpassword' => 'required | same:password',
      ]);

      // $inputs = $request->all();
      // $validation = Validator::make($inputs, $validation);
      //
      // if($validation->fails()){
      //   return Response::json([
      //     'error' => true,
      //     'message' => $validation->message(),
      //     'code' => 400
      //   ], 400);
      // }


  	  $data = $request->all();
  		$note_desc=$data['note_desc'];
  		$note_duration=$data['duration_hours'];

  		$token = uniqid();

  		if(!empty($note_duration))
  		{
  			$duration = $note_duration;

  					if($note_duration==0)
  				{
  					$visible_cnt = 1;
  					$start_date = date("Y-m-d H:i:s");
  					$end_date = date("Y-m-d H:i:s");
  				}
  				else if($note_duration==1)
  				{
  				$start_date = date("Y-m-d H:i:s");
  				$end_date  = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($start_date)));
  				$visible_cnt ="";

  				}
  				else if($note_duration==24)
  				{
  				$start_date = date("Y-m-d H:i:s");
  				$end_date  = date('Y-m-d H:i:s',strtotime('+1 day',strtotime($start_date)));
  				$visible_cnt ="";

  				}
  				else if($note_duration==168)
  				{
  				$start_date = date("Y-m-d H:i:s");
  				$end_date  = date('Y-m-d H:i:s',strtotime('+1 week',strtotime($start_date)));
  				$visible_cnt ="";

  				}

  				else if($note_duration==720)
  				{
  				$start_date = date("Y-m-d H:i:s");
  				$end_date  = date('Y-m-d H:i:s',strtotime('+1 month',strtotime($start_date)));
  				$visible_cnt ="";

  				}


  		}
  		else
  		{
  			$duration = $data['duration'];
  			$visible_cnt = 1;
  					$start_date = date("Y-m-d H:i:s");
  					$end_date = date("Y-m-d H:i:s");
  		}



  		$read_status = "unread";

  		$pass = $data['password'];
  		if(!empty($pass))
  		{
  			$password = $pass;
  		}
  		else
  		{
  			$password = "";
  		}

  		$email = $data['email'];
  		if(!empty($email))
  		{
  			$email_address = $email;
  		}
  		else
  		{
  			$email_address = "";
  		}


  		$name = $data['name'];
  		if(!empty($name))
  		{
  			$username = $name;
  		}
  		else
  		{
  			$username = "";
  		}

  		$note_status = "available";

  		$today_date = date("Y-m-d H:i:s");








  		DB::insert('insert into notes (	note_key, note_desc, note_duration, note_visibile_count, note_start_date, note_end_date, note_read_status, password,
  		email, name, submit_date, note_status) values (?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?)', [$token, $note_desc,$note_duration,$visible_cnt,$start_date,
  		$end_date,$read_status,$password,$email_address,$username,$today_date,$note_status]);

  		$data = array('token' => $token);
              return view('pages.note-link')->with($data);

  	}
}
