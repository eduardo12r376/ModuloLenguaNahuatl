<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro – Explora el Náhuatl</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
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
      position: static;
      bottom: 0;
      left: 0;
      width: 100%;
    }

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

    .login-form {
      background: white;
      color: #333;
      width: 100%;
      max-width: 900px;
      padding: 28px 30px;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.2);
      text-align: left;
    }

    .form-row {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
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

    .form-group input:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 4px rgba(0,123,255,0.3);
    }

    .btn.primary {
      display: block;
      width: 100%;
      padding: 12px;
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
      .form-row { flex-direction: column; }
    }

    .form-group select {
  width: 100%;
  padding: 10px 10px 10px 36px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
  margin-bottom: 14px;
  appearance: none;
  background-color: #fff;
}


  </style>
</head>
<body>
  <div class="topbar">
    <div class="container inner">
      <img src="<?php echo base_url('assets/imgs/Logo UPN.png') ?>" alt="Logo UPN" class="logo-upn" />
      <strong>Explora el Náhuatl</strong>
      <img src="<?php echo base_url('assets/imgs/lengua.png') ?>" alt="Logo lengua" class="logo-upn" />
      <div style="flex:1"></div>
      <nav>
        <a href="<?php echo base_url('/') ?>">Inicio</a>
        <a href="<?php echo base_url(route_to('/')) ?>#modulos">Módulos</a>
        <a href="#contacto">Contacto</a>
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
      <h1>Registro de Alumno</h1>
      <p class="muted">Completa el formulario para crear tu cuenta.</p>

      <form class="login-form" action="<?php echo base_url('registrar') ?>" method="post">
        <?php echo csrf_field() ?>

        <div class="form-row">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <i class="fa fa-user"></i>
            <input type="text" id="nombre" name="nombre" value="<?php echo old('nombre') ?>" required placeholder="Ej. Juan" />
          </div>

          <div class="form-group">
            <label for="apellidoPaterno">Apellido paterno</label>
            <i class="fa fa-user-tag"></i>
            <input type="text" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo old('apellidoPaterno') ?>" required />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="apellidoMaterno">Apellido materno</label>
            <i class="fa fa-user-tag"></i>
            <input type="text" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo old('apellidoMaterno') ?>" required />
          </div>

          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <i class="fa fa-phone"></i>
            <input type="text" id="telefono" name="telefono" value="<?php echo old('telefono') ?>" placeholder="Ej. 2311234567" />
          </div>
        </div>

       <div class="form-row">
        <div class="form-group">
          <label for="idGrado">Grado o Programa de Estudio</label>
          <i class="fa fa-graduation-cap"></i>
           <select id="idGrado" name="idGrado" required>
              <option value="">-- Selecciona tu programa --</option>
                <?php foreach ($grados as $grado): ?>
                  <option value="<?php echo esc($grado['idGrado']) ?>"><?php echo esc($grado['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="matricula">Matricula</label>
            <i class="fa fa-id-card"></i>
            <input  pattern="[0-9]{11}"
             title="La matrícula debe tener exactamente 11 números" 
             maxlength="11" type="text" placeholder="20250000000" id="matricula" name="matricula" value="<?php echo old('matricula') ?>" required>
          </div>
       </div>
        <div class="form-row">
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <i class="fa fa-envelope"></i>
            <input type="email" id="email" name="email" value="<?php echo old('email') ?>" required placeholder="ejemplo@correo.com" />
          </div>

          <div class="form-group">
            <label for="email_confirm">Confirmar correo</label>
            <i class="fa fa-envelope-open"></i>
            <input type="email" id="email_confirm" name="email_confirm" required placeholder="Repite tu correo" />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="password">Contraseña</label>
            <i class="fa fa-lock"></i>
            <input type="password" id="password" name="password" required placeholder="••••••••" />
          </div>

          <div class="form-group">
            <label for="password_confirm">Confirmar contraseña</label>
            <i class="fa fa-lock"></i>
            <input type="password" id="password_confirm" name="password_confirm" required placeholder="Repite tu contraseña" />
          </div>
        </div>

        <button type="submit" class="btn primary">
          <i class="fa fa-user-plus"></i> Registrarme
        </button>

        <p class="muted" style="margin-top:12px; text-align:center;color:black">
          ¿Ya tienes cuenta? <a href="<?php echo base_url(route_to('login')) ?>">Inicia sesión</a>
        </p>
      </form>
    </div>
  </section>

  <div class="footer">
    Developed by <span class="brand-white">Daeonix Systems</span> for
    <span class="school-white">UPN212-Teziutlán</span>. 2025.
  </div>

  <!-- SweetAlert para errores -->
  <script>
  document.addEventListener('DOMContentLoaded', () => {
    <?php if (session()->getFlashdata('errors')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: `
          <ul style="text-align:left; padding-left:20px;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
              <li><?php echo esc($error) ?></li>
            <?php endforeach; ?>
          </ul>
        `,
        confirmButtonText: 'Entendido',
        confirmButtonColor: '#007bff'
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      Swal.fire({
        icon: 'success',
        title: '¡Registro exitoso!',
        text: 'Tu cuenta ha sido creada correctamente. Ahora puedes iniciar sesión.',
        confirmButtonText: 'Ir al login',
        confirmButtonColor: '#28a745'
      }).then(() => {
        window.location.href = "<?php echo base_url(route_to('login')) ?>";
      });
    <?php endif; ?>
  });
  </script>

  <!-- Validación rápida de coincidencias -->
  <script>
  document.querySelector('.login-form').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value;
    const emailConfirm = document.getElementById('email_confirm').value;
    const pass = document.getElementById('password').value;
    const passConfirm = document.getElementById('password_confirm').value;

    let errors = [];

    if (email !== emailConfirm) errors.push('Los correos electrónicos no coinciden.');
    if (pass !== passConfirm) errors.push('Las contraseñas no coinciden.');

    if (errors.length > 0) {
      e.preventDefault();
      Swal.fire({
        icon: 'warning',
        title: 'Verifica tus datos',
        html: '<ul style="text-align:left; padding-left:20px;"><li>' + errors.join('</li><li>') + '</li></ul>',
        confirmButtonText: 'Corregir',
        confirmButtonColor: '#f39c12'
      });
    }
  });
  </script>
</body>
</html>
