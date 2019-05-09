@extends('layouts.app')
<?php

	use Illuminate\Support\Facades\Route;


$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
$setts = DB::table('settings')->where('id', '=', $setid)->get();

?>

@section('content')
<div class="notes">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<div class="all-devices">
			<div class="text-left"><h1>Nouvelle note</h1></div>
			<div class="text-right">
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#example-1" aria-expanded="false" aria-controls="multiCollapseExample2">
					<i class="fa fa-question moverss" aria-hidden="true"></i>
				</button>
			</div>
			 <div id="example-1" class="panel panel-primary collapse">
				<div class="panel-body">
					<p>
						<strong>Avec Privnote vous pouvez envoyer des notes qui s'autodétruisent après lecture.</strong><br/>
							1. Écrivez votre note .<br/>
							2. Spécifiez un mot de passe manuel pour chiffrer la note .s<br/>
							3. Vous obtiendrez un lien vers la note.<br/>
							4. Envoyez le lien à votre correspondant.<br/>
							5. La note se détruira après que le destinataire l'ai lue.<br/><br/>

							En cliquant sur Options, vous pouvez définir une date d'expiration, ou être notifié lorsque la note sera détruite.<br/>
					</p>
				</div>
			</div>
			</div>

			<form class="form-horizontal" role="form" method="POST" action="{{ route('note-link') }}" id="formID" enctype="multipart/form-data">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div>
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<textarea placeholder="Écrivez votre note ici..." class="form-control text-input textarea" id="note_desc" name="note_desc" required></textarea>

					<label for="custom password">Entrez un mot de passe pour chiffrer la note.</label>
					<input type="password" class="text-input radiusoff form-control" name="password" id="password"  placeholder="Entrez mot de passe" required>

					<label for="confirm password">Verifiez votre mot de passe</label>
					<input type="password" class="text-input radiusoff form-control" name="cpassword" id="cpassword"  placeholder="Confirmez mot de passe" required>

				</div>
				<div class="clearfix"></div>
				<div class="all-devices">
				<div id="example-2" class="collapse">
					<div class="row">

					<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label for="self destructs">La note s'autodétruit</label>
							<select id="duration_hours" name="duration_hours" class="form-control radiusoff">
								<option value="0">Après lecture</option>
								<option value="1">Après 1 heure</option>
								<option value="24">Après 24 heures</option>
								<option value="168">Après 7 jours</option>
								<option value="720">Après 30 jours</option>
							</select>
					</div>

					<input type="hidden" name="duration" value="0">
							<div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<label for="reference email">Notification par e-mail lorsque la note sera détruite.</label>
									<input type="text"  class="form-control validate[required,custom[email]] text-input radiusoff" name="email"  placeholder="Email">
							</div>

							 <div class="form-group col-xs-12  col-sm-6 col-md-6 col-lg-6">
									<label for="reference name">Nom de la référence de la note (optionnel)</label>
									<input type="text" class="form-control radiusoff" name="name" placeholder="Nom">
							</div>
					</div>
				</div>

				</div>


				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 auto_adjust" id="save_note">
						<button type="submit" class="btn btn-danger btn-lg radiusoff" name="submit_note" id="walou">Enregistrer la note</button>
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#example-2" aria-expanded="false" aria-controls="multiCollapseExample2">Montrer / Masquer Options</button>
				</div>

			</form>
			</div>








			</div>


	</div>
</div>
@endsection
