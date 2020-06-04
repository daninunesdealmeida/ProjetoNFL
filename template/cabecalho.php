<?php define('BASE_URL', 'http://localhost/PHP'); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Caution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="js.js"></script>
</head>

<body>
    <div id="div1">
        <nav class="navbar navbar-expand bg-dark navbar-dark">
            <ul style="color: white;" class="navbar-nav">
                <li class="nav-item active"></li>
                    <button class="btn btn-dark">
                    <li><a href="<?= BASE_URL; ?>/index.php" class="nav-link">Index</a></li>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-dark">
                    <a href="<?= BASE_URL; ?>/classe/classe.php"classe.php" class="nav-link">Classe</a>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-dark">
                    <a href="<?= BASE_URL; ?>/posicao/posicao.php"posicao.php" class="nav-link">Posição</a>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-dark">
                    <a href="<?= BASE_URL; ?>/jogador/jogador.php"jogador.php" class="nav-link">Jogador</a>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-dark">
                    <li><a href="<?= BASE_URL; ?>/injurie/injurie.php"injurie.php" class="nav-link">Injurie</a>
                </li>
                </li>
                <li class="nav-item active">
                    <button class="btn btn-dark">
                    <li><a href="<?= BASE_URL; ?>/relatorio/relatorio_page.php"relatorio_page.php" class="nav-link">Relatórios</a>
                </li>
            </ul>
        </nav>
    </div>
    <hr>
    <main>

