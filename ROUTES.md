# API de Gerenciamento de Campeonatos de Futebol

## Endpoints

### Health Check

#### GET `/health-check`

Realiza uma verificação de saúde da API.

### Usuários

#### POST `/user`

Cria um novo usuário.

**Corpo da Solicitação (JSON):**

```json
{
    "email": "email",
    "name": "nome",
    "password": "senha"
}
```

#### PUT `/user`

Atualiza um usuário existente.

**Corpo da Solicitação (JSON):**

```json
{
    "email": "email",
    "name": "nome",
    "password": "senha"
}
```

### Autenticação

#### POST `/login`

Autentica um usuário e retorna um token de acesso.

**Corpo da Solicitação (JSON):**

```json
{
    "email": "email",
    "password": "senha"
}
```

**Nota:** Apartir desse endpoint requer autenticação.

#### POST `/logout`

Encerra a sessão do usuário.

### Jogadores

#### GET `/player`

Lista todos os jogadores.

#### GET `/player/{id}`

Lista jogadores por equipe.

**URL Params:**

-   `id=[uuid]`

#### POST `/player`

Cria um novo jogador.

**Corpo da Solicitação (JSON):**

```json
{
    "name": "nome",
    "shirt_number": "numero da camiseta",
    "team": "id do time"
}
```

#### PUT `/player/{id}`

Atualiza um jogador existente.

**URL Params:**

-   `id=[uuid]`

**Corpo da Solicitação (JSON):**

```json
{
    "name": "nome",
    "shirt_number": "numero da camiseta",
    "team": "id do time"
}
```

#### DELETE `/player/{id}`

Remove um jogador.

**URL Params:**

-   `id=[uuid]`

### Times

#### POST `/team`

Cria um novo time.

**Corpo da Solicitação (JSON):**

```json
{
    "name": "nome",
    "league": "id da liga"
}
```

#### GET `/team`

Lista todos os times.

#### PUT `/team/{id}`

Atualiza um time existente.

**URL Params:**

-   `id=[uuid]`

**Corpo da Solicitação (JSON):**

```json
{
    "name": "nome"
}
```

#### DELETE `/team/{id}`

Remove um time.

**URL Params:**

-   `id=[uuid]`

### Ligas

#### GET `/league/{id}`

Retorna detalhes de uma liga específica.

**URL Params:**

-   `id=[uuid]`

#### POST `/league`

Cria uma nova liga.

**Corpo da Solicitação (JSON):**

```json
{
    "name": "nome",
    "start": "data de inicio",
    "end": "data do termino"
}
```

#### PUT `/league/{id}`

Atualiza uma liga existente.

**URL Params:**

-   `id=[uuid]`

**Corpo da Solicitação (JSON):**

```json
{
    "name": ""
}
```

#### DELETE `/league/{id}`

Remove uma liga.

**URL Params:**

-   `id=[uuid]`

### Partidas

#### POST `/game`

Registra uma nova partida.

**Corpo da Solicitação (JSON):**

```json
{
    "day": "data",
    "start": "horario do inicio da partida",
    "end": "horario do termino previsto da partida",
    "league": "id da liga",
    "home_team": "id do time",
    "away_team": "id do time"
}
```

#### PATCH `/game/{id}`

Finaliza uma partida.

**URL Params:**

-   `id=[uuid]`

**Corpo da Solicitação (JSON):**

```json
{
    "players": [
        {
            "id": "id do jogador",
            "gols": "quantidade de gols"
        }
    ],
    "home_team_scoreboard": "quantidade de gols",
    "away_team_scoreboard": "quantidade de gols"
}
```

#### PUT `/game/{id}`

Atualiza detalhes de uma partida.

**URL Params:**

-   `id=[uuid]`

**Corpo da Solicitação (JSON):**

```json
{
    "day": "data",
    "start": "horario do inicio da partida",
    "end": "horario do termino previsto da partida",
    "league": "id da liga",
    "home_team": "id do time",
    "away_team": "id do time"
}
```

#### DELETE `/game/{id}`

Remove uma partida.

**URL Params:**

-   `id=[uuid]`
