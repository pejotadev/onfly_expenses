# Projeto API Rest Laravel com Frontend Quasar Vue 3

## Descrição

Este projeto consiste em uma API Rest desenvolvida com Laravel e um frontend utilizando Quasar Vue 3. A API oferece um sistema de autenticação de usuários e um CRUD para gerenciamento de despesas.

## Recursos

### Backend (Laravel)

- **Autenticação de Usuário**: Implementada para garantir a segurança e privacidade dos dados.
- **CRUD de Despesas**: Permite criar, ler, atualizar e deletar despesas.
- **Restrição de Acesso**: Acessos ao CRUD são restritos aos usuários relacionados a cada despesa.
- **Validações**: Incluem verificação de existência do usuário, data não futura, valor não negativo, e descrição com até 191 caracteres.
- **Envio de E-mail**: Ao registrar uma despesa, um e-mail é enviado ao usuário relacionado, com o título "Despesa Cadastrada".

### Frontend (Quasar Vue 3)

- **Gestão de Despesas**: Interface para gerenciamento de despesas utilizando a API.

## Boas Práticas e Padrões Utilizados

- **Form Request**: Para validação na API.
- **API Resources**: Para a camada de transformação da API.
- **Resource Routes**: Na camada de roteamento.
- **Testes Unitários**: Implementados para garantir a qualidade do código.
- **Policies**: Para a camada de restrição de acesso.
- **Notifications**: Utilizadas para o envio de e-mails, colocados em fila para disparo assíncrono.
- **Migrations e Relations dos Models**: Assegurando a integridade e relações entre os dados.

## Documentação

A documentação detalhada é essencial para o entendimento e uso eficiente da API e do frontend.

**Nota**: Esta documentacao ainda esta incompleta

## Como iniciar o projeto

A documentação de como iniciar o server e o client esta nos seus respectivos **readme.md**

## API reference

### POST /register

```http
  POST /api/register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### POST /login

```http
  POST /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### GET /user

```http
  GET /api/user
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### POST /user

```http
  POST /api/user
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### PUT /user/{id}

```http
  PUT /api/user/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### DELETE /user/{id}

```http
  DELETE /api/user/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### GET /expenses

```http
  GET /api/expenses
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### POST /expenses

```http
  POST /api/expenses
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### PUT /expenses/{id}

```http
  PUT /api/expenses/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```


### DELETE /expenses/{id}

```http
  DELETE /api/expenses/{id}
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `param`   | `type`   | **Required**. Description |

#### Result
```code
HTTP/1.1 200 OK
X-Powered-By: Express
Access-Control-Allow-Origin: *
Content-Type: text/html; charset=utf-8
Content-Length: 23
ETag: W/"17-4nF6ICodSzi3RHNfgXPMRFtuCUU"
Date: Sat, 20 Jan 2024 23:11:01 GMT
Connection: close

{
  "data": "Example data"
}
```



## Testes

```
   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\ExampleTest
  ✓ the application returns a successful response                                                   0.07s

   PASS  Tests\Feature\ExpensesTest
  ✓ create user                                                                                     0.05s
  ✓ get auth                                                                                        0.01s
  ✓ create expense                                                                                  0.01s
  ✓ get expenses                                                                                    0.01s
  ✓ delete user                                                                                     0.01s

   PASS  Tests\Feature\UserTest
  ✓ create user                                                                                     0.01s
  ✓ get auth                                                                                        0.01s
  ✓ get user                                                                                        0.02s
  ✓ delete user                                                                                     0.01s

  Tests:    11 passed (17 assertions)
  Duration: 0.27s
