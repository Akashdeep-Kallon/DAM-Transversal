Desarrollo backend.
En esta tarea tendréis que programar el registro y login/logout de vuestra aplicación conectando los formularios con la base de datos.
1. Requerimiento funcional. Login de usuario (3 puntos)
1.1.
Un único formulario de login para ambos tipos de usuario.
1.2.
Comprobar si los campos se corresponden con los almacenadas en la base de datos.
1.3.
Si los datos son correctos redirecciona al usuario a la página de su perfil.
1.4.
Si los datos son incorrectos muestra pantalla login de nuevo con un mensaje de error descriptivo sobre la razón de este.
1.5.
Evitar acceso paginas/secciones/componentes privados si no se está logueado.
1.6.
Usuario admin puede ver paginas específicas de su tipo de usuario.
1.7.
Usuario estándar puede ver páginas específicas de su tipo de usuario.
2. Requerimiento funcional. Registro de nuevos usuarios (4 puntos)
2.1.
Un formulario de registro por cada tipo de usuario.
2.2.
Dar de alta el usuario en la base de datos con los datos introducidos en el formulario.
2.3.
Si los datos son correctos se ha de redirigir a la página principal.
2.4.
Si los datos son incorrectos muestra pantalla registro de nuevo con un mensaje de error descriptivo sobre la razón de este.
2.5.
Usuario admin puede subir una imagen de perfil.
3. Requerimiento funcional. Logout de usuario (1 punto)
3.1.
Mostrar un botón para desloguearse solo si se está logueado.
3.2.
Limpiar variables de sesión y finalizar esta.
3.3.
Redirigir a la página de login.
4. Requerimiento no funcional. (2 puntos)
4.1.
Toda la información se ha de almacenar y leer de una base de datos MySQL .
4.2.
Se ha de usar MySQLi Object-oriented.
4.3.
Se ha de usar estructura carpetas MVC (model, view, controller)
4.4.
Se ha de usar una clase UserController con las funciones login, logout,register.
4.5.
Se ha de validar el formato/valores de al menos dos campos a nivel servidor(UserController)
Documentación
1.
Readme.md con Introducción, Funcionalidades, Como funciona (Diagrama de clase de User, Diagrama de sequencias de Login y Registro).
2.
Test unitario con las evidencias de cada requerimiento.
