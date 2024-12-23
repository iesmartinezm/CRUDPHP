CRUDPHP

CRUDPHP es una aplicación web en PHP que permite a los usuarios registrarse, iniciar sesión y gestionar productos en una base de datos. Ofrece funcionalidades de Crear, Leer, Actualizar y Eliminar productos.

Requisitos
    - Servidor web con soporte PHP (como XAMPP o WAMP).
    - Base de datos MySQL.

Instalación
    - Instala un servidor web como XAMPP o WAMP.
    - Crea una base de datos llamada crudphp en MySQL.
    - Coloca los archivos del proyecto en el directorio raíz de tu servidor web.
    - Accede a la aplicación en http://localhost/CRUDPHP/FrontEnd/FormularioRegistro/FormularioRegsitro.html.

Funcionalidades

    - Registro de usuario: Permite crear cuentas de usuario.
    - Inicio de sesión: Acceso con nombre de usuario y contraseña.
    - CRUD de productos:
        - Crear: Añadir nuevos productos.
        - Leer: Ver lista de productos.
        - Actualizar: Editar productos existentes.
        - Eliminar: Borrar productos de la base de datos.

Como usar la aplicacion

Opción 1: Usando un servidor web local XAAMP

- Crea la base de datos `crudphp` en MySQL
   - Accede a `http://localhost/phpmyadmin/` en tu navegador.
   - Crea una nueva base de datos llamada `crudphp`.

- Coloca los archivos del proyecto en el directorio adecuado
   - Si usas XAMPP, coloca los archivos en `C:/xampp/htdocs/CRUDPHP/`.
   - Si usas WAMP, coloca los archivos en `C:/wamp64/www/CRUDPHP/`.

- Accede a la aplicación en el navegador
   - Registro de usuario: `http://localhost/CRUDPHP/FrontEnd/FormularioRegistro/FormularioRegistro.html`.
   - Inicio de sesión: `http://localhost/CRUDPHP/FrontEnd/FormularioLogin/FormularioLogin.html`.
   - Gestión de productos: `http://localhost/CRUDPHP/FrontEnd/Crud/ListadoDeProductos.php`.


Opcion 2 : Usando Docker

- Clona el repositorio del proyecto : git clone https://github.com/iesmartinezm/CRUDPHP.git

- Accede a la carpeta CRUDPHP

- Abre una CMD en esa ubicacion y escribe "docker-compose up --build", para la primera vez que quieras usar la aplicacion, a partir de entonces solo tendras que escribir "docker-compose up" para usarla.

- Accede a la aplicacion desde tu navegador usando localhost




