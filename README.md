# TechGap Blog - Blog de Tecnología y 

## 📖 Sobre el Proyecto

**“El lenguaje cambia cuando cambia el contexto.
Y la tecnología es el mayor cambio de contexto que hemos vivido.”**

**TechGap Blog** es una plataforma de blog especializada en la **Inteligencia Artificial** y el **Lenguaje**, diseñada para compartir conocimientos, análisis, pensamientos y las últimas tendencias en estas tecnologías emergentes.

### 🎯 Características Principales

**Tecnología desde el lenguaje**
Artículos que analizan cómo la tecnología (apps, IA, interfaces, plataformas) transforma la forma en que hablamos, escribimos, pensamos y tomamos decisiones.

**Lingüística aplicada al mundo digital**
Explicación de conceptos lingüísticos (pragmática, semántica, actos de habla, contexto, significado) usando ejemplos reales de tecnología, redes sociales, UX y comunicación digital.

**IA y lenguaje humano**
Contenido crítico y divulgativo sobre inteligencia artificial desde una perspectiva lingüística: qué significa “entender”, qué hace realmente un modelo de lenguaje y cómo cambia nuestra relación con las palabras.

**Análisis de lenguaje cotidiano y profesional**
Observación de cómo hablamos en el trabajo, en chats, en interfaces y en plataformas digitales, y qué implicaciones sociales, culturales y emocionales tiene ese lenguaje.

**Categorización por temas y fenómenos lingüísticos**
Organización de los artículos por conceptos (lenguaje digital, IA, UX, mutaciones del lenguaje, poder y discurso), no solo por tecnología o herramienta.

**Espacio de reflexión y diálogo**
Sistema de comentarios moderados para fomentar conversaciones cuidadas, críticas y respetuosas sobre lenguaje, tecnología y sociedad.

**Arquitectura moderna y sostenible**
Plataforma construida con Laravel, Filament y Docker, pensada para crecer de forma ordenada, mantener el contenido a largo plazo y facilitar la gestión editorial.

### 🛠️ Stack Tecnológico

- **Backend:** Laravel 12 + PHP 8.5
- **Frontend:** Blade Templates + Tailwind CSS + Vite
- **Base de Datos:** MySQL 8.0
- **Admin Panel:** Filament v4
- **Containerización:** Docker + Docker Compose
- **Automatización:** n8n para workflows

---

## 🚀 Guía de Desarrollo

> **Nota:** Esta es la documentación técnica para desarrolladores. Si solo quieres conocer el proyecto, lee la sección anterior.

## 📋 Requisitos Previos

- **Docker** y **Docker Compose** instalados
- **Git** para clonar el repositorio
- **Node.js** (opcional, solo si quieres ejecutar comandos npm localmente)

## 🚀 Configuración Inicial

### 1. Clonar el Repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
cd techgap-blog
```

### 2. Configurar Variables de Entorno

#### ⚠️ IMPORTANTE: Configurar el archivo .env

El proyecto incluye un archivo `.env.example`. **DEBES** crear tu archivo `.env`:

```bash
# Copiar el archivo de ejemplo
cp .env.example .env
```

```

## 🐳 Levantar el Entorno Docker

### 3. Construir y Levantar los Contenedores

```bash
# Construir sin cache (primera vez o cambios importantes)
docker-compose build --no-cache

# Levantar todos los servicios
docker-compose up -d
```

### 4. Verificar que Todo Esté Funcionando

```bash
# Verificar estado de contenedores
docker-compose ps

# Verificar logs de la aplicación
docker logs techgap-app --tail 20

# Probar la aplicación
curl -I http://localhost:8000
```

**✅ Deberías ver:** `HTTP/1.1 200 OK`

## 📦 Gestión de Dependencias

### NPM/Node.js - Assets Frontend

#### Opción A: Usar Node.js dentro del contenedor (Recomendado)

```bash
# Instalar dependencias
docker exec -it techgap-app npm install

# Compilar assets para producción
docker exec -it techgap-app npm run build

# Modo desarrollo con watch
docker exec -it techgap-app npm run dev
```

#### Opción B: Instalar Node.js localmente

Si prefieres tener Node.js en tu máquina local:

1. **Instalar Node.js:** https://nodejs.org (versión LTS recomendada)

2. **Instalar dependencias:**
   ```bash
   npm install
   ```

3. **Comandos de desarrollo:**
   ```bash
   # Compilar para desarrollo
   npm run dev
   
   # Compilar para producción
   npm run build
   
   # Modo watch (desarrollo)
   npm run dev -- --watch
   ```

### Composer - Dependencias PHP

Las dependencias PHP se instalan automáticamente en el Docker build, pero si necesitas agregar nuevas:

```bash
# Instalar nueva dependencia
docker exec -it techgap-app composer require nombre/paquete

# Actualizar dependencias
docker exec -it techgap-app composer update

# Instalar dependencias manualmente
docker exec -it techgap-app composer install
```

