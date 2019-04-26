@extends('layouts.app')
<?php

	use Illuminate\Support\Facades\Route;


$currentPaths= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
$setts = DB::table('settings')->where('id', '=', $setid)->get();

?>

@section('content')
  <h2>Hola amigos</h2>
@endsection
