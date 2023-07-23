<?php

session_start();

include_once ("conn.php");
include_once ("url.php");



$data = $_POST;
//Modificações no banco

if(!empty($data)){

if($data["type"] === "create"){

    
    $query = "INSERT INTO cliente(id,nome,Telefone,descricao) values (null,:nome,:telefone,:descricao)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nome" , $data['nome']);
    $stmt->bindParam(":telefone" , $data['tel']);
    $stmt->bindParam(":descricao", $data['descricao']);

    try{
        $stmt->execute();
        $_SESSION['msg'] = "Contato criado com sucesso!";
        }
        catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }
}
else if($data["type"] === "edit"){

    $nome = $data['nome'];
    $tel = $data['tel'];
    $desc = $data['descricao'];
    $id = $data['id'];

     $query = "UPDATE cliente set nome = :nome , Telefone = :telefone, descricao = :descricao where id = :id ";

     $stmt = $conn->prepare($query);

    $stmt->bindParam(":nome" , $nome);
    $stmt->bindParam(":telefone" , $tel);
    $stmt->bindParam(":descricao" , $desc);
    $stmt->bindParam(":id" , $id);

    try{
        $stmt->execute();
        $_SESSION['msg'] = "Contato Atualizado com sucesso!";
        }
        catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }
}
else if($data["type"] === "delete"){

    $id = $data['id'];

     $query = "DELETE FROM cliente  where id = :id ";

     $stmt = $conn->prepare($query);

    $stmt->bindParam(":id" , $id);

    try{
        $stmt->execute();
        $_SESSION['msg'] = "Contato deletado com sucesso!";
        }
        catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }
}



//Redirect home
header("Location:" . $BASE_URL . "../index.php");


//SELEÇÂO DE DADOS
}else{

    $id;

if(!empty($_GET)){
    $id = $_GET["id"];
}

if(!empty($id)){
    $query = "SELECT * FROM cliente WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $contact = $stmt->fetch();
}
else{

$query = "SELECT * FROM cliente";


$stmt = $conn->prepare($query);

$stmt-> execute();

$contacts = $stmt->fetchAll(); 

}
}







/*if($data["type"] === "insert"){

    $query = "INSERT INTO cliente (id, nome, telefone, descricao) values (NULL, :nome, :telefone , :descricao)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nome" ,  $data['nome']);
    $stmt->bindParam(":telefone" ,  $data['tel']);
    $stmt->bindParam(":descricao" ,  $data['descricao']);

    
}
else if($data["type"] === "edit"){

    $query = "UPDATE cliente set nome = :nome, telefone = :telefone , descricao = :descricao where id = :id";
    
  
     

    $stmt = $conn->prepare($query);

    $stmt ->bindParam(":nome", $data['nome']);
    $stmt ->bindParam(":telefone", $data['tel']);
    $stmt ->bindParam(":descricao", $data['descricao']);
    $stmt ->bindParam(":id", $data['id']);

    try{
        $stmt->execute();
        $_SESSION['msg'] = "Contato criado com sucesso!";
        }
        catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
          }

    }





*/
