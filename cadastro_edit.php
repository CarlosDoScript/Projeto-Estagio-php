<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <title>Alteração de cadastro</title>
  </head>
  <body>


     <?php

     include "conexao.php";
     $id = $_GET['id'] ?? '';

     $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

     $dados = mysqli_query($conn, $sql);
     $linha = mysqli_fetch_assoc($dados);

     ?>

  	<div class="container">
  		<div class="row">
  			<div class="col">
  				<h1>Cadastro de cliente</h1>
  				<form action="edit_script.php" method="POST">
  					<div class="form-group">
  					    <label for="nome">Nome completo</label>
  					    <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome'];?>">
  					  </div>
  					  <div class="form-group">
  					    <label for="dt_nascimento">Data de nascimento</label>
  					    <input type="date" class="form-control" name="dt_nascimento" value="<?php echo $linha['dt_nascimento'];?>">
  					  </div>  
  					  <div class="form-group">
  					    <label for="cpf">Cpf</label>
  					    <input type="cpf" class="form-control" name="cpf" value="<?php echo $linha['cpf'];?>">
  					  </div>  
  					  <div class="form-group">
  					    <label for="telefone">Telefone</label>
  					    <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone'];?>">
  					  </div>
  					  <div class="form-group">
  					    <label for="email">Email</label>
  					    <input type="text" class="form-control" name="email" value="<?php echo $linha['email'];?>">
  					  </div>    
  					  <div class="form-group">
  					    <label for="endereco">Endereço</label>
  					    <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco'];?>">
  					  </div> 
  					  <div class="form-group">
  					    <label for="observacao">Observação</label>
  					    <input type="textarea" class="form-control" name="observacao" value="<?php echo $linha['observacao'];?>">
  					  </div>  
  					  <div class="form-group">
  					    <input type="submit" class="btn btn-success" value="Salvar Alterações">
                <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']?>">
  					  </div>  
  				</form>
          <a href="index.php" class="btn btn-info">Voltar para o inicio</a>
  			</div>
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