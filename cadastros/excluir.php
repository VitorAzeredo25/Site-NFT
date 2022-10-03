<?php
include '../connection.php';
if(isset($_POST['excluir'])){
    $cpf=$_POST['CPF'];
    $sql="delete from cliente where CPF=:CPF";
    $stm=$conn->prepare($sql);

    $stm->bindParam(':CPF',$cpf);
    $resultado=$stm->execute();
    if(!$resultado){
        var_dump($stm->errorInfo());
    }else{
        header('Location:lista.php');
    }

}
if(isset($_POST['confirmar'])){
    $cpf=$_POST['CPF'];
    $nome=$_POST['nome'];
    $dataNascimento=$_POST['data'];
    $sql="update corretor set nome=:nome,
    nascimento=:nascimento where CPF='".$cpf."'";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
    $stmt->bindParam(':nascimento',$dataNascimento,PDO::PARAM_STR);
    $resultado=$stmt->execute();
    if(!$resultado){
        var_dump($stmt->errorInfo());
    }else{
        header('Location:lista.php');
    }
}
?>