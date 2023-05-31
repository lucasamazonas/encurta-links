# Encurta Links

### Configure o projeto em sua máquina
Após clonar o projeto do github dentro dele terá duas pastas
- front
- back

primeiramente, configure o back-end. Essa configuração deve ser feita 
dentro da pasta "back" e está dividida em duas partes

1. Configuração de variavéis de ambiente de acesso ao
banco de dados MYSQL. Faça isso no arquivo .env

```bash
DB_HOST=host
DB_PORT=porta
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=nome_do_usuario
DB_PASSWORD=senha_do_usuario
```
2. Execução do projeto. Execute os comandos abaixo dentro de um terminal

```bash
composer install

php artisan migrate

php artisan serve
```


agora, configure o front-end. Para isso, você deve estar dentro
da pasta "front" e fazer duas configurações:

1. Verifique se a variavél de ambiente **VITE_BASE_URL_API**
encontrada no arquivo .env está apontando corretamente 
para o servidor php.

```bash
VITE_BASE_URL_API=http://127.0.0.1:8000/api/
```

2. Instale as dependências do projeto e o execute

```bash
yarn install

yarn dev
```

Essas configurações devem ser suficientes para 
executar o projeto e testar suas funcionalidades. 
Contudo, caso encontre algum problema, sinta-se 
a vontade para entrar em contato comigo.


### Contatos

[![Linkedin](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/lucas-amazonas-538042186/) [![Instagram](https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white)](https://www.instagram.com/lucasamazonas/)

<br />
<br />