# FNAF: Into The Pit - Sistema de Autenticación MVC

## Descripción
Sistema de autenticación con arquitectura MVC (Modelo-Vista-Controlador) para el juego FNAF: Into The Pit, desarrollado en PHP vanilla.

## Estructura del Proyecto
```
fnaf/
├── config/
│   ├── database.php      # Configuración de base de datos
│   └── database.sql      # Script SQL para crear la BD
├── controllers/
│   └── AuthController.php # Controlador de autenticación
├── models/
│   └── User.php          # Modelo de usuario
├── views/
│   ├── login.php         # Vista de login
│   ├── register.php      # Vista de registro
│   └── dashboard.php     # Vista del dashboard
├── public/
│   └── assets/
│       └── css/
│           └── styles.css # Estilos CSS
├── index.php             # Enrutador principal
├── login.php             # Acceso directo al login
├── register.php          # Acceso directo al registro
└── dashboard.php         # Acceso directo al dashboard
```

## Instalación

### 1. Configurar XAMPP
- Asegúrate de tener XAMPP instalado y funcionando
- Inicia Apache y MySQL desde el panel de control de XAMPP

### 2. Configurar Base de Datos
1. Abre phpMyAdmin (http://localhost/phpmyadmin)
2. Ejecuta el script SQL ubicado en `config/database.sql`
3. Esto creará la base de datos `fnaf_db` y la tabla `users`

### 3. Configurar Conexión
- Revisa el archivo `config/database.php`
- Ajusta las credenciales si es necesario:
  - Host: localhost
  - Base de datos: fnaf_db
  - Usuario: root
  - Contraseña: (vacía por defecto)

## Uso

### Acceso al Sistema
- **URL Principal**: http://localhost/fnaf/
- **Login Directo**: http://localhost/fnaf/login.php
- **Registro Directo**: http://localhost/fnaf/register.php

### Funcionalidades

#### Registro de Usuario
- Formulario de registro con validaciones
- Campos: Usuario, Email, Contraseña, Confirmar Contraseña
- Validaciones:
  - Todos los campos son obligatorios
  - Email debe ser válido
  - Contraseña mínimo 6 caracteres
  - Las contraseñas deben coincidir
  - Usuario y email únicos

#### Inicio de Sesión
- Login con usuario y contraseña
- Validación de credenciales
- Manejo de sesiones PHP
- Redirección automática al dashboard

#### Dashboard
- Panel principal del usuario autenticado
- Muestra información del usuario conectado
- Fecha y hora actuales
- Botón de cerrar sesión
- Protegido por autenticación

### Usuario de Prueba
Se incluye un usuario de prueba:
- **Usuario**: admin
- **Email**: admin@fnaf.com
- **Contraseña**: 123456

## Características Técnicas

### Arquitectura MVC
- **Modelo**: Manejo de datos y lógica de negocio
- **Vista**: Presentación e interfaz de usuario
- **Controlador**: Lógica de aplicación y enrutamiento

### Seguridad
- Contraseñas hasheadas con `password_hash()`
- Validación y sanitización de datos
- Protección contra inyección SQL con PDO
- Manejo seguro de sesiones
- Validación de formularios

### Base de Datos
- MySQL con PDO
- Charset UTF-8
- Estructura normalizada
- Timestamps automáticos

## Troubleshooting

### Errores Comunes
1. **Error de conexión a BD**: Verificar que MySQL esté ejecutándose
2. **Tabla no existe**: Ejecutar el script SQL
3. **Estilos no cargan**: Verificar rutas de CSS
4. **Sesiones no funcionan**: Verificar configuración de PHP

### Logs
- Los errores se muestran en pantalla durante desarrollo
- Para producción, configurar logs en PHP

## Desarrollo

### Agregar Nuevas Funcionalidades
1. Crear modelo en `models/`
2. Crear controlador en `controllers/`
3. Crear vista en `views/`
4. Agregar ruta en `index.php`

### Personalización
- Modificar estilos en `public/assets/css/styles.css`
- Ajustar configuración en `config/database.php`
- Personalizar vistas en `views/`

## Tecnologías Utilizadas
- PHP 7.4+
- MySQL 5.7+
- HTML5
- CSS3
- JavaScript (mínimo)
- PDO para base de datos
- Sesiones PHP nativas