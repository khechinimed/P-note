<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");

/*$ncounts = DB::table('users')->get();
		foreach($ncounts as $well)
		{
			$we = $well->id;
			$ewe = $well->email;
			DB::update('update shop set user_id="'.$we.'" where seller_email = ?', [$ewe]);
		}*/
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a href="<?php echo $url;?>/admin"><i class="fa fa-laptop"></i> Dashboard </a></li>
      <li><a href="<?php echo $url;?>/admin/pages"><i class="fa fa-sticky-note"></i> Pages </a></li>
      <li><a href="<?php echo $url;?>/admin/notes"><i class="fa fa-sticky-note"></i> Messages </a></li>
      <li><a href="<?php echo $url;?>/admin/settings"><i class="fa fa-cog"></i> Settings </a></li>
    </ul>
  </div>
</div>
