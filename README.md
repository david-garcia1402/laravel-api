# CRUD com API's usando Thunder Client

## Descrição

Este projeto consiste em um CRUD de usuários, no qual as operações de inserção, leitura, atualização e exclusão são realizadas através de chamadas a APIs. As informações do usuário são manipuladas utilizando a extensão Thunder Client (caso você queira, pode usar outros Clients API) no Visual Studio Code, proporcionando um gerenciamento eficiente das requisições.

## Instruções de Instalação

1. Monte seu ambiente virtual, no meu caso, utilizei o Sail Docker para Linux. Para mais informações, acesse: https://laravel.com/docs/10.x/sail#main-content

2. Clone este repositório em sua máquina local:

   ```bash
   git clone https://github.com/david-garcia1402/laravel-api.git
3. AVISO IMPORTANTE: deixe o 'Headers' do teu Thunder Client assim:

![image](https://github.com/david-garcia1402/laravel-api/assets/120138460/296266f1-d2aa-497f-b451-fe499fb00d76)


4. Abra o Visual Studio Code e certifique-se de ter a extensão Thunder Client instalada.

5. Execute o projeto e abra o Thunder Client para começar a interagir com as APIs.

# Exemplos de Uso
## Inserção de Usuário
```
POST http://localhost/users
Content-Type: application/json

{
  "name": "Nome do Usuário",
  "email": "usuario@email.com"
}

```
## Leitura de Usuários
```
GET http://localhost
```
## Atualização de Usuário
```
PATCH http://localhost/users/{id}
Content-Type: application/json

{
  "name": "Novo Nome do Usuário",
  "email": "usuario@email.com"
}
```
## Exclusão de Usuário
```
DELETE http://localhost/users/{id}
