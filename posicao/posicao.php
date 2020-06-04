<?php
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
 ?>
 
<?php
    require_once '../config/conexao.php';

    //posicao/posicao.php?acao=listar

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];

    /**
    * Ação de listar
    */
    if($acao=="listar"){
       $sql   = "SELECT p.id, p.nome, c.nome as classe 
                 FROM posicao p
                 Inner Join classe c ON c.id=p.id_classe";
       $query = $con->query($sql);
       $registros = $query->fetchAll();

       require_once '../template/cabecalho.php';
       require_once 'lista_posicao.php';
       require_once '../template/rodape.php';
    }
    /**
    * Ação Novo
    **/
    else if($acao == "novo"){
    $lista_classe = getClasses();

    // print_r($lista_classe); exit;
      require_once '../template/cabecalho.php';
      require_once 'form_posicao.php';
      require_once '../template/rodape.php';
    }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

       // var_dump($registro);
        $sql = "INSERT INTO posicao(nome, id_classe) VALUES(:nome, :id_classe)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./posicao.php');
        }else{
            echo "Erro ao tentar inserir o registro msg:". print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM posicao WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./posicao.php');
        }else{
            echo "Erro ao tentar remover o registro de id: " . $id;
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "buscar"){
        $lista_classe = getClasses();
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM posicao WHERE id = :id";
        $query = $con->prepare($sql);
        $query->bindParam(':id', $id);

        $query->execute();
        $registro = $query->fetch();

        // var_dump($registro); exit;
        require_once '../template/cabecalho.php';
        require_once 'form_posicao.php';
        require_once '../template/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE posicao SET nome = :nome, id_classe = :id_classe WHERE id = :id";
        $query = $con->prepare($sql);

        $query->bindParam(':id', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':id_classe', $_POST['id_classe']);
        $result = $query->execute();


        if($result){
            header('Location: ./posicao.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }

     
}

//função que retorna a lista de classe cadastrados no banco
function getClasses(){
    $sql   = "SELECT * FROM classe";
    $query = $GLOBALS['con']->query($sql);
    $lista_classe = $query->fetchAll();
    return $lista_classe;
}
?>
