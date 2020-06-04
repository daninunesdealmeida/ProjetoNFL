<div class="container print">
  <h2>Jogadores</h2>
  <p>Cadastre todos os dados do jogador.</p>
  <a class="btn btn-info" href="jogador.php?acao=novo">Novo</a>
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome</th>
          <th>Data de Nascimento</th>
          <th>Número</th>
          <th>Posição</th>
          <th>Calouro</th>
          <th>Ações</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?= $linha['id']; ?></td>
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['data']; ?></td>
            <td><?= $linha['numero']; ?></td>
            <td><?php echo $linha['posicao']; ?></td>
            <td><?php if($linha['calouro']==1) echo "Sim";
                      else echo "Nao"; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="jogador.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="jogador.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
