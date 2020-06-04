<?php
    if(isset($registro)) $acao = "posicao.php?acao=atualizar&id=".$registro['id'];
    else $acao = "posicao.php?acao=gravar";
    ?>
    <div class="container">
      <form class="" action="<?php echo $acao; ?>" method="post">
        <div class="from-group">
          <label for="nome">Cadastre a Posição que o jogador atua.</label>
          <input id="nome" class="form-control" type="text" name="nome"
            value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
        </div>
        <div class="from-group">
      <label for="id_classe">Cadastre a classe do jogador.</label>
      <select class="form-control" name="id_classe" required>
        <option value="">Escolha um item na lista</option>
        <?php foreach ($lista_classe as $item): ?>
          <option value="<?php echo $item['id']; ?>"
            <?php if(isset($registro) && $registro['id_classe']==$item['id']) echo "selected";?>>
            <?php echo $item['nome']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <br>
    <button class="btn btn-info" type="submit">Enviar</button>
  </form>
</div>


