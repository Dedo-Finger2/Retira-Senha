<h1 align="center"> 
  <img alt="Logo" src="App/Public/img/Logo-completa.png" style="width: 200px;"> 
</h1>

<div align="center"> 

![Em desenvolvimento](https://img.shields.io/badge/Status-Done-green)  [![Licença GPL v3](https://img.shields.io/badge/Licen%C3%A7a-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.pt-br.html)

</div>

<p align="center"> 
  <a href="#sobre">Sobre</a> • 
  <a href="#instrucoes">Instruções</a> •
  <a href="#autoria">Autoria</a> •
  <a href="#licencas">Licenças</a> • 
  <a href="#requisitos">Requisitos do Sistema</a> 
</p>

<h2 id="sobre">📝 Sobre</h2>

Este é um sistema de interface com banco de dados integrado com o objetivo de diminuir a fila presencial na Cidade do Saber. A página inicial do sistema está localizada no seguinte caminho: **App/View/index.php**

<h2 id="requisitos">📑 Requisitos do Sistema</h2>

- Validação de credenciais do usuário;
- Filtragem de senhas disponíveis;
- Exibição das senhas correspondentes aos cursos escolhidos;
- Cadastro de novos usuários;
- Interface amigável;
- Segurança;
- Escalabilidade;
- Notificações e alertas compreensíveis aos usuários.

<h2 id="instrucoes">🔐 Instruções</h2>

Nosso sistema conta com um sistema de autenticação e segurança que impede o acesso de usuários que não estejam cadastrados no banco de dados. Acesse a página de login e clique em 'não possuo conta' para efetuar um cadastro. Após se cadastrar, você será direcionado para a tela de login, onde precisará preencher as informações de cadastro para ter acesso ao sistema.

<h3>🔑 Como retirar senha?</h3>

Para retirar senhas, é necessário acessar o sistema e ir na aba 'Vagas disponíveis' encontrada na barra de navegação. Nessa tela, o usuário pode escolher algumas opções para obter uma senha que atenda suas necessidades. Ao aplicar os filtros, o usuário será redirecionado a uma tela com as senhas que correspondem às especificações definidas na tela anterior.

Na tabela com as senhas correspondentes, há uma caixa de seleção que permite ao usuário escolher qual senha daquela turma deseja obter. Algumas turmas possuem mais de uma senha disponível, então cabe ao usuário decidir qual das senhas deseja obter. Após selecionar a senha, basta clicar no botão 'Escolher senha' e a mesma será cadastrada em seu nome, podendo ser encontrada na tela 'Minhas senhas' (onde também é possível devolver a senha caso tenha escolhido a errada).

<h3>💾 Banco de dados</h3>

Para testar o sistema em sua própria máquina, é necessário ter um servidor local instalado. A equipe de desenvolvimento recomenda o uso do XAMPP como servidor local.

Após isso, é preciso gerar o banco de dados localmente na sua máquina, para isso o projeto contém o banco de dados completo, que pode ser encontrado na pasta Sql/ do projeto. A ordem de execução dos arquivos é a seguinte:

**dump.sql > 15_06_2023.sql > 16_06_2023.sql**

Certifique-se de remover os comentários encontrados no código dos arquivos mencionados acima.

<h2 id="autoria">🖊️ Autoria</h2>

<p align="center"> 
  <img alt="Logo" src="https://logodownload.org/wp-content/uploads/2019/08/senai-logo-1.png" style="width: 150px;"> 
</p> 

<p align="center"><strong>Turma G82893 Senai Camaçari - BA | Técnico em Desenvolvimento de Sistemas</strong></p>

- Antonio Mauricio (Back-end)
- Joice Almeida (Front-end)
- Leone Govea (Front-end)
- Wendson Ferreira (Front-end)

<h2 id="licencas">📜 Licença</h2>

Este projeto está sob a licença GNU GPL v3.
