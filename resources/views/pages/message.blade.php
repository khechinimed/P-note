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
<div class="col-md-12">






<div class="clearfix height30"></div>





<?php if(!empty($key)){

	$current_date = date("Y-m-d H:i:s");
	$check = DB::table('notes')
			->where('note_key', '=', $key)
		 	->where('password', '!=', "")
			->where('note_status', '=', "available")
			->where('note_end_date', '>', $current_date)
			->count();

		 $checker = DB::table('notes')
			->where('note_key', '=', $key)
		 	->where('password', '=', "")
		 	->where('note_status', '=', "available")

		 ->count();

		 if($check==0 && $checker==0)
		 {
		 DB::update('update notes set note_status="expired",note_read_status="read" where note_key = ?', [$key]);

			?>

			 <div class="col-md-12 paddingoff">

<h1>Message destroyed</h1>

</div>

<div class="height20"></div>
<div class="col-md-12 paddingoff">

<h4>The message with id <strong><?php echo $key;?></strong> was read and destroyed</h4>
<h4>If you haven't read this message it means someone else has. <br/>If you read it but forgot to write it down, then you need to ask whoever sent it to re-send it.</h4>
</div>
			 <?php
		 }



		 if($check==1)
		 {
	?>
	<div class="row">

<div class="col-md-12">
<h1>Message contents</h1>






<div class="all-devices">
<div class="text-right justright10"><span data-toggle-target="#example-11" data-toggle-text"Read less"><i class="fa fa-question" aria-hidden="true"></i></span></div>
 <div id="example-11" class="panel panel-primary" style="display:none;">
	<div class="panel-body">
		<p>

The message you are trying to read was encrypted with a manual password. If you don't have it, ask the person who sent you the message about it.

</p>
	</div>
</div>
</div>







</div>

<div class="height20"></div>
<div class="col-md-12">
@if(session()->has('error'))
<div class="alert alert-danger">
		{{ session()->get('error') }}
</div>
@endif
</div>
<form class="form-horizontal" role="form" method="POST" action="{{ route('message') }}" id="formID" enctype="multipart/form-data">
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="form-group col-xs-11 col-sm-6 col-md-6 col-lg-6">
				<label for="password">Enter the password to read this message</label>
				<input type="password" class="form-control validate[required] text-input radiusoff" name="password"  placeholder="Enter the password">
	<div class="height10"></div>
	<input type="hidden" name="key" value="<?php echo $key;?>">
	<button type="submit" class="btn btn-danger btn-lg radiusoff">Proceed</button>
		</div>
</form>


<div class="height20"></div>
</div>

		 <?php }


		 if($checker==1) { ?>

<div class="col-md-12 paddingoff">

<h1>Read and destroy?</h1>

</div>

<div class="height20"></div>
<div class="col-md-12 paddingoff">

<h4>You're about to read and destroy the message with id <strong><?php echo $key;?></strong></h4>

</div>
<div class="height20"></div>
<div class="col-md-12 paddingoff">

<a href="<?php echo $url;?>/view-message/<?php echo $key;?>" class="btn btn-danger btn-lg radiusoff">Yes, show me the message</a>
<a href="<?php echo $url;?>" class="btn btn-default btn-lg radiusoff">No, not now</a>



</div>



		 <?php } } ?>


</div>
</div></div></div>
@endsection
