
    <main class="show">
        <header>
            <h2>Consultar Mascota</h2>
            <a href="<?=URL."/admin"?>" class="back"></a>
            <a href="<?=URL."/admin/sessionClose"?>" class="close"></a>
        </header>
        <figure class="photo-preview">
            <img src="<?=URL."/".$data['mascotas']["photo"]?>" alt="">
        </figure>
        <div>
            <article class="info-name"><p><?=$data['mascotas']['name']?></p></article>
            <article class="info-race"><p><?=$data['mascotas']['race']?></p></article>
            <article class="info-category"><p><?=$data['mascotas']['category']?></p></article>
            <article class="info-gender"><p><?=$data['mascotas']['gender']?></p></article>
        </div>
    </main>
