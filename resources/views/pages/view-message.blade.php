<?php

use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");


function isValidMd5($md5 =''){
	return preg_match('/^[a-f0-9]{32}$/', $md5);
}

$uri = Request::url();
$clue = trim(str_replace("http://pnote.me/view-message/", "", $uri));

$token = $clue;
$key = $data["key"];


$password = $data["password"];


?>

@extends('layouts.app')
		@section('content')
    <div class="notes" style="height: 65vh;">
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

                        <h1>Contenu de la note.</h1>

                    </div>

                    <?php if(!empty($warning_one)){?>
                        <div class="col-md-12" align="center">
                            <div class="yelloo">Cette note a été détruite. Si vous deviez la garder, copiez-la avant de fermer cette fenêtre.</div>
                        </div>
                    <?php } ?>
                            <?php if(!empty($warning_two)){
																$datestr=$get_view[0]->note_end_date;

																$datetime1 = date_create('now');
																$datetime2 = date_create($datestr);
																$interval = date_diff($datetime1, $datetime2);

															?>
                                <?php if( isValidMd5($token) ){?>
                                    <div class="col-md-12" align="center">
                                        <div class="yelloo">La note sera détruite après
                                            <?php echo $interval->format('%a days %h hours %i min %s sec');?><br/>
                                            <?php echo $url;?>/message/<?php echo $key;?>
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

																				$aid=1;
																				$admindetails = DB::table('users')
																				 ->where('id', '=', $aid)
																				 ->first();

																				$admin_email = $admindetails->email;

																				$username = $getrec[0]->name;
																				$email_address = $getrec[0]->email;
																				$note_desc = $getrec[0]->note_desc;

																				$datas = [
																								'username' => $username, 'email_address' => $email_address,  'note_desc' => $note_desc, 'key' => $key ,'url' => $url
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

																				} }

																			?>

                                        <?php if( isValidMd5($token) ){?>
                                            <div class="col-md-12">
                                                <textarea class="form-control validate[required] text-input textarea_two" name="note_desc" id="i">
                                                    <?php echo $get_view[0]->note_desc;?>
                                                </textarea>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6 paddingoff span_half">
                                                    <button type="button" class="btn btn-default btn-lg radiusoff" onclick="sel('i')">Selectionner le texte</button>

                                                </div>
                                                <?php } else { ?>

                                                    <div class="col-md-12">
                                                        <h4>Identifiez vous pour voir la note <a href="<?php echo $url;?>/message/<?php echo $key;?>"><?php echo $url;?>/message/<?php echo $key;?></a></h4></div>
                                                    <div class="clearfix"></div>
                                                <?php } ?>

                                                        <?php if(!empty($warning_two)){?>
                                                            <?php if($token ==csrf_token()){?>
                                                                <div class="col-md-6 text-right paddingoff flots span_half">
                                                                    <a href="<?php echo $url;?>/view-message/<?php echo $key;?>/destroy" class="btn btn-danger btn-lg radiusoff">Détruire la note</a>
                                                                </div>
                                                                <?php } } ?>
                                            </div>

                                            <?php
																									}

																									else
																									{
																						?>
                                                <div class="col-md-12">
                                                    <h1>Note détruite</h1>
                                                </div>

                                                <div class="col-md-12" style="padding: 54px 0px;">
                                                    <h4>La note avec l'id <strong><?php echo $key;?></strong>  a étée lue et détruite</h4>
                                                    <h4>Si vous n'avez pas lu cette note, cela signifie que quelqu'un d'autre l'a fait . <br/>Si vous le lisez mais avez oublié de l'écrire, vous devez demander à celui qui l'a envoyé de le renvoyer.</h4>
                                                </div>
                                                <?php
																										}
																								?>
                                              	<?php
																								if($get==1){

																										DB::update('update notes set note_status="expired",note_read_status="read" where note_key = ?', [$key]);

																								}
																								if($check == 1){

																										DB::update('update notes set note_status="expired",note_read_status="read" where note_key = ?', [$key]);

																								}
																								?>

            </div>
        </div>
    </div>
    @endsection
