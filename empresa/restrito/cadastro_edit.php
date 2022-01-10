<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/estilo.css">
  <title>Alteração de Cadastro</title>
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
        <h1>Cadastro</h1>
        <form action="edit_script.php" method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=" nome">Nome completo</label>
              <input type="text" class="form-control " name="nome" required value="<?php echo $linha['nome']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for=" cpf">CPF</label>
              <input type="text" class="form-control" name="cpf" oninput="mascara(this)" value="<?php echo $linha['cpf']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="telefone">Telefone</label>
              <input type="text" class="form-control" name="telefone" placeholder="Telefone" maxlength="15" value="<?php echo $linha['telefone']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="telefone">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="submit" class="btn btn-success" value="Salvar Aterações">
              <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa'] ?>">
            </div>
          </div>
        </form>
        <div>
          <a href="index.php" class="btn btn-info">Voltar para o início</a>
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

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>