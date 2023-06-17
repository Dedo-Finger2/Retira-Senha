USE atende;

/*
* Inserindo uma nova coluna na tabela Senha (futura chave estrangeira)
*/
ALTER TABLE senha
ADD IF NOT EXISTS cod_cadastro INT NULL;

/*
* Alterando a tabela novamente dessa vez transformando a coluna anterior
* numa chave estrangeira com referencia ao ID da tabela Cadastro.
* Essa chave estrangeira vai ser nula por default e se um usuário for deletado
* do sistema as chaves com seu nome associado serão setadas com NULL

[MOTIVO DISSO]
* Dessa forma podemos saber quem é o dono da senha, e caso não tenha dono esse
* campo vai ser nulo e não vai conter nenhum valor associado, também podemos
* mudar o campo SITUACAO da senha ao mesmo tempo que mudamos esse campo novo
* que é a chave estrangeria
* Se o usuário atualizar suas credênciais tendo senhas associadas com seu ID
* então o sistema não vai impedir nem nada
*/
ALTER TABLE senha
ADD CONSTRAINT fk_senha_usuarioCadastrado
FOREIGN KEY (cod_cadastro) REFERENCES cadastro(cod_cadastro)
ON DELETE SET NULL
ON UPDATE NO ACTION;