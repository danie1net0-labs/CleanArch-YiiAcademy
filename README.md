# CleanArch-YiiAcademy
Exemplos da [playlist sobre Arquitetura Limpa](https://www.youtube.com/playlist?list=PLBD8to5dJhvyr07t03AjYYQ_8LNHrQKF4) do canal da Yii Academy.

## Executando o projeto

1. Crie o arquivo **.db.env**:

```
$ cp .db.env.example .db.env
```

2. Especifique os parâmetros do banco a ser criado no arquivo **.db.env**, como no exemplo:

```
POSTGRES_USER=clean_arch
POSTGRES_PASSWORD=clean_arch
POSTGRES_DB=clean_arch
```

3. Suba os containers:

```
$ docker-compose up -d
```

4. Instale as dependências:

```
$ docker exec -i clean_arch_app composer install
```

5. Execute o script **database/db.sql** para criar as tabelas no banco de dados:

```
$ docker exec -i clean_arch_db psql -U clean_arch < database/db.sql
```


6. Acesse o projeto em ``http://localhost:8080``