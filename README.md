# laravel-clase1

Proyecto introductorio de Laravel desarrollado en clase. Incluye rutas básicas, vistas Blade y documentación de los conceptos fundamentales del framework.

---

## Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 18 y npm

---

## Pasos de instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/TU_USUARIO/laravel-clase1.git
cd laravel-clase1
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Crear el archivo de entorno
```bash
cp .env.example .env
```

### 4. Generar la clave de la aplicación
```bash
php artisan key:generate
```

### 5. Crear la base de datos SQLite
```bash
touch database/database.sqlite
```

### 6. Ejecutar las migraciones
```bash
php artisan migrate
```

### 7. Instalar dependencias de Node y compilar assets
```bash
npm install
npm run build
```

### 8. Iniciar el servidor de desarrollo
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

---

## Rutas disponibles

| Ruta | Descripción |
|------|-------------|
| `/` | Página de bienvenida por defecto de Laravel |
| `/bienvenida` | Vista personalizada con mensaje de bienvenida |

---

## Estructura del proyecto

```
laravel-clase1/
├── app/
│   ├── Http/Controllers/   # Controladores
│   └── Models/             # Modelos Eloquent
├── database/
│   └── migrations/         # Migraciones de la base de datos
├── resources/
│   └── views/              # Vistas Blade
│       ├── welcome.blade.php
│       └── bienvenida.blade.php
├── routes/
│   └── web.php             # Rutas de la aplicación web
├── bitacora.md             # Documentación de la clase
└── .env.example            # Plantilla de variables de entorno
```

---

## Documentación

Revisa el archivo [`bitacora.md`](./bitacora.md) para encontrar:
- Los 5 comandos Artisan más usados
- Diferencia entre `.env` y `config/`
- Explicación de `Route::get()`
