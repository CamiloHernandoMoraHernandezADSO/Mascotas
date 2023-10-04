
<main class="login">
    <form action="<?=URL?>/login/validate" method="post">
        <input type="text" name="email" placeholder="Correo Electrónico" required>
        <?php
            if (isset($data['errors'])) {
                if (array_key_exists('name_error', $data['errors'])) { ?>
                    <span class="login__error"><?= $data['errors']['name_error'] ?></span>
            <?php
                }
            }
            ?>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <?php
            if (isset($data['errors'])) {
                if (array_key_exists('clave_error', $data['errors'])) { ?>
                    <span class="login__error"><?= $data['errors']['clave_error'] ?></span>
            <?php
                }
            }
            ?>
        <button>Ingresar</button>
        <p class="pRegitrar">¿Aún no posee una cuenta?<a class="form__inputContainer--link" href="<?=URL?>/register">Regístrate </a></p>
        <p class="recover">¿Olvidó su contraseña?<a class="form__inputContainer--linkRecover" href="<?=URL?>/login/forget">Recuperar</a></p>
    </form>
</main>
