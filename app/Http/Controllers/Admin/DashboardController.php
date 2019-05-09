<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
/*use App\Article;
use App\ArticleCategory;
use App\User;
use App\Photo;
use App\PhotoAlbum;*/
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
    }

	  public function index()
	  {
        $title = "Dashboard";

		    $total_notes = DB::table('notes')->count();

			  $notes_read = DB::table('notes')->where('note_read_status', '=', 'read')->count();



			  $notes_unread = DB::table('notes')
			               ->where('note_read_status', '=', 'unread')
			               ->count();




         $notes = DB::table('notes')
	              ->orderBy('id', 'DESC')
			          ->take(5)
			          ->get();

      		$users = DB::table('users')
      		      ->orderBy('id','desc')
      				  ->limit(4)->offset(0)
      				  ->get();



		/*$data = array('total_seller' => $total_seller, 'total_user' => $total_user, 'total_customer' => $total_customer, 'total_booking' => $total_booking,
		'today_booking' => $today_booking, 'total_shop' =>  $total_shop, 'javas' => $javas, 'booking' => $booking, 'setting' => $setting, 'users' => $users,
		'testimonials' => $testimonials);
		return view('admin.index')->with($data);
		*/
		$data =  array('total_notes' => $total_notes, 'notes_read' => $notes_read, 'notes_unread' => $notes_unread, 'notes' => $notes, 'users' => $users);
		return view('admin.index')->with($data);




	}
}
