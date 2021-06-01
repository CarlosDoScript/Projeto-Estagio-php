<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Alteração de Cadastro</title>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  		  
        <?php
        include "conexao.php";

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $dt_nascimento = $_POST['dt_nascimento'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $observacao = $_POST['observacao'];



       // $sql = "INSERT INTO pessoas (nome, dt_nascimento, cpf, telefone, email, endereco, observacao)VALUES 
       //('$nome','$dt_nascimento','$cpf','$telefone','$email','$endereco','$observacao')";



        $sql = "UPDATE 'pessoas' set 'nome' = '$nome', 'dt_nascimento' = '$dt_nascimento' , 'cpf' = '$cpf','telefone' = '$telefone', 'email' = '$email', 'endereco' = '$endereco', 'observacao' = '$observacao' WHERE cod_pessoa = $id";


      if (mysqli_query($conn, $sql)) {
          mensagem("$nome alterado com sucesso!",'success');
        }else 
        mensagem("$nome NÃO alterado!",'danger');
        ?>
        <a href="index.php" class="btn btn-primary">Voltar</a>   
  		</div>
  	</div>

 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>