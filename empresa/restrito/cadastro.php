<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <title>Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
          <h1>Cadastro</h1>
          <form action="cadastro_script.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nome">Nome completo</label>
                <input type="text" class="form-control" name="nome" required>
              </div>
              <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                <input type="cpf" class="form-control" name="cpf" oninput="mascara(this)">
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" name="endereco">
              </div>
              <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="telefone">Email</label>
                <input type="email" class="form-control" name="email">
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success">
            </div>
          </form>
        </div>
        <a href="index.php" class="btn btn-info">Voltar para o início</a>
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
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>

</html>