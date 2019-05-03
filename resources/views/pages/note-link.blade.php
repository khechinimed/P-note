@extends('layouts.app')
<?php

	use Illuminate\Support\Facades\Route;


$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");

?>

@section('content')
  <div class="notes">
    <div class="container">
      <div class="row">

      <div class="col-md-12">
        <h1>Le lien vers la note :</h1>
      </div>

        <div class="col-md-12">
        <div class="all-devices">
        <div class="text-right">
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#example-1" aria-expanded="false" aria-controls="multiCollapseExample2">
  					<i class="fa fa-question moverss" aria-hidden="true"></i>
  				</button>
        </div>
         <div id="example-1" class="panel panel-primary collapse">
          <div class="panel-body">
            <p>Copiez le lien, collez-le dans un e-mail ou bien envoyez ce lien directement par message au destinataire qui lira la note.</p>
          </div>
        </div>
        </div>

        <form id="formID">
        <div><textarea class="textarea_two" id="link" placeholder="Write your message here..." readonly><?php echo $url.'/message/'.$token;?></textarea></div>
        <div class="clearfix"></div>



        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-default btn-lg radiusoff mbottom" onclick="selectText()">Selectionner le lien</button>
        <a href="<?php echo $url;?>/message/<?php echo $token;?>" class="btn btn-danger btn-lg radiusoff float-right littlebit">Détruire la note maintenant</a>
        </div>





        </form>
        </div>

        </div>


    </div>
  </div>
@endsection
