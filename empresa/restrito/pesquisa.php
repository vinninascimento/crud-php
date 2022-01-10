<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  <title>Listagem</title>
</head>

<body>

  <?php
  $pesquisa = $_POST['busca'] ?? '';
  include "conexao.php";
  $sql = "SELECT * FROM pessoas WHERE cpf LIKE '%$pesquisa%'";
  $dados = mysqli_query($conn, $sql);
  ?>


  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Listagem</h1>
        <nav class="navbar navbar-light bg-light">
          <form class="form-inline" action="pesquisa.php" method="POST">
            <input class="form-control mr-sm-2" type="search" placeholder="CPF" aria-label="Search" name="busca" autofocus>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </nav>
        <br />
        <table id="example" class="display" style="width:100%">
          <thead>
            <tr>
              <th scope=" col">Nome</th>
              <th scope="col">CPF</th>
              <th scope="col">Endereço</th>
              <th scope="col">Telfone</th>
              <th scope="col">Email</th>
              <th scope="col">Funções</th>
            </tr>
          </thead>
          <tbody>

            <?php

            while ($linha =  mysqli_fetch_assoc($dados)) {
              $cod_pessoa = $linha['cod_pessoa'];
              $nome = $linha['nome'];
              $cpf = $linha['cpf'];
              $endereco = $linha['endereco'];
              $telefone = $linha['telefone'];
              $email = $linha['email'];


              echo "<tr>
                          <th scope='row' class='col-md-2'>$nome</th>
                           <td class='col-md-2'>$cpf</td>
                          <td class='col-md-3'>$endereco</td>
                          <td class='col-md-2'>$telefone</td>
                          <td class='col-md-2'>$email</td>
                          <td width=150px class='col-md-1'>
                              <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'><i class='fas fa-edit'></i></a>
                              <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma'
                              onclick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . "><i class='fas fa-trash-alt'></i></a>
                          </td>
                      </tr>";
            }
            ?>
            <!--  onclick="pegar_dados($id, '$nome')"  O SEGREDO ESTÁ AQUI!!!-->

          </tbody>
        </table>

        <a href="index.php" class="btn btn-info">Voltar para o início</a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="excluir_script.php" method="POST">
            <p>Deseja realmente excluir <b id="nome_pessoa">Nome do pessoa</b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
          <input type="hidden" name="nome" id="nome_pessa_1" value="">
          <input type="hidden" name="id" id="cod_pessoa" value="">
          <input type="submit" class="btn btn-danger" value="Sim">
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Optional JavaScript -->
  <script>
    function mascara(i) {

      var v = i.value;

      if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
        i.value = v.substring(0, v.length - 1);
        return;
      }

      i.setAttribute("maxlength", "14");
      if (v.length == 3 || v.length == 7) i.value += ".";
      if (v.length == 11) i.value += "-";

    }
  </script>
  <script>
    function mascara(o, f) {
      v_obj = o
      v_fun = f
      setTimeout("execmascara()", 1)
    }

    function execmascara() {
      v_obj.value = v_fun(v_obj.value)
    }

    function mtel(v) {
      v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
      v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
      v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
      return v;
    }

    function id(el) {
      return document.getElementById(el);
    }
    window.onload = function() {
      id('telefone').onkeyup = function() {
        mascara(this, mtel);
      }
    }
  </script>





  <script type="text/javascript">
    function pegar_dados(id, nome) {
      document.getElementById('nome_pessoa').innerHTML = nome;
      document.getElementById('nome_pessa_1').value = nome;
      document.getElementById('cod_pessoa').value = id;
    }
  </script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>