<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Pesquisar</title>
  </head>
  <body>

    <?php 
    
    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);

    ?>



  	<div class="container">
  		<div class="row">
  			<div class="col">
  				<h1>Pesquisar Cliente</h1>
          <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"></a>
            <form class="form-inline" action="pesquisa.php" method="POST">
              <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
          </nav>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">Funções</th>

              </tr>
            </thead>
            <tbody>

              <?php

              while ($linha = mysqli_fetch_assoc($dados)) {
                $cod_pessoa = $linha['cod_pessoa'];
                $nome = $linha['nome'];
                $email = $linha['email'];
                $dt_nascimento = $linha['dt_nascimento'];
                $telefone = $linha['telefone'];
                $dt_nascimento = mostra_data($dt_nascimento);


                echo "<tr>
                          <th scope='row'>$nome</th>
                          <td>$email</td>
                          <td>$dt_nascimento</td>
                          <td>$telefone</td>
                          <td width=150px>
                              <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success'>Editar</a>
                              <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'
                              onclick=" .'"' ."pegar_dados($cod_pessoa, '$nome')" . '"' .">Excluir</a>
                          </td>
                       </tr>";
                }

              ?>
              <!--onclick="pegar_dados($id, '$nome')"-->

              
              
            </tbody>
          </table>
          <a href="index.php" class="btn btn-info">Voltar para o inicio</a>
  			</div>
  		</div>
  	</div>


    <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="excluir_script.php" method="POST">
       <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <input type="hidden" name="nome" id="nome_pessoa_1" value="">
          <input type="hidden" name="id" id="cod_pessoa" value="">
          <input type="submit" class="btn btn-danger" value = "Sim">
        </form>
      </div>
    </div>
  </div>
</div>


  <script type="text/javascript">
    function pegar_dados(id, nome){
      document.getElementById('nome_pessoa').innerHTML = nome;
      document.getElementById('nome_pessoa_1').value = nome;
      document.getElementById('cod_pessoa').value = id;
    }
  </script>
 

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