<?php 
session_start();

require_once '../models/users/usersModel.php';
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';
require_once '../views/parts/header.php';

?>

<h1 class="compteH1">Les règles à respecter : </h1> 
<div class="terms"><hr>
<div>
<p><b>Le Respect Mutuel :</b> <br>Tous les membres doivent se traiter avec respect, courtoisie et tolérance, quelles que soient leurs differents opinions.</p>

<p><b>Sujets Appropriés :</b> <br>Assurez-vous de publier vos discussions dans les sections appropriées du forum. Les sujets hors-sujet seront déplacés ou supprimés par les modérateurs.</p>

<p><b>Contenus Appropriés :</b> <br>Touts contenus partagés doivent être appropriés pour tous les âges et conformes aux lois en vigueur. Les contenus offensants, pornographiques, discriminatoires ou violents ne seront pas tolérés.</p>

<p><b>Pas de Spoilers :</b> <br>Lorsque vous discutez de chapitres récents, veillez à utiliser la balise spoiler pour éviter de gâcher l'expérience des autres membres qui n'ont pas encore lu l'œuvre en question.</p>

<p><b>Interdiction de Spam :</b> <br>Touts messages, promotions et publications execessives ne sont pas autorisés et vous risquerez un ban.</p>

<p><b>Langage :</b> <br>Utilisez un langage clair et essayez de rester grammatique pour faciliter la compréhension des discussions.</p>

<p><b>Non au Plagiat :</b> <br>Partagez les données avec mentions de sources SVP si ce ne sont pas des contenus originaux. Le plagiat est strictement interdit.</p>

<p><b>La Modération :</b> <br>Les modérateurs decident le sort. Veuillez contacter un modérateur au cas de conflict pour une résolution appropriée.</p>

<p><b>Protection des Données :</b> <br>Ne partagez jamais les informations personnelles sensibles sur le forum car chez nous, la confidentialité et la sécurité des membres sont importantes.</p>

<p><b>Signalement des Violations :</b> <br>Veuillez signaler aux modérateurs si vous remarquez une violation des règles SVP, merci !</p>
<br>
</div>

</div>

<?php
$title = 'Rules';

require_once '../views/parts/footer.php';
?>