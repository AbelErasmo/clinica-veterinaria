<?php
require_once './autoload.php';
require_once './config/db_connect.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Clinica Veterinaria</title>
  <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
  <div class="header">
    <h1>Clínica Veterinária</h1>

    <form method="GET" action="">
      <input type="search" name="q" placeholder="Pesquisar um animal" value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
      <button type="submit">Pesquisar</button>
    </form>
  </div>

  <div class="container">
    <h3>Explore nossa galeria de animais</h3>
    <div class="container_card">
      <?php
        $search = $_GET['q'] ?? '';
        (new AnimalView())->exibirAnimais(9, $search);
      ?>
    </div>
  </div>
</body>
</html>
