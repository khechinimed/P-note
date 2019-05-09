<?php
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		?>
<title><?php echo $setts[0]->site_name;?></title>