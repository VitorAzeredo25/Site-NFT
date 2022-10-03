<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Sᴀᴍᴜʀᴀɪ NFTs</title>
    </head>
<body>
<section>
    <nav>
        <form method="post" action="#">

            <fieldset class="">
            <legend>Dados Pessoais</legend>
                    <input type="text" placeholder="Nome Completo" name="nome">
                    <br>
                    <input type="text" placeholder="CPF" name="cpf">
                    | <input type="date" name="nascimento"> <br>
                    <br> 
                    <input type="radio" name="sexo" value="masculino"> Masculino
                    <input type="radio" name="sexo" value="feminino"> Feminino <br>
                    <input type="email" name="email" placeholder="Email">
                    | <input type="tel" name="fone" placeholder="Telefone"><br>
            </fieldset>

            <fieldset id="endereco">
                <legend>Endereço</legend>
                    <select name="estado">
                        <option hidden>Escolha um estado</option> 
                        <option value="RS">Rio Grande do Sul</option> 
                        <option value="SC">Santa Catarina</option> 
                        <option value="PR">Paraná</option> 
                        <option value="DF">Destrito Federal</option> 
                        <option value="SP">São Paulo</option> 
                        <option value="RJ">Rio de Jneiro</option>
                    </select><br>
                <input type="text" name="cidade" placeholder="Cidade">
                | <input type="text" name="bairro" placeholder="Bairro"><br>
                <input type="text" name="rua" placeholder="Rua ">
                | <input type="number" name="numero" placeholder="Número"><br>
            </fieldset>

            <fieldset>
                <legend>Selecione sua NFT</legend>
                <select name="nft">
                    <option hidden>Escolha uma NFT</option>
                    <option value="#880769">Shogun Samurai #88076</option>
                    <option value="#880667">Shogun Samurai #880667</option>
                    <option value="#880564">Shogun Samurai #880564</option>
                    <option value="#880326">Shogun Samurai #880326</option>
                    <option value="#880777">Shogun Samurai #880777</option>
                    <option value="#880544">Shogun Samurai #880544</option>
                    <option value="#880089">Shogun Samurai #880089</option>
                    <option value="#880231">Shogun Samurai #880231</option>
                    <option value="#880205">Shogun Samurai #880205</option>
                    <option value="#880251">Shogun Samurai #880251</option>
                    <option value="#880643">Shogun Samurai #880643</option>
                    <option value="#880005">Shogun Samurai #880005</option>
            </fieldset>
            <fieldset>
                <input type="submit" value="Salvar" name="salvar">
            </fieldset>
        </form>
        <?php 
        if (isset($_POST['salvar'])){
        $cpf=$_POST['cpf']; 
		$nome=$_POST['nome'];
        $nascimento=$_POST['nascimento'];
		$sexo=$_POST['sexo'];
		$estado=$_POST['estado'];
		$cidade=$_POST['cidade']; 
		$bairro=$_POST['bairro']; 
		$rua=$_POST['rua'];    
		$numero=$_POST['numero']; 
		$fone=$_POST['fone'];
		$email=$_POST['email'];
        $nft=$_POST['nft'];

        include '../connection.php';
        $sql="INSERT INTO cliente(nome,cpf,estado,cidade,bairro,rua,numero,sexo,fone,email,nft,nascimento)
         VALUE(:nome,:cpf,:estado,:cidade,:bairro,:rua,:numero,:sexo,:fone,:email,:nft,:nascimento)";

            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':nome', $nome,PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $cpf,PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $sexo,PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado,PDO::PARAM_STR);
            $stmt->bindParam(':cidade', $cidade,PDO::PARAM_STR);
            $stmt->bindParam(':bairro', $bairro,PDO::PARAM_STR);
            $stmt->bindParam(':rua', $rua,PDO::PARAM_STR);
            $stmt->bindParam(':numero', $numero,PDO::PARAM_STR);
            $stmt->bindParam(':fone', $fone,PDO::PARAM_STR);
            $stmt->bindParam(':email', $email,PDO::PARAM_STR);
            $stmt->bindParam(':nft', $nft,PDO::PARAM_STR);
            $stmt->bindParam(':nascimento', $nascimento,PDO::PARAM_STR);
            $resultado=$stmt->execute();
         if(!$resultado){
             var_dump($stmt->errorInfo());
             exit;
         }else{
             echo $stmt->rowCount()." linhas inseridas";
         }
     }    
?>

    </nav>
</section>