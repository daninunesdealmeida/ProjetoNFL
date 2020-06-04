<div class="container print">
  <h2>Injurie</h2>
  <p>Cadastre o tipo da fratura.</p>
  <a class="btn btn-info" href="injurie.php?acao=novo">Novo</a>  
  <?php if (count($registros)==0): ?>
    <p>Nenhum registro encontrado.</p>
  <?php else: ?>
    <table class="table table-hover table-stripped">
      <thead>
          <th>#</th>
          <th>Nome da Fratura</th>
          <th>Local da Fratura</th>
          <th>Jogador</th>
      </thead>
      <tbody>
        <?php foreach ($registros as $linha): ?>
          <tr>
            <td><?= $linha['id']; ?></td>
            <td><?= $linha['nome']; ?></td>
            <td><?= $linha['local_fratura']; ?></td>
            <td><?= $linha['jogador']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="injurie.php?acao=buscar&id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="btn btn-danger btn-sm" href="injurie.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>