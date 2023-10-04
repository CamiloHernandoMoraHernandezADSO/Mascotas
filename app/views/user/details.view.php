<main>

  <section class="sectionDetails">

    <div class="sectionDetails__superior">


      <div class="superior__buttons">
        <header>
          <a href="<?=URL."/admin"?>" class="back"></a>
          <a href="<?=URL."/admin/sessionClose"?>" class="close"></a>
        </header>
        <!-- <img src="{{ asset('images-frontEnd/heart-white.svg') }}" alt=""> -->
      </div>

      <div class="superior__image">
        <img class="superior__image--img" src="<?=URL."/".$data["mascotas"]["photo"]?>" alt="Foto de la mascota">
      </div>


      <div class="superior__descripcion">
        <div class="descripcion__desc">
          <p>Edad</p>
          <span>1 año</span>
        </div>
        <div class="descripcion__desc">
          <p>Largo</p>
          <span>5-6</span>
        </div>
        <div class="descripcion__desc">
          <p>Categoria</p>
          <span><?=$data["mascotas"]["category"]?></span>
        </div>
        <div class="descripcion__desc">
          <p>Genero</p>
          <span><?=$data["mascotas"]["gender"]?></span>
        </div>
      </div>

    </div>


    <div class="sectionDetails__inferior">

      <div class="inferior__detallesMascota">
        <div>
          <p></p>
          <span></span>
        </div>
        <p>$200</p>
      </div>

      
      <div class="inferior__detallesAdoptador">
        <img class="inferior__detallesAdoptador--img" src="{{ asset('images-frontEnd/rodolfo.png') }}" alt="">
        <div>
          <p>Rodolfo Lopez</p>
          <span>Dueño - Medellín Colombia</span>
        </div>
      </div>

      <div class="inferior__button">
        <a class="inferior__button--btn" href="#">Llevar a casa</a>
      </div>

    </div>

  </section>

</main>
