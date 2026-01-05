<h1>Connexion</h1>

<form method="POST" action="index.php?page=login_submit">
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit" class="btn">Se connecter</button>
</form>

<p style="margin-top: 20px;">Pas encore de compte ? <a href="index.php?page=register">S'inscrire ici</a></p>