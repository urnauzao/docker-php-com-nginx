# Sobre

Neste repositório vamos fazer a criação de uma imagem Docker que embora possa ser utilizada em produção, ainda merece ser aperfeiçoada para permitir realmente o escalonamento da aplicação.

# Conteúdo da Imagem Docker

- <b>PHP</b>, e diversas extensões e Libs do PHP, incluindo php-redis, pgsql, mysql, entre outras.

- <b>Nginx</b>, como proxy reverso/servidor. Por fim de testes é que o Nginx está presente nesta imagem, em um momento de otimização está imagem deixará de ter o Nginx.

- <b>Supervisor</b>, indispensável para executarmos a aplicação PHP e permitir por exemplo a execução de filas e jobs.

- <b>Composer</b>, afinal de contas é preciso baixar as dependências mais atuais toda vez que fomos crontruir uma imagem Docker.

# Vídeos Tutorial

[Vídeo Sobre Criação do Dockerfile e do Docker Compose file](https://youtu.be/iDJjb2zYa4c)

# Passo a Passo

## Certifique-se de estar com o Docker em execução.

```sh
docker ps
```

## Certifique-se de ter o Docker Compose instalado.

```sh
docker compose version
```

## Clone sua aplicação Laravel para a pasta 'app'. Caso a pasta app não existe, crie a pasta.

A listagem de pastas do projeto deve ficar:

```
    app/
    docker/
    .gitignore
    docker-compose.yml
    readme.md
```

## Certifique-se que sua aplicação Laravel ficou em `./app` e que existe o seguinte caminho: `/app/public/index.php`

## Certifique-se que sua aplicação Laravel possuí um .env e que este .env está com a `APP_KEY=` definida com valor válido.

## Contruir a imagem Docker, execute:

```sh
docker compose build
```

## Caso não queira utilizar o cache da imagem presente no seu ambiente Docker, então execute:

```sh
docker compose build --no-cache
```

## Para subir a aplicação, execute:

```sh
docker compose up
```

- Para rodar o ambiente sem precisar manter o terminar aberto, execute:

```sh
docker compose up -d
```

## Para derrubar a aplicação, execute:

```sh
docker compose down
```

## Para entrar dentro do Container da Aplicação, execute:

```sh
docker exec -it web bash
```

## Para fazer build de um único serviço

```sh
docker compose build web-octane
```

## Para fazer subir um único serviço

```sh
docker compose up -d web-octane
```

## Para entrar dentro do container via Docker Compose

```sh
docker compose exec web-octane bash
```

# Solução de Problemas

## Problema de permissão

- Quando for criado novos arquivos, ou quando for a primeira inicialização do container com a aplicação, pode então haver um erro de permissão de acesso as pastas, neste caso, entre dentro do container da aplicação e execeute.

```sh
cd /var/www && \
chown -R www-data:www-data * && \
chmod -R o+w app
```

# Build e Push Docker Hub

```sh
docker compose build
```

```sh
 docker composer up
```

```sh
 docker composer up -d
```

```sh
 docker stats
```

```sh
 docker exec -it CONTAINER_ID bash
```

```sh
 docker compose push
```

```sh
 docker login
```

```sh
 docker logout
```

```sh
 docker run -p 80:80 -p 443:443 urnau/php82-app-2023:v1
```
