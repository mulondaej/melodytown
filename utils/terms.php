<?php 
session_start();

require_once '../models/users/usersModel.php';
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';
require_once '../views/parts/header.php';

?>

<!-- les termes et conditions du forum -->
<h1 class="compteH1">Les Termes et Conditions : </h1> 
<div class="terms"><hr>

<div>
<p><b>Les Conditions Générales :</b> <br>Les présentes Conditions générales  régissent l'accès et l'utilisation du forum de manga. En accédant à ce forum et en l'utilisant, vous entrez dans l'accord avec ces conditions. 
Lisew attentivement les termes avant de vous inscrire ou y rester dans ce forum.</p>

<p><b>Cookies :</b> <br>Le site utilise des cookies pour amélioration de l'expérience de navigation des utilisateurs. 
Ces cookies sont de petits fichiers texte placés sur votre appareil pour collecter des infos standard de journal Internet et des infoss comportementales. 
Votre consentement à notre utilisation de cookies est accordé en continuant à utiliser notre site.</p>

<p><b>La Protection des vos Données Personnelles :</b> <br>Nous prenons avec serieux la protection des données personnelles de nos utilisateurs. 
Nous ne recueillons que les informations nécessaires pour le bon fonctionnement du forum et nous ne partageons pas cela avec des tiers sans votre consentement. 
Pour plus d'informations sur la traite de vos données, veuillez consulter notre Politique de Confidentialité.</p>


<br>
</div>

</div>
<?php 

$title = 'Terms'; 

require_once '../views/parts/footer.php';
?>