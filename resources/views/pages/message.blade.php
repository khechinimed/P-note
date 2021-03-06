<?php

use Illuminate\Support\Facades\Route;

$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");

$key = $data["key"];
$password = DB::table('notes')->select('password')->where('note_key', '=', $key)->value('password');

?>

@extends('layouts.app')
@section('content')
<div class="notes" style="height: 65vh;">
	<div class="container">
  	<div class="row">
    	<div class="col-md-12">

      <div class="clearfix height30"></div>

        <?php
					 if(!empty($password)){
				?>
							<div class="col-md-12">
								<h1>Contenu de la note</h1>
							</div>

							<div class="all-devices">
			        <div class="text-right">
			          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#example-1" aria-expanded="false" aria-controls="multiCollapseExample2">
			  					<i class="fa fa-question moverss" aria-hidden="true"></i>
			  				</button>
			        </div>
			         <div id="example-1" class="panel panel-primary collapse">
			          <div class="panel-body">
			            <p>La note que vous essayez de lire a été chiffrée avec un mot de passe manuel. Si vous ne l'avez pas, demandé à celui qui a rédigé la note.</p>
			          </div>
			        </div>
			        </div>

          		<div class="row">
              	<div class="col-md-12">
                  @if(session()->has('error'))
                  	<div class="alert alert-danger">
                      {{ session()->get('error') }}
                    </div>
                	@endif
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('message') }}" id="formID" enctype="multipart/form-data">
                  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                	<div class="form-group col-xs-11 col-sm-6 col-md-6 col-lg-6" id="psw">
                    <label for="password">Entrez le mot de passe pour lire la note</label>
                    <input type="password" class="form-control text-input radiusoff" name="password" placeholder="Entrer le mot de passe" style="width: 75%;">
                    <input type="hidden" name="key" value="<?php echo $key;?>">

                    <button type="submit" class="btn btn-danger btn-lg radiusoff">Montrer la note</button>
                  </div>
                </form>

                <div class="height20"></div>
                </div>

          <?php
						}

					 if(empty($password)) { ?>

              <div class="col-md-12 paddingoff">
                <h1>Lire et détruire?</h1>
              </div>

              <div class="col-md-12 paddingoff" style="padding: 70px 0px;">
                <h4>Vous êtes sur le point de lire et de détruire la note avec l'identifiant <strong><?php echo $key;?></strong></h4>
              </div>

              <div class="col-md-12 paddingoff">
								<a href="<?php echo $url;?>/view-message/<?php echo $key;?>" class="btn btn-danger btn-lg radiusoff">Oui, montre moi la note</a>
                <a href="<?php echo $url;?>" class="btn btn-default btn-lg radiusoff">Non, pas maintenant</a>
              </div>

            <?php
				 		}
						?>

    	</div>
		</div>
	</div>
</div>
@endsection
