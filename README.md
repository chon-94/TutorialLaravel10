# TutorialLaravel10
 tutorial

 ## que necesitaremos ?
 Buena pregunta solo necesitaremos unas cuantas cosas: 
 
 **composer**
 **PHP**
 **nginx o apache**
 **mysql(gestor de vase de datos)**
 **editor de codigo**
 **terminal de comando**

Bueno tenemos esto:

 **Composer version 2.7.1** 
 **PHP      version 8.3.3** 
 **nginx    version 1.24.0** 
 **mysql    version 8.2.0** 

 bien esas son las herramientas que estoy utilizando y las que pueden joder algo  y hacer que funcione 
 mal o que no sirva ni para lastre y tambien me gustaria  mencionar que todo lo que ves es decir las 4 
 herramientas que estan arriba instaladas fueron instaladas globalmente... 
 luego tenemos que crear nuestro proyecto usaremos:
 
 **Laravel v10.48.3**
 Para instalarlo usamos el siguiente comando
 
     composer create-project --prefer-dist laravel/laravel proyecto-0 "10.*"


 **¤composer:** 
 Administrador de dependencias de PHP que se utiliza para gestionar las dependencias de un proyecto PHP.
 **¤create-project:** 
 Es un comando de Composer que se utiliza para crear un nuevo proyecto a partir de un paquete existente.
 **¤--prefer-dist:** 
 Descarga las versiones precompiladas de los paquetes en lugar de clonar el repositorio de Git. 
 **laravel/laravel:** 
 Es el nombre del paquete que se va a utilizar como base para el nuevo proyecto. 
 En este caso, se está creando un proyecto Laravel con el paquete oficial de Laravel.
 **¤proyecto-0:** 
 Es el nombre de la carpeta en la que se creará el nuevo proyecto. 
 **¤"10.*":** 
 Esta parte especifica la versión de Laravel que se desea instalar en este caso cualquiera que sea 10. 
     


 ## Todo Listo
 Teniendo ya laravel instalado podemos empezar a realziar nuestros primeros cambios podriamos cambiar 
 la pagina de bieenvenida pro ejemplo



 probaremos con un sistema de autenticacion 
 instalaremos un paquete ofcioal del mismo laravel 
 el --dev nos ayudara a que este paquete solo se guarde 
 en el desarrollo y no en produccion

     composer require laravel/breeze --dev
   
**composer:** Es al administrador de dependencias de PHP  que permite 
 instalar, actualizar y administrar bibliotecas
 
 **require:** sirve para agregar nuevas dependencias al proyecto existente.

 **laravel/breeze:** te acuerdas de laravel/laravel bien... en este caso estoy diciendo 
 que quiero agregagar un paquete de laravel que se llama breeze este paquetito
 nos ayudara a hacer una autenticacion mas sensilla utilizando Laravel JetStream...
 a queno te esperabas esto ehh...?
 
 **--dev:** con esta opcion... indicaremos que el paquete se agregue solo en las dependencias
 de desarrollo y no cuando se haga el deploy y esas cosas esto para que no tener mucho lastre
 (aunque en la practica a mi me dice   The "--dev" option does not exist.  )     
