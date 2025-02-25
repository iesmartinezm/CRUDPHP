CRUDPHP

CRUDPHP es una aplicación web en PHP que permite a los usuarios registrarse, iniciar sesión y gestionar productos en una base de datos. Ofrece funcionalidades de Crear, Leer, Actualizar y Eliminar productos.

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

- Accede a la aplicación en el navegador
   - Registro de usuario: `http://localhost/FrontEnd/FormularioRegistro/FormularioRegistro.html`.
   - Inicio de sesión: `http://localhost/FrontEnd/FormularioLogin/FormularioLogin.html`.
   - Gestión de productos: `http://localhost/FrontEnd/Crud/ListadoDeProductos.php`.


Opcion 2 : Usando Docker

- Clona el repositorio del proyecto : git clone https://github.com/iesmartinezm/CRUDPHP.git

- Accede a la carpeta CRUDPHP

- Abre una CMD en esa ubicacion y escribe "docker-compose up --build", para la primera vez que quieras usar la aplicacion, a partir de entonces solo tendras que escribir "docker-compose up" para usarla.

- Accede a la aplicacion desde tu navegador usando localhost


APLICACION ACTUAL SIN AÑADIR FORMULARIO DE BUSQUEDA

Mi aplicacion actual no es vulnerable a Reflected XSS dado que los puntos de la aplicacion deonde se muestran datos ingresados por el usuario, como los formularios que ya estan implementados en la misma, utilizan la funcion htmlspecialchars() para verificar que las entradas se conviertan en sus equivalentes HTML, evitando asi que puedan ser interpretadas como codigo JavaScript. 


NUEVO FORMULARIO DE BUSQUEDA

Se ha agregado la funcionalidad de un formulario de busqueda dentro del listado de productos.
Este formulario si que es vulnerable a Reflected XSS dado que no utiliza htmlspecial chars para convertir las consultas a HTML, por lo que un atacante podria obtener la cookie de sesion si inserta un script dentro de la URL

Apartado 1 : Formulario con GET

Esta seria la URL que veria una persona que hace una busqueda normal dentro del formulario : 

http://localhost/FrontEnd/Crud/ListadoDeProductos.php?search=<termino_de_busqueda>

Esta seria una forma de obtener la cookie de sesion que podria usar un atacante malicioso: 

http://localhost/FrontEnd/Crud/ListadoDeProductos.php?search=<script>alert(document.cookie);</script>


Apartado 2 : Formulario con POST

Si introducimos en el formulario de busqueda con metodo POST el siguiente script

<script>alert(document.cookie);</script>

Nos mostrar una alerta con la cookie de sesion del usuario logueado


