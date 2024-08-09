# activity-app
**Clone o repositório**:
   ```bash
   git clone <URL_DO_REPOSITORIO>
   cd <NOME_DA_PASTA_DO_PROJETO>
   ```
   
## Project Setup - Rode para instalar a dependências
```
npm install
```

### Compila e recarrega para desenvolvimento
```
npm run serve
```

### Compila e minimiza para produção
```
npm run build
```

### Lints e corrige arquivos
```
npm run lint
```

### Configuração do Back-End (Laravel)


### Instale as dependências do Laravel:
```
cd backend
composer install
```
### Copie o arquivo de configuração .env:

```
cp .env.example .env
```
### php artisan key:generate
````
php artisan key:generate
````
### Configure o banco de dados recomendo o servidor XAMPP:
````
Crie um banco de dados em seu SGBD.
Edite o arquivo .env para adicionar as credenciais do banco de dados. As configurações típicas incluem:

DB_CONNECTION: Tipo de conexão (ex: mysql)
DB_HOST: Endereço do host do banco de dados
DB_PORT: Porta do banco de dados (ex: 3306 para MySQL)
DB_DATABASE: Nome do banco de dados
DB_USERNAME: Nome de usuário do banco de dados
DB_PASSWORD: Senha do banco de dados
````
### Rode as migrations assim que tiver certeza que configurou o arquivo .env com as informações do banco cor
````
php artisan migrate
````
### Por último incie o laravel 
````
php artisan serve
````

````
Atualiza rotas e limpa cache:
php artisan optimize:clear
````

### Personalizar configuração
See [Configuration Reference](https://cli.vuejs.org/config/).
