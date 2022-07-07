<?php require 'views/layouts/header.php'; ?>

<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4 d-flex justify-content-center">
    <div class="card text-center margintop">
      <form method="POST" action="<?php echo constant('URL') ?>register/registerUser">
        <h4 class=" mb-3 mt-4 fw-normal pb-2">Registrarme</h4>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
          <label for="floatingPassword">Contraseña</label>
        </div>
        <div class="form-floating pb-3">
          <select name="color" class="form-control" id="floatingColor" required>
            <option value="Azul">Azul</option>
            <option value="Rojo">Rojo</option>
            <option value="Amarillo">Amarillo</option>
            <option value="Morado">Morado</option>
            <option value="Naranja">Naranja</option>
            <option value="Verde">Verde</option>
          </select>
          <label for="floatingColor">Color</label>
        </div>
        <div>
          <span class="text-danger">
            <?php echo $this->mensaje; ?>
          </span>
        </div>
        <div class="mb-3 pb-2">
          <p>Ya tienes cuenta? <a href="<?php echo constant('URL') ?>login">Acceder</a></p>
        </div>
        <button class="w-100 btn btn-primary" type="submit">Registrar</button>
      </form>
    </div>
    
  </div>
  <div class="col-lg-4"></div>
</div>

  <?php require 'views/layouts/footer.php'; ?>