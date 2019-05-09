<?php $url = URL::to("/"); 
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>
<div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $url;?>" class="site_title" target="_blank"><i class="fa fa-globe"></i> <span><?php echo $setts[0]->site_name;?></span></a>
            </div>