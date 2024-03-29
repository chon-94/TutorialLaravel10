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


 ## Autenticacion

 Usaremos un paquete oficial de laravel que proporciona un minimalista sistema de autenticacion 
 viene preconfigurado para funcionar con Bootstrap o Tailwind CSS podriamos ponerlo mas complejo 
 con el tiempo bueno para instalar colocamos los siguientes comandos

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

**Para generar los archivos**

 Antes de instalar por completo el breeze debemosde tener en cuenta lo que queremos podemos
 usar el siguiente comando para orientarnos es por eso que ponemos -h

     php artisan breeze:install -h
 
 Luego podemos instalar segun lo que querrramos en este caso sera con blade y soporte 
 para vista oscura
 
     php artisan breeze:install blade --dark

 Bueno para correr la pagina usamos 

     php artisan serve

 Hasta este punto todo debe de estar bien pero al momentod registrar a un susuario 
 podriamos tener algunos problemillas uno de ellos es que talvez... tengomos una
 mala conexion con la base de datos por eso debemos asegurarnos de que todo 
 este bien por aca

     DB_CONNECTION=
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=
     DB_USERNAME=
     DB_PASSWORD=       

 tambien pude ser que no este encendida la base de datos ahi solo se tiene quen encender 
 podemos hacerlo con este comando      
 
     sudo systemctl start mysql

 o tambien pude ser que no este migrada o creada la base de datos en ese caso solo la creamos

     php artisan migratete

 ahi la podremos crear con total tranquilidad y podemos configurar la manualmente                         

## La Barrera del lenguaje

 bueno estamos usando herramientas oficiales y de la comunidad y el tema es que
 estan en un idioma total mente desconocido asi que instalaremos un paquete creado
 por la comunidad obviamente... este paqueite se instalara de la siguiente manera

     composer require laravel-lang/common --dev 

 si tienes otro problema como el que me ocurrio... tranquilo no tieres la laptop por la ventana 
 podria costarte caro la mejor solucion que encontre hasta ahora es  descargar phpbcmath83 
 desde pamac porque se me estaba por complicar y en pamac es mas facil...
 despues de ello tenemos que habilitar la extension  y como se hace ello bueno hay 2 opciones
 personalmente a mi me funciono la 1

     sudo nano /etc/php/php.ini

     sudo nano /etc/php/php-fpm.d/www.conf
              
 una vez ingresado eso buscamos *extension=bcmath* tiene una coma delante hay que quitarsela
 seguido de eso reiniciamos y podemos volver a instalar con total normalidad

 si no tenemos problemas ni errores podremos contiuar con el siguente comando

     php artisan lang:add es