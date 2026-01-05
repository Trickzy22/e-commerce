<h1>Inscription</h1>

<form method="POST" action="index.php?page=register_submit">
    <div class="form-group">
        <label for="name">Nom complet :</label>
        <input type="text" name="name" id="name" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>
    
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>
    
    <button type="submit" class="btn">Créer mon compte</button>
</form>

<p style="margin-top: 20px;">
    Déjà inscrit ? <a href="index.php?page=login">Se connecter</a>
</p>