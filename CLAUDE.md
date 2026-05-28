# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project overview

PHP REST API for a hardware store (ferretería) management system. No frameworks, no classes — pure procedural PHP organized in an MVC pattern. All responses are JSON.

## Running the server

Requires XAMPP (MySQL running) and PHP 8+.

```bash
C:\xampp\php\php.exe -S localhost:8000 -t public
```

Configure `.env` (copy from `.env.example`) with MySQL credentials before starting.

## Database setup

With the server running, hit `GET /setup` once to create the database and all tables. This calls `crear_tablas()` in `database/setup.php`, which uses `CREATE TABLE IF NOT EXISTS` so it is idempotent.

## Architecture

**Request lifecycle:** `public/index.php` → `dispatch()` in `routes/web.php` → controller function → model function → `json_response()`.

**Key conventions:**
- Routes are plain strings (`'GET /clientes'`) mapped to bare function names in `routes()`.
- Every controller function calls `json_response()` (from `config/helpers.php`), which `echo`s JSON and `exit`s.
- `db()` in `config/database.php` is a singleton returning a shared PDO connection. `db_server()` in `database/setup.php` connects without a database name (used only to create the DB itself).
- Model functions follow the pattern `{entity}_all()`, `{entity}_find(int $id)`, `{entity}_create(array $data)`. They call `only_fields()` to whitelist input and `fill_missing()` to apply defaults before inserting.
- Adding a new resource requires: a model file, a controller file, new entries in `bootstrap.php` (`require_once` for both), and new route entries in `routes/web.php`.

**`config/bootstrap.php`** is the single aggregation point — it loads `.env`, database, helpers, `database/setup.php`, all models, all controllers, and `routes/web.php` in order.

## Adding a new entity

1. Create `models/{entity}.php` with `{entity}_all()`, `{entity}_find()`, `{entity}_create()`.
2. Create `controllers/{entity}_controller.php` with `{entity}_index()` and `{entity}_store()`.
3. Add `require_once` lines for both files in `config/bootstrap.php`.
4. Add `'GET /{entities}'` and `'POST /{entities}'` entries in `routes()` inside `routes/web.php`.
5. Add the table DDL to `crear_tablas()` in `database/setup.php` using `CREATE TABLE IF NOT EXISTS`.
