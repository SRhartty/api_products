
# API PRODUTOS

Api feita com intuito de estudar o back-end use a vontade


# Crie O arquivo .env usando o .env.example e atualize seus dados do banco de dados!!!

## FUNCIONALIDADES

- Criar token de acesso
- Criar usuario
- Atualizar usuario
- Obter todos os usuarios
- Obter apenas um usuario
- Deletar usuario
- Criar produto
- Atualizar produto
- Obter todos os produtos
- Obter apenas um produto


## API ENDPOINTS

#### Cadastrar um usuario

```http
  POST /users
```

| Parametro | Tipo  | Descrição             |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. |
| `email`| `string` | **Required**. |
| `password`| `string` | **Required**. |
| `image`| `file` | **Optional** |

#### Obter um usuario

```http
  GET /users/${id}
```

#### Obter todos os usuarios

```http
  GET /users
```

#### Atualizar um usuario

```http
  POST /users/${id}
```

| Parametro | Tipo  | Descrição             |
| :-------- | :------- | :------------------------- |
|`_method` | `PUT` |  **Required**. |
| `name` | `string` | **Required**. |
| `email`| `string` | **Required**. |
| `password`| `string` | **Required**. |
| `image`| `file` | **Optional** |

#### Deletar um usuario

```http
  DELETE /users/${id}
```

#### Obter token de acesso

```http
  POST /token
```

| Parametro | Tipo  | Descrição             |
| :-------- | :------- | :------------------------- |
| `email`| `string` | **Required**. |
| `password`| `string` | **Required**. |
| `token_name`| `string` | **Required**. |

Para obter o token deve ser cadastrado o usuario previamente e usar suas as credenciais nestes parametros.


#### Obter todos os produtos

```http
  GET /products
```

#### Obter um unico produto

```http
  GET /products/${id}
```

#### Deletar um produto

```http
  DELETE /products/${id}
```

#### Cadastrar um produto

```http
  POST /products
```

| Parametro | Tipo  | Descrição             |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. |
| `description`| `string` | **Required**. |
| `short_descripton`| `string` | **Required**. |
| `galery_images`| `array` |**Optional** |array de arquivos jpeg/jpg/png|
| `sku` | `string` | **Required**. |
| `stock` | `int` | **Required**. |
| `price` | `double` | **Required**. |


#### Atualizar um produto

```http
  POST /products/${id}
```

| Parametro | Tipo  | Descrição             |
| :-------- | :------- | :------------------------- |
|`_method` | `PUT` |  **Required**. |
| `name` | `string` | **Required**. |
| `description`| `string` | **Required**. |
| `short_descripton`| `string` | **Required**. |
| `galery_images`| `array` |**Optional** |array de arquivos jpeg/jpg/png|
| `sku` | `string` | **Required**. |
| `stock` | `int` | **Required**. |
| `price` | `double` | **Required**. |







## Authors

- [@SRhartty](https://github.com/SRhartty)

