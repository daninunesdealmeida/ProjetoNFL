<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
 ?>

<?php require_once 'template/cabecalho.php'; ?>
<?php echo "Bem-vindo : "  . $_SESSION['logado']['nome']; ?>
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading"> CRUD | NFL </h1>
    <p class="lead text-muted">
      Aplicação para cadastrar, visualizar, editar e apagar novos Jogadores do time.</p>
      <p class="lead text-muted"> Clique no Menu acima e faça isso agora mesmo!</p>
    <p> <img src="imagens/NFL_Logo.jpg"  style="width: 400px;">  </p>
     <p> <a href="https://www.nfl.com/">Visite também o Site Oficial da NFL</>  </p>
  </div>
</section>

<?php require_once 'template/rodape.php'; ?>
