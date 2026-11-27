# SkySync

Sistema de gestão de um aeroporto: voos, escalas, companhias aéreas, aviões, passageiros, bilhetes e bagagem.

Projeto desenvolvido no âmbito da unidade curricular de Projeto de Sistemas de Informação (PSI) e Plataformas de Sistemas de Informação (PLATSI) do TeSP em Programação de Sistemas de Informação — Politécnico de Leiria (ESTG), 2026/27.

> A app mobile para passageiros está em [SkySync Mobile](https://github.com/2025106693-cyber/SkySync_Mobile).

---

## Sobre o projeto

O SkySync gere a operação de **um único aeroporto com vários voos**. Permite:

- **Gestão de voos**: número, origem, destino, horários, porta de embarque, estado e preço base
- **Escalas** de cada voo, ordenadas
- **Companhias aéreas e aviões** (a capacidade do avião define a lotação máxima do voo)
- **Passageiros**, identificados por passaporte ou cartão de cidadão
- **Bilhetes**: preço total = preço base do voo + itens de bagagem, e estado do check-in
- **Aeroportos** importados de uma API externa ([airportsapi.com](https://airportsapi.com))
- **API REST** para a aplicação mobile

A reserva física após a compra do bilhete é tratada no atendimento presencial e está fora do âmbito do sistema.

---

## Perfis de utilizador (RBAC)

| Perfil | Acesso |
|---|---|
| **Administrador** | Gestão total, incluindo utilizadores e permissões. É o único que pode desativar contas |
| **Gestor Operacional** | Gestão de voos, escalas, aviões, companhias e bilhetes |
| **Passageiro** | Consulta dos seus bilhetes, voos e check-in |
| **Visitante** | Consulta pública de voos (sem conta) |

Os utilizadores **nunca são eliminados**: são desativados (*soft delete*).

---

## Tecnologias

- **PHP** com **Yii2** (template *advanced*)
- **MySQL**
- **RBAC** do Yii2 com `DbManager`
- **API REST** (Yii2 `ActiveController`)
- Integração com **airportsapi.com**
- Bootstrap 5 

---

## Estrutura

```
skysync/
├── backend/     # Área de gestão (Administrador, Gestor Operacional)
├── frontend/    # Área pública (Passageiro, Visitante)
├── common/      # Modelos e configuração partilhados
├── console/     # Migrações e comandos (ex.: inicialização do RBAC)
└── api/    # Módulo da API REST - Em desenvolvimento
```

---

## Modelo de dados (resumo)

`User` · `Passageiro` · `CompanhiaAerea` · `Aviao` · `Aeroporto` · `Voo` · `Escala` · `Bilhete` · `ItemBilhete (bagagem)`

---

## Instalação

**Requisitos:** PHP 8.x, Composer, MySQL/MariaDB e um servidor web (Apache/WAMP/XAMPP).

```bash
# 1. Clonar o repositório
git clone [url-do-repositório](https://github.com/2025106693-cyber/SkySync.git)
cd skysync

# 2. Instalar dependências
composer install

# 3. Inicializar o ambiente (escolher "Development")
php init
```

4. Criar a base de dados `skysync` e configurar a ligação em `common/config/main-local.php`:

```php
'db' => [
    'class' => \yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=skysync',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
],
```

```bash
# 5. Tabelas do RBAC
php yii migrate --migrationPath=@yii/rbac/migrations

# 6. Tabelas do projeto
php yii migrate

# 7. Criar perfis e permissões
php yii rbac/init
```

8. Apontar o servidor web para `frontend/web` e `backend/web`.

---

Desenvolvido em equipa com GitHub Flow (branches + pull requests).
