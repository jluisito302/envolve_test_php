<?php require 'views/layouts/header.php'; ?>

<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4 d-flex justify-content-center">
    <div class="card text-center margintop">
      <form method="POST" action="<?php echo constant('URL') ?>login/authLogin">
        <h1 class="h3 mb-4 mt-5 fw-normal pb-2">Acceso</h1>
        <span class="text-danger">
          <?php echo isset($_SESSION['message']) ? $_SESSION['message'] : '' ?>
        </span>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
          <label for="floatingPassword">Contraseña</label>
        </div>

        <div class="mb-3 mt-3">
          <p>Aún no tienes cuenta? <a href="<?php echo constant('URL') ?>register">Registrate</a></p>
        </div>
        <button class="w-100 btn btn-primary" type="submit">Entrar</button>
      </form>
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>

<?php require 'views/layouts/footer.php'; ?>
