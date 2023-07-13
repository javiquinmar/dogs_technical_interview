<p align="center"><img src="https://cdn.iconscout.com/icon/free/png-512/free-dog-2198-1135748.png?f=avif&w=128"></p>

# Dogs App
### Web SPA para gestionar una base de datos de perros.

## Herramientas y versiones

- Laravel 5.3.31
- PHP 7.0.30
- Composer 2.2
- Node 8.11.4
- NPM 5.6.0

## Instrucciones de instalación

1. Clonar repositorio
2. Acceder a la carpeta del repositorio
3. Copiar env-example a .env
4. Crear bbdd y configurarla en .env
5. Lanzar comando composer install en la raíz del proyecto
6. php artisan generate:keys
7. php artisan migrate:refresh --seed
8. npm run dev 
9. php artisan serve


## Descripción

Web donde podremos listar, crear, editar y eliminar perros.

Cada perro tiene su nombre, raza, color y tamaño como campos obligatorios.
Opcionalmente podrás asignarle la edad, peso y una fotografía.


## Comentarios de la prueba

El ejercicio en sí no es complejo, me hubiera gustado haber añadido más funcionalidades, como:
 - Añadir la posibilidad de tags, 
 - Gestionar también las razas, colores, tamaños...
 - Añadir SweetAlert para la confirmación cuando queremos eliminar algún perro
 - Añadir animaciones
 - Añadir al select un "placeholder"
 - Validaciones en el lado front con VUE
 - Encapsular alguno más el código en el front.

He de decir que "sufrido" con las versiones antiguas.
Estoy acostumbrado a trabajar con versiones recientes, tanto de Laravel, PHP, Node, NPM... 
y creo que casi he tardado más en configurar todo y "pelearme" con las incompatibilidades cuando quería
instalar algún paquete, que en el propio código.

Aunque no es lo ideal, he utilizado algunos CDNs para evitar las incompatibilidades al instalar los paquetes.


### Gracias

Gracias por la oportunidad.

Espero que sea de vuestro agrado.

Un saludo!
Javier Quintana