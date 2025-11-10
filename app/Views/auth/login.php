<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Iniciar sesión – Explora el Náhuatl</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script type="module">
    import { smoothAnchors } from './assets/js/common.js';
    smoothAnchors();
  </script>

  <style>
    /* ==== ESTRUCTURA BASE ==== */
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      background: #2c3e50;
    }

    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }

    .footer {
      bottom: 0;
      left: 0;
      width: 100%;
    }

    /* ==== HERO CENTRADO ==== */
    .login-hero {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding-top: 80px;
      padding-bottom: 60px;
      box-sizing: border-box;
      text-align: center;
      background: #34495e;
      color: white;
    }

    .login-hero h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .login-hero p.muted {
      font-size: 1.1rem;
      margin-bottom: 20px;
    }

    /* ==== FORMULARIO ==== */
    .login-form {
      background: white;
      color: #333;
      width: 100%;
      max-width: 100%;
      padding: 28px 30px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.2);
      text-align: left;
    }

    .login-form label {
      display: block;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      margin-bottom: 14px;
    }

    .login-form input:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 4px rgba(0,123,255,0.3);
    }

    .btn.primary {
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      background: #007bff;
      color: white;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.2s ease-in-out;
    }

    .btn.primary:hover {
      background: #0056b3;
    }

    @media (max-width: 600px) {
      .login-hero {
        padding-top: 100px;
      }

      .login-form {
        width: 90%;
      }
    }
    .form-group {
      flex: 1;
      min-width: 260px;
      position: relative;
    }

    .form-group i {
      position: absolute;
      top: 37px;
      left: 12px;
      color: #666;
    }
    .form-group input {
      width: 100%;
      padding: 10px 10px 10px 36px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      margin-bottom: 14px;
    }
  </style>
</head>
<body>
  <div class="topbar">
    <div class="container inner">
      <img src="assets/imgs/Logo UPN.png" alt="Logo UPN" class="logo-upn" />
      <strong>Explora el Náhuatl</strong>
      <img src="assets/imgs/lengua.png" alt="Logo lengua" class="logo-upn" />
      <div style="flex:1"></div>
      <nav>
        <a href="<?php echo base_url(route_to('/'))?>#presentacion">Presentación</a>
        <a href="<?php echo base_url(route_to('/'))?>#modulos">Módulos</a>
        <a href="index.html#contacto">Contacto</a>
      <?php if (session()->has('isLoggedIn')): ?>
      <a href="<?php echo base_url(route_to('logout'))?>">Cerrar sesión</a>
       <?php else: ?>
      <a href="<?php echo base_url(route_to('login'))?>">Iniciar sesión</a>
      <?php endif; ?>
      </nav>
    </div>
  </div>

  <section class="hero login-hero">
    <div class="login-container">
      <h1>Bienvenido(a)</h1>
      <p class="muted">Inicia sesión para acceder a tus módulos y actividades.</p>

      <form class="login-form" action="<?= base_url('login');?>" method="post">
        
        <div class="form-group">
          <label for="matricula">Matrícula</label> 
          <i class="fa fa-id-card"></i>
          <input type="matricula" id="matricula" name="matricula" required placeholder="20250000000" />
        </div>

        <div class="form-group">
          <label for="password">Contraseña</label>
          <i class="fa fa-lock"></i>
          <input type="password" id="password" name="password" required placeholder="••••••••" />
        </div>

        <button type="submit" class="btn primary">Iniciar sesión</button>

        <p class="muted" style="margin-top:12px; text-align:center;color:black">
          ¿No tienes cuenta? <a  href="<?php echo base_url(route_to('registro'))?>">Regístrate</a>
        </p>
      </form>
    </div>
  </section>

  <div class="footer">
    Developed by <span class="brand-white">Daeonix Systems</span> for
    <span class="school-white">UPN212-Teziutlán</span>. 2025.
  </div>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if (session()->getFlashdata('success')): ?>
Swal.fire({
  icon: 'success',
  title: '¡Registro exitoso!',
  text: 'Tu cuenta se ha creado correctamente.',
  confirmButtonText: 'Iniciar sesión',
  background: '#1e1e2f',
  color: '#fff',
  iconColor: '#00e676',
  confirmButtonColor: '#00bcd4',
  customClass: {
    popup: 'animated fadeInDown'
  }
}).then(() => {
  window.location.href = "<?php echo base_url('login')?>";
});
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: '<?= session()->getFlashdata("error") ?>',
  confirmButtonText: 'Intentar de nuevo',
  background: '#1e1e2f',
  color: '#fff',
  iconColor: '#ff3d00',
  confirmButtonColor: '#f44336',
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
