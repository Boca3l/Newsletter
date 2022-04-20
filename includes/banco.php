<?php

    $nome = $_POST['cnome'];
    $email= $_POST['cemail'];

    if($nome == null || $email==null){
        echo "Dados Inválidos, favor verificar<br>";
        echo "<a href='../index.php'>Voltar</a>";
    }else{
        $banco = new mysqli('localhost','root','','news_letter') or die('Erro ao conectar ao banco');

        $check = $banco->query("SELECT * FROM cadastro WHERE nome = '$nome' and email = '$email'");

        if($check->num_rows < 1){    
            $sql = "INSERT INTO cadastro (nome,email) VALUE";
            $sql .= "('$nome','$email')";

            mysqli_query($banco,$sql) or die('Erro ao cadastrar o registro');
            

            echo "Cliente cadastrado com sucesso!";
        }else{
            echo "Cadastro já existe<br>";
            echo "<a href='../index.php'>Voltar</a>";
        }
        $banco->close();
    }
    
    

?>