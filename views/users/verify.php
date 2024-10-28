<div id="main" style="background-color:white; height:100%">

<form action="/accueil" method="POST" id="logForm">
    <label for="verified">Verification</label>
    <input type="hidden" name="verified" id="verified" value="1"> <!-- Set a value like "1" if verified -->
    
    <?php if (isset($errors['update'])): ?>
        <p class="errorsMessage"><?= htmlspecialchars($errors['update']) ?></p>
    <?php endif; ?><br>

    <!-- <input type="hidden" name="token" id="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">  -->

    <input type="submit" name="updateVerified" value="Vérifier">
</form>

</div>


<?

?>