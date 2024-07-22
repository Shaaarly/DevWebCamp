<h2 class="registro__heading"><?php $titulo; ?></h2>
<p class="registro__descripcion">Elige hasta 5 eventos para asistir de forma presencial</p>

<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h1 class="eventos__heading">&lt; Conferencias /></h1>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach($eventos['conferencias_v'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php } ?>
        </div>

    </main>
    <aside class="registro">
        <h2 class="registro__heading">Tu Registro</h2>
    </aside>
</div>