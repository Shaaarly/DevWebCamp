<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Europa</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp" loading="lazy" width="200" height="300">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion(); ?> class="devwebcamp__texto"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lacus est, volutpat sit amet efficitur quis, sollicitudin non lorem. Vestibulum orci felis, sagittis vel lacus quis, pellentesque pretium diam. Duis bibendum pharetra aliquet.</p>
            <p <?php aos_animacion(); ?> class="devwebcamp__texto">Morbi dui tellus, placerat a ultrices eget, volutpat quis felis. In vulputate luctus ex, sed elementum nisl dignissim non. Donec suscipit ipsum eu varius cursus.  Mauris a congue est, sit amet mollis sem. Nullam vel lacinia eros. Mauris a nunc posuere, luctus metus in, ornare arcu. Nunc semper scelerisque nisl, lobortis varius sapien venenatis nec. Nunc imperdiet risus vel lorem pulvinar elementum. Aliquam sed malesuada mauris.</p>
        </div>
    </div>
</main>