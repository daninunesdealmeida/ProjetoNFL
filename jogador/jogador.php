<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
 ?>
 
<?php
    require_once '../config/conexao.php';

    //jogador/jogador.php?acao=listar

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT j.id, j.nome, j.data, j.numero, j.calouro, p.nome as posicao
                    FROM jogador j
                    INNER JOIN posicao p ON p.id=j.id_posicao";
       $query = $con->query($sql);
       if($query==false) print_r($con->errorInfo());
       $registros = $query->fetchAll();

        // print_r($registros); exit;
       require_once '../template/cabecalho.php';
       require_once 'lista_jogador.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
    $lista_posicao = getPosicoes();
     

      // print_r($lista_jogador); exit;
      require_once '../template/cabecalho.php';
      require_once 'form_jogador.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $registro['calouro'] = (isset($registro['calouro']))? 1 : 0;
        // var_dump($registro);

        $sql = "INSERT INTO jogador(nome, data, numero, id_posicao, calouro)
                  VALUES(:nome, :data, :numero, :id_posicao, :calouro)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./jogador.php');
        }else{
            print_r($registro);
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM jogador WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Erro ao tentar remover o registro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $lista_posicao = getPosicoes();
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM jogador WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        // var_dump($registro); exit;
    
        require_once '../template/cabecalho.php';
        require_once 'form_jogador.php';
        require_once '../template/rodape.php';
    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE jogador SET nome = :nome, data = :data, numero = :numero,
                    id_posicao = :id_posicao, calouro = :calouro WHERE id = :id";
        $query = $con->prepare($sql);

        $_POST['calouro'] = (isset($_POST['calouro']))? 1 : 0;

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':data', $_POST['data']);
        $query->bindParam(':numero', $_POST['numero']);
        $query->bindParam(':id_posicao', $_POST['id_posicao']);
        $query->bindParam(':calouro', $_POST['calouro']);
        $result = $query->execute();

        if($result){
            header('Location: ./jogador.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }

    //função que retorna as posições cadastrados no banco
    function getPosicoes(){
        $sql   = "SELECT p.id, p.nome, c.nome as classe
        FROM posicao p
        Inner JOIN classe c ON c.id=p.id_classe";
        $query = $GLOBALS['con']->query($sql);
        $lista_posicao = $query->fetchAll();
        return $lista_posicao;
    }
 ?>
