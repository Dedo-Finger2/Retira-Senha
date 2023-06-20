<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../Public/Css/style.css">

    <title>Cadastro</title>

</head>
<body>
<body>
    <div class="container">
  <!-- Conteúdo aqui -->

  <div class="left">
      <h1 class="tittle" id="bem-vindo">Bem vindo!!</h1>
      <p class="font-weight-light">para retirar uma senha de cursos da cidade do saber, você deve se cadastrar no nosso site, e retirar uma senha digital.</p>
      <img src="../Public/img/webinar-animate.svg" class="img-fluid" alt="Imagem responsiva" id="imagem">
       <!-- Fechamento left -->
  </div>

  <div class="right">
    <div class="card">
      <div class="card-body">
        <h1 class="tittle">Cadastro de usuário</h1>
        <!-- "Aqui vai ficar o formulário para cadastro de novos usuáros" - Greg -->
        <form action="" method="post">
           
            <div class="form-group">
              <label for="nomeId">Nome</label>
              <input type="text" class="form-control" id="nomeId" placeholder="Digite seu nome completo:">
            </div>

             <div class="form-group">
              <label for="emailId">Email</label>
              <input type="text" class="form-control" id="emailId"  placeholder="Digite seu email:" required>
            </div>

            <div class="form-group">
              <label for="senhaId">Senha</label>
              <input type="password" class="form-control" id="senhaId" placeholder="Digite uma senha:" required>
            </div>

            <div class="form-group">
              <label for="rgId">RG</label>
              <input type="number" pattern="[0-9]*" class="form-control" id="rg" placeholder="Digite seu RG:" maxlength="11" required>
              <small id="nomeHelpe" class="form-text text-muted">Apenas números (11 dígitos), Ex: 1113337</small>
            </div>            
        
              <!-- 
            "Vai ser interessante esse input ser customizado, aceitar apenas um valor parecido com RG
            Tipo assim: 12.345.678-9
            Esse input deve colocar os pontos e hífen automaticamente, ou apenas recusar eles e aceitar apenas os números" - Greg
            -->

            <button type="submit" class="btn btn-primary">Cadastrar</button>

             <!-- Fechamento do formulario -->
          </form>
        <a href="login.php">Já possui conta?</a>

            <!--Fechamento card -->
        </div>
          <!-- Fechamento card-body -->

      </div>
      <!-- Fechamento rigth -->
    </div>
  <!-- Fechamento container -->
  </div> 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

    <!-- Script que auto completa o RG do usuário com pontos e hífen -->
    <script>
        const rgInput = document.getElementById('rg');
    
        function formatarRG(valor) {
            
            // Remove tudo o que não é dígito/número
            valor = valor.replace(/\D/g, '');
    
            // Adiciona os pontos e hífen automaticamente
            valor = valor.replace(/^(\d{2})(\d{3})(\d{3})(\d{1})$/, '$1.$2.$3-$4');
    
            // Retorna o valor formatado com os valores, pontos e hífen
            return valor;
        }
    
        rgInput.addEventListener('input', function (event) {
            // Obtém o valor atual do input de RG
            let valorAtual = event.target.value;
    
            // Formata o valor do campo
            valorAtual = formatarRG(valorAtual);
    
            // Define o valor formatado no campo
            event.target.value = valorAtual;
        });
    </script>
</body>
</html>