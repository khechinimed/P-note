<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");

$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>

@section('content')
<div class="notes">
<div class="container">
<div class="row">





<?php
$current_date = date("Y-m-d H:i:s");

$warning_one = DB::table('notes')
					 ->where('note_key', '=', $key)
					 ->where('note_status', '=', "available")
					 ->where('note_duration', '=', "0")
					 ->count();

$warning_two = DB::table('notes')
					 ->where('note_key', '=', $key)
					 ->where('password', '!=', "")
					 ->where('note_status', '=', "available")
					 ->where('note_end_date', '>', $current_date)
					 ->count();

$get_view_count = DB::table('notes')
					 ->where('note_key', '=', $key)
					 ->where('note_status', '=', "available")
					 ->count();
if(!empty($get_view_count))
{
$get_view = DB::table('notes')
					 ->where('note_key', '=', $key)
					 ->where('note_status', '=', "available")
					 ->get();

}
else

{
	$get_view = "";
}


	$get = DB::table('notes')
					 ->where('note_key', '=', $key)
					 ->where('note_visibile_count', '=', '1')
					->where('note_status', '=', "available")
					->where('note_read_status', '=', "unread")
					->count();

	$check = DB::table('notes')
			 ->where('note_key', '=', $key)
		 ->where('password', '!=', "")
			->where('note_status', '=', "available")
		->where('note_end_date', '<', $current_date)
		 ->count();


if(!empty($get_view)){
	?>
<div class="col-md-12">

<h1>Message contents</h1>

</div>
<div class="clearfix height30"></div>
<?php if(!empty($warning_one)){?>
<div class="col-md-12" align="center">
<div class="yelloo">This message was destroyed. If you need to keep it, copy it before closing this window.</div>
</div>
<?php } ?>
<?php if(!empty($warning_two)){
$datestr=$get_view[0]->note_end_date;


$datetime1 = date_create('now');
$datetime2 = date_create($datestr);
$interval = date_diff($datetime1, $datetime2);


?>
<?php if($token ==csrf_token()){?>
<div class="col-md-12" align="center">
<div class="yelloo">This message will self-destruct in <?php echo $interval->format('%a days %h hours %i min %s sec');?>
<br/><?php echo $url;?>/message/<?php echo $key;?>
</div>
</div>
<?php





$getrec = DB::table('notes')
					 ->where('note_key', '=', $key)
							 ->where('note_status', '=', "available")
					 ->where('note_read_status', '=', "unread")
					 ->get();

		$setid=1;
$setts = DB::table('settings')
->where('id', '=', $setid)
->get();

$url = URL::to("/");

$site_logo=$url.'/local/images/settings/'.$setts[0]->site_logo;

$site_name = $setts[0]->site_name;


$aid=1;
$admindetails = DB::table('users')
 ->where('id', '=', $aid)
 ->first();

$admin_email = $admindetails->email;

$username = $getrec[0]->name;
$email_address = $getrec[0]->email;
$note_desc = $getrec[0]->note_desc;



$datas = [
				'username' => $username, 'email_address' => $email_address,  'note_desc' => $note_desc, 'key' => $key ,'url' => $url , 'site_logo' => $site_logo, 'site_name' => $site_name
		];

if($getrec[0]->mail_send==0)
{

Mail::send('note_email', $datas , function ($message) use ($admin_email,$username,$email_address)

		{
				$message->subject('Your message is read');

				$message->from($admin_email, 'Admin');

				$message->to($email_address);

		});


DB::update('update notes set mail_send="1" where note_key = ?', [$key]);

}













} } ?>

<?php if($token ==csrf_token()){?>
<div class="col-md-12">
<textarea  class="form-control validate[required] text-input textarea_two" name="note_desc" id="i"><?php echo $get_view[0]->note_desc;?></textarea>
<div class="clearfix"></div>
<div class="col-md-6 paddingoff span_half">
<button type="button" class="btn btn-default btn-lg radiusoff" onclick="sel('i')">Select Text</button>




</div>
<?php } else { ?>

<div class="col-md-12"><h4>Please login to view messages <a href="<?php echo $url;?>/message/<?php echo $key;?>"><?php echo $url;?>/message/<?php echo $key;?></a></h4></div>
<div class="clearfix"></div>
<?php } ?>

<?php if(!empty($warning_two)){?>
<?php if($token ==csrf_token()){?>
<div class="col-md-6 text-right paddingoff flots span_half">
<a href="<?php echo $url;?>/view-message/<?php echo $key;?>/destroy" class="btn btn-danger btn-lg radiusoff">Destroy message now</a>
</div>
<?php } } ?>
</div>

<?php
}
else
{
?>
<div class="col-md-12">

<h1>Message destroyed</h1>

</div>
<div class="height20"></div>
<div class="col-md-12">

<h4>The message with id <strong><?php echo $key;?></strong> was read and destroyed</h4>
<h4>If you haven't read this message it means someone else has. <br/>If you read it but forgot to write it down, then you need to ask whoever sent it to re-send it.</h4>
</div>
<?php
}
?>
<?php
if($get==1)
				{


		DB::update('update notes set note_status="expired",note_read_status="read" where note_key = ?', [$key]);

	}
				if($check == 1)
				{




		DB::update('update notes set note_status="expired",note_read_status="read" where note_key = ?', [$key]);






				}
	?>

</div></div></div>
@endsection
