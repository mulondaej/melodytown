<?php 

require_once '../models/contactModel.php';
require_once '../views/parts/header.php';

$contact = new Contact;
$contactList = $contact->getList();
$latestContact = $contact->getMessage();
$contactCount = count($contactList);

?>

<main class="topics">
    <h1>Liste de Topics </h1><hr>
    <p><b>Total nombre de Threads :</b> <?= $contactCount ?></p>
    
    <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        
    <div class="topicsContainer">
        
        <?php foreach($contactList as $c) { ?>
        <div class="topic">
            <div class="topicBottom">
                <h2><b>Titre:</b> <?= $c->subject ?> <br></h2>
                <p>
                    <b>Ecrit par:</b> <?= $c->username ?> <br>
                    <b>Publié:</b> <?= $c->publicationDate ?> <br>
                </p><b>content:</b>
                <p class="/topic-<?= $c->id ?>"><?= strip_tags($c->message) ?><br>
                </p>
                <a href="/topic-<?= $c->id ?>" class="cta">Lire la suite</a><br>
                
            </div>
        </div>
        <?php } ?>

    </div>
</main>

<?php
require_once '../views/parts/footer.php';
 ?>