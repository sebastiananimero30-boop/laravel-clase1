# Bitácora — Clase 1: Laravel

---

## 1. Los 5 comandos Artisan más usados hoy

| # | Comando | ¿Qué hace? |
|---|---------|------------|
| 1 | `php artisan serve` | Levanta el servidor de desarrollo en `http://localhost:8000` |
| 2 | `php artisan migrate` | Ejecuta las migraciones pendientes y crea las tablas en la base de datos |
| 3 | `php artisan key:generate` | Genera la `APP_KEY` en el archivo `.env`, necesaria para cifrado y sesiones |
| 4 | `php artisan route:list` | Muestra todas las rutas registradas en la aplicación |
| 5 | `php artisan make:model NombreModelo` | Crea un nuevo modelo Eloquent en `app/Models/` |

---

## 2. Diferencia entre `.env` y `config/`

### `.env` — Variables de entorno
- Es un archivo de **configuración local**, específico de cada máquina o servidor.
- Guarda valores sensibles o que cambian por entorno: contraseñas, claves de API, nombre de la base de datos, modo debug, etc.
- **Nunca se sube a GitHub** (está en `.gitignore`).
- Ejemplo:
  ```
  APP_ENV=local
  APP_DEBUG=true
  DB_CONNECTION=sqlite
  ```

### `config/` — Archivos de configuración de la app
- Son archivos PHP que definen **cómo se comporta la aplicación**.
- Leen los valores del `.env` usando la función `env()`.
- Sí se suben a GitHub porque no contienen datos sensibles.
- Ejemplo en `config/app.php`:
  ```php
  'debug' => env('APP_DEBUG', false),
  ```

### Resumen
| | `.env` | `config/` |
|---|--------|-----------|
| Contiene | Valores sensibles / por entorno | Estructura y defaults de la app |
| Se sube a Git | ❌ No | ✅ Sí |
| Formato | Clave=Valor | Arrays PHP |
| Quién lo lee | Laravel al arrancar | El código de la app |

---

## 3. ¿Qué hace `Route::get()` en `web.php`?

`Route::get()` registra una ruta HTTP de tipo **GET** en la aplicación.

### Sintaxis
```php
Route::get('/ruta', función_o_controlador);
```

### Parámetros
- **Primer parámetro:** la URL que el usuario visita (ej. `'/bienvenida'`).
- **Segundo parámetro:** lo que se ejecuta cuando se accede a esa URL. Puede ser:
  - Un **closure** (función anónima) que retorna una vista o texto.
  - Un **controlador** en formato `[NombreController::class, 'metodo']`.

### Ejemplo usado hoy
```php
Route::get('/bienvenida', function () {
    return view('bienvenida');
});
```
Cuando el usuario visita `http://localhost:8000/bienvenida`, Laravel ejecuta la función y retorna la vista `resources/views/bienvenida.blade.php`.

### ¿Por qué GET y no POST?
- `GET` se usa para **mostrar** información (páginas, vistas).
- `POST` se usa para **enviar** datos (formularios, creación de recursos).
- Laravel también ofrece `Route::post()`, `Route::put()`, `Route::delete()`, etc.
