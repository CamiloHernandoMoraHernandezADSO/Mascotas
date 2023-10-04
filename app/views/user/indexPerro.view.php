<main>

    <section class="container second__container">

        <div class="headerTitle">
        <a  class="close"></a>
            <a class="headerTitle__link" href="<?=URL."/admin/sessionClose"?>"><img src="assets/images/btn-close.svg" alt=""></a>
            <h1>Buscar</h1>
        </div>

        <div class="barSearch">
            <img class="barSearch__image" src="assets/images/search.svg" alt="">
            <input class="barSearch__input" type="search">
        </div>

        <div class="category">
            <a href="<?=URL?>/user" class="category__animal">
                <img class="category__animal--image" src="assets/images/fa-solid_dog.svg" alt="">
                <p class="category__animal--text">Perros</p>
            </a>
            <a href="<?=URL?>/user/gato" class="category__animal category__animal--mod">
                <img class="category__animal--image" src="assets/images/fa-solid_cat.svg" alt="">
                <p class="category__animal--text">Gatos</p>
            </a>
        </div>

        <div class="container__cards">

            <?php

            if (isset($data['mascotas'])) {
                foreach ($data['mascotas'] as $value) {
            ?>
                    <div class="card__animal">
                    <a href="<?=URL."/user/details/".$value["id"]?>" class="a">
                            <div class="animal__photo">
                                <img class="animal__photo--image" src="<?= $value["photo"] ?>" alt="">
                            </div>
                            <div class="animal__info">
                                <h2 class="animal__info--name"><?= $value["name"] ?></h2>
                                <p class="animal__info--race"><?= $value["race"] ?></p>
                                <div class="animal__info--extra">
                                    <span class="animal__info--price">$0</span>
                                    <img class="animal__info--image" src="assets/images/sm-heart.svg" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
        </div>

    </section>

</main>

