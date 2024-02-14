<?php 
session_start();

require_once '../models/usersModel.php';
require_once '../utils/regex.php';
require_once '../utils/messages.php';
require_once '../utils/functions.php';
require_once '../views/parts/header.php';

?>

<h1 class="compteH1"> Crédits : </h1> 
<div class="terms"><hr>

<div>
<p><b>Conception et Développement du Site :</b><br> EJMT</p>

<p><b>Graphisme et Design :</b><br> CSS, Fontawesome et Boostrap</p>

<p><b>Contenu Éditorial :</b><br> La MANU</p>

<p><b>Remerciements :</b><br> Nous remercions tous les membres pour leur participation active et leur contribution précieuse à notre communauté de manga qui rendent le forum plus emouvante et acceuillant pour les amateurs du manga.</p>

<p><b>Droits d'Auteur :</b><br> Tous les contenus protégés par des droits d'auteur utilisés sur ce site sont la propriété de leurs propriétaires respectifs. 
Les œuvres originales des membres sont la propriété de leurs auteurs.</p>

<br>
</div>

</div>

<?php

$title = 'Credits';

require_once '../views/parts/footer.php';
?>