## 🗄️ Base de Datos

### 5. Migraciones y Seeders

Las migraciones se ejecutan automáticamente al levantar el contenedor, pero si necesitas ejecutarlas manualmente:

```bash
# Ejecutar migraciones
docker exec -it techgap-app php artisan migrate

# Reset completo de base de datos (CUIDADO: elimina todos los datos)
docker exec -it techgap-app php artisan migrate:fresh

# Ejecutar seeders
docker exec -it techgap-app php artisan db:seed
```

### 6. Acceso a la Base de Datos

#### Via phpMyAdmin (Interfaz Web)
- **URL:** http://localhost:8081
- **Usuario:** `techgap`
- **Contraseña:** `secret`

#### Via línea de comandos
```bash
# Acceder a MySQL desde el contenedor
docker exec -it techgap-db mysql -u techgap -psecret techgap_blog

# Desde tu máquina local (Puerto 3307)
mysql -h 127.0.0.1 -P 3307 -u techgap -psecret techgap_blog
```


## 🔗 URLs de Acceso

| Servicio | URL | Credenciales |
|----------|-----|--------------|
| **Laravel App** | http://localhost:8000 | - |
| **phpMyAdmin** | http://localhost:8081 | Usuario: `techgap` / Pass: `secret` |
| **n8n (Automatización)** | http://localhost:5678 | Usuario: `admin` / Pass: `admin` |

## 🛠️ Comandos Útiles

### Gestión de Contenedores

```bash
# Ver contenedores en ejecución
docker-compose ps

# Ver logs
docker logs techgap-app
docker logs techgap-db

# Entrar a un contenedor
docker exec -it techgap-app bash
docker exec -it techgap-db bash

# Reiniciar un servicio
docker-compose restart app

# Parar todos los servicios
docker-compose down

# Parar y eliminar volúmenes (CUIDADO: elimina la base de datos)
docker-compose down --volumes
```

### Laravel Artisan

```bash
# Limpiar caches
docker exec -it techgap-app php artisan cache:clear
docker exec -it techgap-app php artisan config:clear
docker exec -it techgap-app php artisan view:clear

# Generar clave de aplicación
docker exec -it techgap-app php artisan key:generate

# Ver rutas
docker exec -it techgap-app php artisan route:list

# Crear nueva migración
docker exec -it techgap-app php artisan make:migration create_ejemplo_table

# Crear nuevo modelo
docker exec -it techgap-app php artisan make:model Ejemplo
```


## 🚨 Solución de Problemas

### Problema: "Empty reply from server" 

**Causa:** Los assets de Vite no están compilados.

**Solución:**
```bash
docker exec -it techgap-app npm run build
```

### Problema: Error de conexión a base de datos

**Verificar:**
1. Que `DB_HOST=db` en tu `.env`
2. Que el contenedor de MySQL esté corriendo: `docker-compose ps`
3. Logs de MySQL: `docker logs techgap-db`

**Solución:**
```bash
# Reiniciar servicios
docker-compose restart db app
```

### Problema: Error de permisos

```bash
# Arreglar permisos de Laravel
docker exec -it techgap-app chown -R www-data:www-data storage bootstrap/cache
docker exec -it techgap-app chmod -R 775 storage bootstrap/cache
```

### Problema: Error "APP_KEY missing"

```bash
docker exec -it techgap-app php artisan key:generate --force
```

### Problema: Error 500 - Vite manifest not found

```bash
# Instalar dependencias y compilar assets
docker exec -it techgap-app npm install
docker exec -it techgap-app npm run build
```

## 🔄 Workflow de Desarrollo

### Para comenzar a trabajar:

1. **Clonar y configurar:**
   ```bash
   git clone <repo>
   cd techgap-blog
   cp .env.example .env  # ← IMPORTANTE
   ```

2. **Levantar entorno:**
   ```bash
   docker-compose up -d
   ```

3. **Compilar assets (si es necesario):**
   ```bash
   docker exec -it techgap-app npm run build
   ```

4. **Verificar que funciona:**
   ```bash
   curl -I http://localhost:8000
   ```

### Para trabajar con assets en desarrollo:

```bash
# Modo watch para cambios automáticos
docker exec -it techgap-app npm run dev
```

### Para parar el entorno:

```bash
docker-compose down
```

## 🏗️ Arquitectura del Proyecto

```
techgap-blog/
├── app/                 # Lógica de la aplicación Laravel
├── database/           # Migraciones, seeders, factories
├── resources/          # Vistas, assets, idiomas
├── docker/            # Configuración de Docker
├── public/            # Punto de entrada web
├── .env              # Variables de entorno (configurar)
├── docker-compose.yml # Orquestación de contenedores
└── Dockerfile        # Imagen de la aplicación
```



