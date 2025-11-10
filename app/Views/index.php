<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Explora el Náhuatl – Plataforma</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <script type="module">
    import { smoothAnchors } from './assets/js/common.js';
    smoothAnchors();
  </script>
</head>
<body>
  <div class="topbar">
    <div class="container inner">
      <img src="assets/imgs/Logo UPN.png" alt="Logo UPN" class="logo-upn" />
      <strong>Explora el Náhuatl</strong>
      <img src="assets/imgs/lengua.png" alt="Logo UPN" class="logo-upn" />
      <div style="flex:1"></div>
      <nav><a href="#presentacion">Presentación</a>
      <a href="#modulos">Módulos</a><a href="#contacto">Contacto</a>
      <?php if (session()->has('isLoggedIn')): ?>
      <a href="<?php echo base_url(route_to('logout')) ?>">Cerrar sesión</a>
       <?php else: ?>
      <a href="<?php echo base_url(route_to('login')) ?>">Iniciar sesión</a>
      <?php endif; ?>
    </nav>
    </div>
  </div>

  <section class="hero" id="inicio">
    <img src="assets/imgs/lengua.png" alt="Mariana la Cubana" class="hero-lengua" />
  <img src="assets/imgs/Mariana la Cubana.png" alt="Mariana la Cubana" class="hero-mariana" />
    <div class="container content">
      <h1>Plataforma de Actividades para la Enseñanza del Náhuatl</h1>
      <p>Recursos, actividades y materiales para fortalecer la lengua y cultura náhuatl.</p>
      <div style="margin-top:12px; display:flex; gap:12px">
        <a class="btn primary" href="#modulos">Explorar módulos</a>
        <a class="btn" href="#presentacion">Leer presentación</a>
      </div>
    </div>
  </section>

  <section class="section" id="presentacion">
    <div class="container">
      <h2>Presentación</h2>
      <div class="features" style="margin-top:12px;">
        <div class="feature">
          <h3>🌱 Propósito</h3>
          <p class="muted">Aprender a despedirse y presentarse en náhuatl; rescatar, revitalizar y fortalecer el idioma en los pueblos originarios.</p>
        </div>
        <div class="feature">
          <h3>📘 Metodología</h3>
          <p class="muted">Basada en <strong>tareas comunicativas</strong>, con una <em>macro tarea</em> a la que se llega mediante varias microtareas.</p>
        </div>
        <div class="feature">
          <h3>🎯 Beneficios</h3>
          <p class="muted">Vocabulario y gramática de manera interactiva; aprecio por la cultura nahua; fortalecimiento de lectura, escritura, oralidad y comprensión.</p>
        </div>
        <div class="feature">
          <h3>🌐 Enfoque bilingüe</h3>
          <p class="muted">Relación español–náhuatl para analizar conjugaciones y usos del tiempo.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section" id="modulos">
    <div class="container">
      <h2>Módulos</h2>
      <div class="mods-grid" style="margin-top:14px">
        <div class="module-card">
          <span class="tag">Módulo 1</span>
          <h4>Tema 1 · Saludos y despedidas</h4>
          <p class="muted">Conozcamos los saludos y las despedidas.</p>
          <div style="display:flex; gap:10px; align-items:center">
            <a class="btn primary" href="<?php echo base_url(route_to('modulo_1')) ?>">Ir al módulo</a>
          </div>
        </div>
        <div class="module-card">
          <span class="tag">Módulo 2</span>
          <h4>Tema 2 · Frases de cortesía</h4>
          <p class="muted">Expresiones de cortesía e interrogantes útiles.</p>
          <div style="display:flex; gap:10px; align-items:center">
            <a class="btn primary" href="<?php echo base_url(route_to('modulo_2')) ?>">Ir al módulo</a>
          </div>
        </div>
        <div class="module-card">
          <span class="tag">Módulo 3</span>
          <h4>Tema 3 · Pronombres</h4>
          <p class="muted">Personales y posesivos (prefijos).</p>
          <div style="display:flex; gap:10px; align-items:center">
            <a class="btn primary" href="<?php echo base_url(route_to('modulo_3')) ?>">Ir al módulo</a>
          </div>
        </div>
        <div class="module-card">
          <span class="tag">Módulo 4</span>
          <h4>Tema 4 · Verbos</h4>
          <p class="muted">Lista base de verbos (infinitivo -lis) + actividades.</p>
          <div style="display:flex; gap:10px; align-items:center">
            <a class="btn primary" href="<?php echo base_url(route_to('modulo_4')) ?>">Ir al módulo</a>
          </div>
        </div>
        <div class="module-card">
          <span class="tag">Módulo 5</span>
          <h4>Tema 5 · Temporalidad</h4>
          <p class="muted">Tiempos y construcciones frecuentes.</p>
          <div style="display:flex; gap:10px; align-items:center">
            <a class="btn primary" href="<?php echo base_url(route_to('modulo_5')) ?>">Ir al módulo</a>
          </div>
        </div>

      </div>
      <div class="footer">
  Developed by <span class="brand-white">Daeonix Systems</span> for
  <span class="school-white">UPN212-Teziután</span>. 2025.
</div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if (session()->getFlashdata('success')): ?>
Swal.fire({
  icon: 'success',
  title: '¡Inicio de sesión exitoso!',
  text: 'Bienvenido.',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  background: '#1e1e2f',
  color: '#fff',
  iconColor: '#00e676',
  customClass: {
    popup: 'animated fadeInDown'
  }
});
<?php endif; ?>
</script>
<style>
/* Opcional: animación más suave */
.swal2-popup {
  border-radius: 12px !important;
  box-shadow: 0 5px 25px rgba(0,0,0,0.4) !important;
}
</style>
</body>
</html>
