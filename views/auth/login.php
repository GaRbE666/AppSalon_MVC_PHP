<h1 calss="nombre-pagina">login</h1>
<p class="descripcion-pagina"> Inicia sesi&oacute;n con tus datos</p>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Tu Email" name="email"/>
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Tu Password" name="password"/>
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a href="/crear-cuenta">¿A&uacute;n no tienes una cuenta? Crea una</a>
    <a href="/olvide">¿Olvidate tu password?</a>
</div>