<main class="register__container">

    <section class="register">

        <div class="title">
            <h1 class="title__main">Recuperar contraseña</h1>
        </div>

        <form class="form" method="POST" action="<?= URL ?>/login/sendEmail">

            <div class="form__inputContainer">
                <input placeholder="Ingrese el correo asociado" name="email" type="text"
                    class="form__input form-control " value="" autofocus="">
                <?php
                if (empty($_POST['email'])) {
                    if (isset($data['errors'])) {
                        if (array_key_exists('email_empty', $data['errors'])) { ?>
                            <span class="login__error">
                                <?= $data['errors']['email_empty'] ?>
                            </span>
                            <?php
                        }
                    } 
                }else {
                    ?>
                    <?php
                    if (isset($data['errors'])) {
                        if (array_key_exists('email_error', $data['errors'])) { ?>
                            <span class="login__error">
                                <?= $data['errors']['email_error'] ?>
                            </span>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <button>Enviar</button>
        </form>

    </section>

</main>