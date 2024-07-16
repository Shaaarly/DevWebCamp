<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo paginaActual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house"></i>
            <span class="dashboard__menu-texto dashboard__icono">Inicio</span>
        </a>

        <a href="/admin/ponentes" class="dashboard__enlace <?php echo paginaActual('/ponentes') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-microphone"></i>
            <span class="dashboard__menu-texto dashboard__icono">Ponentes</span>
        </a>

        <a href="/admin/eventos" class="dashboard__enlace <?php echo paginaActual('/eventos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-calendar"></i>
            <span class="dashboard__menu-texto dashboard__icono">Eventos</span>
        </a>

        <a href="/admin/registrados" class="dashboard__enlace <?php echo paginaActual('/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-users"></i>
            <span class="dashboard__menu-texto dashboard__icono">Registrados</span>
        </a>

        <a href="/admin/regalos" class="dashboard__enlace <?php echo paginaActual('/regalos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-gift"></i>
            <span class="dashboard__menu-texto dashboard__icono">Regalos</span>
        </a>
    </nav>
</aside> 