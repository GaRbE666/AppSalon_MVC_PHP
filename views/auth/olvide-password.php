<h1 class="nombre-pagina">Olvid&eacute; Password</h1>
<p class="descirpcion-pagina">Restablece tu password escribiendo tu email a continuaci&oacute;n</p>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form class="formulario" action="/olvide" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu email">
    </div>

    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesi&oacute;n</a>
    <a href="/crear-cuenta">¿A&uacute;n no tienes una cuenta? Crea una</a>
</div>