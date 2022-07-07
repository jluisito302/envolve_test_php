<?php require 'views/layouts/header.php'; ?>

<main class="w-100 m-auto text-center padding">
    <h1 class="text-success mb-3 pb-2 mt-5">Registro exitoso</h1>
    <p><?php echo $this->mensaje; ?></p>
    <h5>Acceder a mi cuenta <a href="<?php echo constant('URL') ?>login">Login</a></h5>
</main>

<?php require 'views/layouts/footer.php'; ?>