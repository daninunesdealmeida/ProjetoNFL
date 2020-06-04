<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
 ?>

<?php require_once '../template/cabecalho.php'; ?>

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading"></h1>
    <p class="lead text-muted">
    <img src="../imagens/NFL_Logo.jpg" center style="width: 400px;"> 
    </p>
    <p>
    <p class="lead text-muted"> Clique nos botões abaixo para gerar os Relatórios.</p>
      <a href="<?= BASE_URL; ?>/relatorio/relatorio_csv.php" class="btn btn-primary my-2">Relatório em CSS</a> 
      <a href="<?= BASE_URL; ?>/relatorio/relatorio_ClassePdf.php"" class="btn btn-secondary my-2">Relatório de Classe em PDF</a>
      <a href="<?= BASE_URL; ?>/relatorio/relatorio_PosicaoPdf.php"" class="btn btn-secondary my-2">Relatório de Posição em PDF</a>
      <a href="<?= BASE_URL; ?>/relatorio/relatorio_JogadorPdf.php"" class="btn btn-secondary my-2">Relatório de Jogador em PDF</a>
      <a href="<?= BASE_URL; ?>/relatorio/relatorio_UsuarioPdf.php"" class="btn btn-secondary my-2">Relatório de Usuário em PDF</a>
      <a href="<?= BASE_URL; ?>/relatorio/relatorio_InjuriePdf.php"" class="btn btn-secondary my-2">Relatório de Injurie em PDF</a>
  
    </p>
  </div>
</section>

<?php require_once '../template/rodape.php'; ?>


