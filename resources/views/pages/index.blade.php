@extends('layouts.app')

@section('content')
<section id="home" class="main-home parallax-section">
     <div class="overlay"></div>
     <div id="particles-js"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <h1 id="fit1"><span class="typeme"></span></h1>
                    <h1 id="fit2"><span class="typeme2"></span></h1>
                    <a href="/create" class="btn btn-default">Créer une note</a>
                    <i id="more" class="fas fa-angle-double-down"></i>
               </div>
          </div>
       </div>
</section>

<section id="features">
        <div class="container">
            <div class="row center-xs center-sm center-md center-lg">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h2>Caracteristiques</h2>
                    <p>Ce qui est inclu</p>
                    <!--ICON ROW I-->
                    <div class="row center-xs center-sm center-md center-lg">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <i class="fas fa-address-card"></i>
                            <h4>Sans compte</h4>
                            <p>Facilité d'utilisation, pour vous faire gagner du temps.</p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <i class="fas fa-user-secret"></i>
                            <h4>Protection</h4>
                            <p>Avant d'enregistrer vos notes, votre code est traduit en une version chiffrée, et crypté par un mot de passe.</p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <i class="fas fa-trash-alt"></i>
                            <h4>Autodestruction</h4>
                            <p>Autodestruction après une seule lecture de votre note.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="howTo">
      <div class="">
        <div class="text">
          <p>
            Avec Pnote<br>
            vous pouvez envoyer des notes qui s'autodestruisent après lecture .<br>
          </p>
          <p>
            -Ecrivez votre notre, spécifiez un mot de passe<br>
            -Vous obtiendrez un lien vers votre notre <br>
            -Envoyez le lien à votre correspondant <br>
            -La note se détruira après que le destinataire l'ai lue <br>
          </p>
          <p>
            -En cliquant sur options, vous pouvez définir une <br>
            date d'expiration, ou être notifié lorsque la note sera détruite
          </p>
        </div>
      </div>
    </section>
    <input type="text" id="password" name="password" style="display:none;">
    <input type="text" id="cpassword" name="password" style="display:none;">
@endsection
