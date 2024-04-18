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
     
     npm run dev

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

## Rutas
 proyecto-0/routes/web.php 
 ahi podemos hacer muchas cosas


## Middleware

 en el mundo de laravel estos metodos es una pieza de codigo que se ejecutaentre entre la 
 solicitud y respuesta es una capa intermedia que hace validaciones antes de que se llegue 
 al destino final veamos el ejemplo de esta vista 
 
 ubicada en esta ruta

    proyecto-0/routes/web.php
 
 Ahora en la siguiente ruta vemos algo llamado middleware lo que hace ahi es solicitarse entre 
 la solicitud y la respuesta aca se estan aplicando 2 el **auth** verifica si el usuario esta autentificado,
 si ya se logeo con anterioridad y tiene unsa sesion valida si es asi ledara la vista al panel principal 
 y si no  lo llevara al logeo el **verified** se asegura de que el usuario verifique su correo
 esto apra saber que su correo existe y puede recibir mensajes 

     Route::get('/dashboard', function () {
         return view('dashboard');
     })->middleware(['auth','verified'])->name('dashboard');
  


 Ahora en esta ruta

     proyecto-0/app/Models/User.php

 Encontramos este codigo comentado lo descomentamos 

     use Illuminate\Contracts\Auth\MustVerifyEmail;
     
 Y agregamos el implemento de MustVerifyEmail

    class User extends Authenticatable **implements MustVerifyEmail**   


 **Middleware guest** ahora nos toca hablar de este Middleware en especifico si nos damos cuenta en la ruta 
 proyecto-0/routes/web.php al final encontramos la sigueinte linear *require __DIR__.'/auth.php';*  esto 
 indica que usareoms  este archivo ubicado en esta ruta **proyecto-0/routes/auth.php** 
 bueno en la ruta **proyecto-0/app/Providers/RouteServiceProvider.php** tenemos la linea de comando 
 **public const HOME = '/dashboard';** si cambiamos el dashboard podremos cambiar la pagina de bienvinda
 del usuario osea cambiamos la orimera pagina que veria el usuario despues de logearse ahora que tenemos 
 en cuenta este segundo punto podriamos aprovechar un poco de espacio. Bueno ahora en las navegaciones 
 estaria bueno crear un archivo en esta ruta asi de la sgt manera

     proyecto-0/resources/views/prueba/index.blade.php

 ahora en nuestro archivo web de routes podremos cambiar algo el primer parafo esta comentado  y el segundo 
 viene a ser una modificacion para que retorne en el archivo que creamos en la carpeta prueba

         // Route::get('/prueba/{prb?}', function ($prb=null) {
         //     if ($prb === ''){
         //         return to_route('prueba.index'); 
         //     }
         //     return 'Prueba no detail :P  '. $prb;
         // }); 

         Route::get('/prueba', function () {
             // return view('prueba.index'); 
             return 'hola caramba';
         })->name('prueba.index');
    
## Navegacion

 bien para la navegacion ya tenemos una ruta views/layouts/navigation.blade.php aca podemos cambiar la barra de navegacion... si queremos colocarla
 en todas partes deberiamos de colocar en cada archivo blade.php

     <x-app-layout>
     ejemplo
     </x-app-layout>

 todo esto se instalo cuando instalamos breeze... bastente rapido verdad bueno como sea un ejemplo mas claro seria este  estamos tomando casi la 
 misma estructura del panel pero con los cosa que lo distingan... 

     <x-app-layout>
         <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  {{ __('Prueba') }}
            </h2>
         </x-slot> x

         <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                       <div class="p-6 text-gray-900 dark:text-gray-100">
                           {{ __("You're logged in!") }}

                           ya y ademas este es el pruebas form 
                       </div>
                  </div>
            </div>
         </div>
     </x-app-layout>

 bien podemos cambiar todas esas cosas dentro de este sitio layouts/navigation.blade.php 
 podemos modificar algunos componentes aca **views/components/responsive-nav-link.blade.php**
 todos estos se  encuentran dentro de la carpeta views... bueno en realidad todo lo de components
 sirve para eso **views/components/nav-link.blade.php** se puede cambiar muchos otros aspectos 
 relacionados al diseño **components**

## Formulario
 
 bueno para hacer un formulario vamos a tener esta siguiente base  que consta de un area de texto
 tranparente con letras de color naranja y un boton que se encargara de enviar... 
 podemos usar el metodo post en form para mandar el formulario
 
     <form method="POST">
         @csrf
         <textarea name="message" class=" bg-transparent text-orange-700">
         
         </textarea>
        
         <br>
        
         <button class=" bg-yellow-400 text-green-900 ">
             chispas
         </button>
     </form>

### descripcion de las etiquetas 
 method="POST" enviará sus datos utilizando el método POST. Los datos del formulario se envían en el cuerpo de la solicitud HTTP, 
 lo que es útil para enviar datos sensibles o modificar el estado del servidor.
 
 @csrf: Es específica de algunos frameworks web, como Laravel y Django, que ofrecen protección CSRF de forma integrada.
 
 En Laravel, @csrf se traduce a una directiva Blade que se convierte en un campo de input HTML oculto que contiene un token CSRF. Este token es una medida de seguridad para proteger contra ataques CSRF.

 En Django, @csrf es similar y se utiliza en los templates para generar un campo de input oculto con el token CSRF.

 name="message": Este es el atributo name del <textarea>, que se utiliza para identificar el campo cuando se envía el formulario al servidor. En este caso, el nombre del campo es "message".

 class="bg-transparent text-orange-700": Este es el atributo class del <textarea>, que se utiliza para aplicar clases de estilo CSS al <textarea>. En este caso, se están aplicando dos clases de Tailwind CSS.

 ### Rutas

 para retornar proceso
     return 'en proceso';


 para retornar la informacion con el token csrf
     return request();
     
 para retornar solo el mensaje     
     return request('message');


 declara una variable llamada $message.
     $message = request('message');
     
    $message: Esta línea de código declara una variable llamada $message. En esta variable se almacenará el valor que el usuario ha ingresado en un campo del formulario con el nombre "message".

    request('message'): Esto es una forma de acceder a los datos enviados mediante una solicitud HTTP POST o GET. En este caso, request('message') está obteniendo el valor del campo del formulario llamado "message".

44:44