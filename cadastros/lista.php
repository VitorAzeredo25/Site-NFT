<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php include '../connection.php'; ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Sᴀᴍᴜʀᴀɪ NFTs</title>
    </head>
    <body>
        <div class="tabela">

            <h1>Lista de Clientes</h1>
            <table border="1">
                <tr>
                    <th>Nome</th><th>CPF</th><th>Nascimento</th><th>Estado</th><th>Cidade</th><th>Bairro</th><th>Rua</th>
                    <th>Número</th><th>Sexo</th><th>Fone</th><th>Email</th><th>Nft</th><th>Excluir</th>
                </tr>
            <?php
                $sql="SELECT nome,CPF,nascimento,estado,cidade,bairro,rua,numero,sexo,fone,email,nft FROM cliente";
                $resultado=$conn->query($sql);
                $tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach($tabela as $linha){
                    echo "<tr>";
                    foreach($linha as $coluna){
                        echo "<td>" .$coluna. "</td>";
                    }
                    echo "<td>";
                     echo "<form action='excluir.php' method='post'>";
                    echo "<input hidden type='text' name='CPF' value='".$linha['CPF']."'>";
                    echo "<input type='submit' name='excluir'></form>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
            </table>

        </div>
    </body>
</html>