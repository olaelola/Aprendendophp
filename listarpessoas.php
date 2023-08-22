<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Pessoas cadastradas</h2>
<?php
    $sql = "SELECT * FROM tbpessoa order by nomePessoa";

    $dadosPessoas = $conn->query($sql);//executa o comandooo
    if($dadosPessoas->num_rows > 0){

        ?>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Nascimento</th>
                <th>Estado civil</th>
                <th>Gênero</th>
    </tr>
    <?php
    while ($dadosExibir = $dadosPessoas->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $dadosExibir["idPessoa"] ?></td>
            <td><?php echo $dadosExibir["nomePessoa"] ?></td>
            <td><?php echo $dadosExibir["sobrenomePessoa"] ?></td>
            <td><?php echo date("d/m/Y", strtotime($dadosExibir["dataNasc"])) ?></td>
            <?php
            $sqlEstCivil = "SELECT * FROM tbestcivil WHERE idEstCivil = " . $dadosExibir["idEstCivil"];
            $dadosEstCivil = $conn->query($sqlEstCivil);
            $estadoCivil = $dadosEstCivil->fetch_assoc();

            ?>
            <td><?php echo $estadoCivil["estadoCivil"] ?></td>
            <td><?php echo $dadosExibir["Sexo"] ?></td>

        </tr>
        <?php
    }
?>

        </table>
        <?php
        }else{
            echo "nenhum registro encontrado";
        }
?>
</body>
</html>