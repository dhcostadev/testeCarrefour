## Sobre o Desafio

DESCRITIVO DA SOLUÇÃO:

Um comerciante precista controlar o seu fluxo de caixa diário com os lançamentos (débitos e créditos), também precisa de um relatório que disponibilize o saldo diário consolidado.

REQUISITOS DE NEGOCIO:

```
- Serviço que faça o controle de lançamentos.
- Serviço do consolidado diário
```

## Executar o projeto em sua máquina local, passo a passo:

1. Para executar o projeto é necessário clonar o projeto para sua máquina local.
    - https://github.com/dhcostadev/testeCarrefour.git


2. Dentro da pasta do projeto, terá que buildar(lavantar) a aplicação utilizando a sequência de comandos a seguir, siga os passos:
    - docker-compose build && docker-compose up -d
    - docker-compose ps or docker ps (ambos os comandos irão listar os containers)
    - composer install
    - Acesse a aplicação em seu navegador com a url:
        - http://localhost:8088 (Esta é a porta configurada para o projeto)


3. Para acessar a base de dados é necessário alguns comandos, segue:
    - docker exec -it mysql bash (Isso irá acessar o o terminal como root)
    - mysql -u root -p
        - Insira aqui o password da sua base de dados(verifique a senha que colocou no seu .env)
        - Logado no mysql verifique se sua base de dados foi criada;
        - Para sair do terminal do mysql basta digitar "exit" (sem aspas)


4. Gerando as migrations para a base de dados com o comando, segue:
    - Abra outro terminal em seu projeto:
        - Digite no terminal:
            - docker-compose exec app php artisan migrate
    - Agora verifique em sua base de dados se suas tabelas foram geradas [verifique passo 3]

    - Poderá acessar o phpMyAdmin no navegador pela porta: http://localhost:3400
        - Basta inserir o usuário e senha do mysql que foram configurados no arquivo .env
    - Poderá também popular as tabelas utilizando o comando:
        - docker-compose exec app php artisan db:seed


5. PARE | INICIE seus containers na aplicação, segue:
    - docker-compose stop
    - docker-compose start
    Ambos os comandos precisam ser executados dentro do projeto (só pra ressaltar)


6. Derrube os containers na sua aplicação, segue:
    - docker-compose down --volumes


*Nota:*`Para o projeto executar perfeitamente será necessário ter o docker instalado em sua máquina.`

7. Tecnologias utilizadas
 - Laravel Framework 9.52.6
 - PHP 8.2.5
 - Mysql:5.7.22
 - Docker
 
### DOCUMENTAÇÃO DO DOCKER PARA INSTALAÇÃO

- **[Link Docker](https://docs.docker.com/engine/install/)**
