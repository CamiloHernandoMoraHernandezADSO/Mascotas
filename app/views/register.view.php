<main class="register__container">

    <section class="register">

        <div class="title">
            <h1 class="title__main">Tu mejor amigo <span class="title__second">en casa!</span></h1>
        </div>

        <form id="form" class="form" method="POST" action="<?= URL ?>/register/validate">
            <div class="form__inputContainer">
                <input placeholder="Nombre Completo" id="name" type="text" class="form__input form-control " name="name" value=""  autocomplete="name" autofocus="">
                <?php
                if (isset($data['errors'])) {
                    if (array_key_exists('name_error', $data['errors'])) { ?>
                        <span class="login__error"><?= $data['errors']['name_error'] ?></span>
                <?php
                    }
                }
                ?>
            </div>

            <div class="form__inputContainer">
                <input placeholder="Correo Electrónico" id="email" type="text" class="form__input form-control " name="email" value=""  autocomplete="email">
                <?php
                if (isset($data['errors'])) {
                    if (array_key_exists('mail_error', $data['errors'])) { ?>
                        <span class="login__error"><?= $data['errors']['mail_error'] ?></span>
                <?php
                    }
                }
                ?>
            </div>

            <div class="form__inputContainer">
                <input placeholder="Contraseña" id="password" type="password" class="form__input form-control " name="password"  autocomplete="new-password">
                <?php
                if (isset($data['errors'])) {
                    if (array_key_exists('pass_error', $data['errors'])) { ?>
                        <span class="login__error"><?= $data['errors']['pass_error'] ?></span>
                <?php
                    }
                }
                ?>
            </div>

            <div class="form__inputContainer">
                <input placeholder="Confirmar Contraseña" id="password-confirm" type="password" class="form__input form-control" name="password_confirmation"  autocomplete="new-password">
                <?php
                if (isset($data['errors'])) {
                    if (array_key_exists('confirm_error', $data['errors'])) { ?>
                        <span class="login__error"><?= $data['errors']['confirm_error'] ?></span>
                <?php
                    }
                }
                ?>
            </div>

            <div class="form__inputContainer">
                <button id="btnRegistrar" type="submit" class="form__input form__button">Register</button>
            </div>

            <div class="form__inputContainer">
                <p class="form__inputContainer--text">¿Ya posee una cuenta? <a class="form__inputContainer--link" href="<?= URL ?>/login">Inicia Sesión</a> </p>
            </div>

        </form>

    </section>

</main>