```

## Estrutura de Pastas

```bash
|___server
| |___database
| | |___migrations
| | | |___2019_12_14_000001_create_personal_access_tokens_table.php
| | | |___2014_10_12_100000_create_password_reset_tokens_table.php
| | | |___2014_10_12_000000_create_users_table.php
| | | |___2019_08_19_000000_create_failed_jobs_table.php
| | | |___2024_01_26_232352_expenses.php
| | |___.gitignore
| | |___seeders
| | | |___DatabaseSeeder.php
| | |___factories
| | | |___UserFactory.php
| |___composer.lock
| |___.DS_Store
| |___phpunit.xml
| |___bootstrap
| | |___app.php
| | |___cache
| | | |___services.php
| | | |___packages.php
| | | |___.gitignore
| |___app
| | |___.DS_Store
| | |___Mail
| | | |___MailableClass.php
| | |___Providers
| | | |___AppServiceProvider.php
| | | |___AuthServiceProvider.php
| | | |___RouteServiceProvider.php
| | | |___BroadcastServiceProvider.php
| | | |___EventServiceProvider.php
| | |___Models
| | | |___User.php
| | | |___Expenses.php
| | |___Exceptions
| | | |___Handler.php
| | |___Policies
| | | |___ExpensesPolicy.php
| | |___Http
| | | |___Middleware
| | | | |___VerifyCsrfToken.php
| | | | |___RedirectIfAuthenticated.php
| | | | |___TrimStrings.php
| | | | |___Authenticate.php
| | | | |___TrustProxies.php
| | | | |___ValidateSignature.php
| | | | |___PreventRequestsDuringMaintenance.php
| | | | |___EncryptCookies.php
| | | | |___TrustHosts.php
| | | |___.DS_Store
| | | |___Resources
| | | | |___UserResource.php
| | | |___Requests
| | | | |___createUserRequest.php
| | | | |___createExpenseRequest.php
| | | | |___createAuthRequest.php
| | | |___Controllers
| | | | |___UserController.php
| | | | |___Controller.php
| | | | |___AuthController.php
| | | | |___ExpensesController.php
| | | |___Kernel.php
| | |___Console
| | | |___Kernel.php
| |___config
| | |___sanctum.php
| | |___hashing.php
| | |___auth.php
| | |___app.php
| | |___mail.php
| | |___services.php
| | |___database.php
| | |___cache.php
| | |___session.php
| | |___queue.php
| | |___broadcasting.php
| | |___view.php
| | |___cors.php
| | |___logging.php
| | |___filesystems.php
| |___resources
| | |___css
| | | |___app.css
| | |___js
| | | |___bootstrap.js
| | | |___app.js
| | |___views
| | | |___welcome.blade.php
| | | |___emails
| | | | |___email.blade.php
| |___tests
| | |___Unit
| | | |___ExampleTest.php
| | |___CreatesApplication.php
| | |___Feature
| | | |___UserTest.php
| | | |___ExampleTest.php
| | | |___ExpensesTest.php
| | | |___HealthCheckTest.php
| | |___TestCase.php
| |___vite.config.js
| |___.editorconfig
| |___storage
| | |___app
| | | |___public
| | | | |___.gitignore
| | | |___.gitignore
| | |___framework
| | |___logs
| | | |___laravel.log
| | | |___.gitignore
| |___README.md
| |___artisan
| |___public
| | |___favicon.ico
| | |___index.php
| | |___robots.txt
| | |___.htaccess
| |___.gitignore
| |___package.json
| |___.env
| |___.gitattributes
| |___.env.example
| |___endpoints.http
| |___routes
| | |___channels.php
| | |___console.php
| | |___web.php
| | |___api.php
| |___composer.json
| |___.phpunit.result.cache
|___readme.md

|___client
| |___jsconfig.json
| |___index.html
| |___.DS_Store
| |___postcss.config.cjs
| |___.eslintrc.cjs
| |___.quasar
| | |___client-prefetch.js
| | |___quasar-user-options.js
| | |___client-entry.js
| | |___app.js
| |___.npmrc
| |___.editorconfig
| |___README.md
| |___public
| | |___favicon.ico
| | |___icons
| | | |___favicon-16x16.png
| | | |___favicon-128x128.png
| | | |___favicon-96x96.png
| | | |___favicon-32x32.png
| |___.gitignore
| |___package-lock.json
| |___package.json
| |___.env
| |___.eslintignore
| |___.vscode
| | |___settings.json
| | |___extensions.json
| |___quasar.config.js
| |___src
| | |___App.vue
| | |___axios.js
| | |___.DS_Store
| | |___boot
| | | |___.gitkeep
| | |___css
| | | |___app.css
| | |___plugins
| | |___components
| | | |___ExpensesTable.vue
| | |___layouts
| | | |___MainLayout.vue
| | |___assets
| | | |___quasar-logo-vertical.svg
| | |___pages
| | | |___LoginPage.vue
| | | |___ExpensesPage.vue
| | | |___IndexPage.vue
| | | |___ErrorNotFound.vue
| | | |___ExpenseManagePage.vue
| | | |___HomePage.vue
| | |___services
| | | |___expensesService.js
| | |___store
| | | |___store-flag.d.ts
| | | |___index.js
| | | |___expensesModule.js
| | |___router
| | | |___index.js
| | | |___routes.js
```
