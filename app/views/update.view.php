<main class="register__container">
    <section class="register">

        <div class="title">
            <h1 class="title__main">Modificar contraseña</h1>
        </div>

        <form class="form" action="<?= URL ?>/login/updatepassword/<?= $data['data'] ?>" method="POST">
            <div class="form__inputContainer">
                <input type="password" name="password" class="form__input form-control " placeholder="Contraseña">
                <?php
                if (isset($data['errors'])) {
                    if (array_key_exists('password_error', $data['errors'])) { ?>
                        <span class="form__error">
                            <?= $data['errors']['password_error'] ?>
                        </span>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="form__inputContainer">
                <input type="password" name="confirm_password" class="form__input form-control "
                    placeholder="Confirmar contraseña">
                <?php
                if (isset($data['errors'])) {
                    if (array_key_exists('confirm_password', $data['errors'])) { ?>
                        <span class="form__error">
                            <?= $data['errors']['confirm_password'] ?>
                        </span>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="login__panel">
                <input type="hidden" name="id" value="<?php echo $data['data'] ?>">
                <button>Validar</button>
            </div>
        </form>
    </section>
</main>