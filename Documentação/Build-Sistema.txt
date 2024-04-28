# Build Sistema de Chamados

### Passo 1: Instalando dependências

Acesse o diretório do projeto usando o terminal e execute o comando: composer install, para instalar todas as dependências do PHP do projeto.

`cd seu-projeto-laravel` <br/>
`composer instal`

Caso não tenha o composer instaldo, instale acessando o link abaixo: <br/>
https://getcomposer.org/

**OBS:** Caso não tenha na sua maquina um ambiante de desenvolvimento, instale o laragon utilizando o link abaixo: <br/>
https://laragon.org/download/index.html

### Passo 2: Instalando dependências

Faça uma cópia do arquivo .env.example e renomeie-a para .env. Configure com as específicas do seu ambiente, como conexão com o banco de dados.

### Passo 3: Gerando a chave de aplicativo

Execute o comando php artisan key:generate para gerar uma nova chave de aplicativo.

`php artisan key:generate`

### Passo 4: Executando o Banco de Dados

Na pasta "Documentação" você encontra o arquivo `plss-challenge_db.sql` importe ele para o seu banco de dados (MySQL, HeidiSQL, entre outros).

`php artisan migrate`

### Passo 5: Iniciando o servidor

Execute o comando php artisan serve para iniciar o servidor.

`php artisan serve`
