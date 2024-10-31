=== Send to Twitter ===


Contributors: Braulio Aquino

Tags: twitter, shorten url, ir.pe, post, español, spanish, share

Requires at least: 2.7

Tested up to: 3.1

Stable tag: 1.7.2



Send to Twitter shows a text link to send a post to Twitter with title and shortened url.




== Description ==



Send to Twitter shows a text link to send a post to Twitter with title and shortened url.

Features:

* Shorten the url automatically with ir.pe (shortening that includes statistics)
* Displays a link that says "Send to Twitter".
* The text can be customized.
* The url shortened stays put even if you change.
* Allows you to choose a Twitter user if desired.

<strong>-</strong> -------------------------------------------------- <strong>-</strong>

Send to Twitter muestra un enlace de texto para enviar un post a Twitter con título y url acortada.

Características:

* Acorta automáticamente las url con ir.pe (acortador que incluye estadisticas)
* Muestra un enlace con el texto "Enviar a Twitter".
* El texto puede ser personalizado.
* La url acortada permanece fija aunque se cambien.
* Permite elegir un usuario de Twitter si lo desea.




== Installation ==

1. Upload the folder /send-to-twitter to /wp-content/plugins
2. Activate the plugin in the Plugins menu in WordPress.
3. Use <code><?php if( function_exists('send_to_twitter') ){ send_to_twitter(); } ?></code> in PHP where you want to display the link. (You can put as much in single.php or index.php - http://your-url.com/wp-admin/theme-editor.php)
4. Enter an API KEY if you want a record of your shortened url

<strong>-</strong> -------------------------------------------------- <strong>-</strong>

1. Subir la carpeta /send-to-twitter al directorio /wp-content/plugins
2. Activar el plugin en el menú Plugins de WordPress.
3. Utilizar <code><?php if( function_exists('send_to_twitter') ){ send_to_twitter(); } ?></code> en PHP donde quieras mostrar el enlace. (Puedes colocarlo tanto en single.php como en index.php - http://ladirecciondetublog.com/wp-admin/theme-editor.php)
4. Ingrese un API KEY si desea tener un historial de sus url acortadas



== Frequently Asked Questions ==


= Where links are placed? =
You can put as much in single.php or index.php - http://your-url.com/wp-admin/theme-editor.php

= How are the statistics of the shortened link? =
For example, if the url is shortened http://ir.pe/brau can see the statistics in http://ir.pe/brau+

<strong>-</strong> -------------------------------------------------- <strong>-</strong>

= En dónde se colocan los enlaces? =
Puedes colocarlo tanto en single.php como en index.php - http://ladirecciondetublog.com/wp-admin/theme-editor.php

= Cómo se ven las estadisticas del enlace acortado? =
Por ejemplo, si el la url acortada es http://ir.pe/brau puedes ver las estadisticas en http://ir.pe/brau+


== Changelog ==


= 1.7.2 =

* Fix bug

<strong>-</strong> -------------------------- <strong>-</strong>

* Falla reparada

= 1.7.1 =

* Ir.pe temporary change to tinyurl.com

<strong>-</strong> -------------------------- <strong>-</strong>

* Cambio provisional de ir.pe a tinyurl.com

=  1.7 =

* Included API KEY

<strong>-</strong> -------------------------- <strong>-</strong>

* Incluido API KEY

= 1.6.3 =

* Improved ir.pe API

<strong>-</strong> -------------------------- <strong>-</strong>

* Mejora en el API de ir.pe

= 1.6.2 =

* tinyurl.com change to ir.pe

<strong>-</strong> -------------------------- <strong>-</strong>

* Cambio de tinyurl.com a ir.pe

= 1.6.1 =

* Ir.pe temporary change to tinyurl.com

<strong>-</strong> -------------------------- <strong>-</strong>

* Cambio provisional de ir.pe a tinyurl.com

= 1.6 =

* You can assign a custom text for the link.

<strong>-</strong> -------------------------- <strong>-</strong>

* Agregado el poder asignar texto personalizado al enlace.

= 1.5 =

* Added the choice to allow a Twitter account.
* Multi-language support: English, Spanish, German, French, Italian and Portuguese.

<strong>-</strong> -------------------------- <strong>-</strong>

* Agregado el permitir elegir una cuenta de Twitter.
* Soporte multi-idioma: Ingles, español, alemán, francés, italiano y portugués.

= 1.0 =

* Creating the plugin.

<strong>-</strong> -------------------------- <strong>-</strong>

* Creación del plugin.


== Screenshots ==

1. Options | English
2. Opciones | Español



== Credits ==

Copyright 2009-2010  braulioaquino.com  (email: braulio@braulioaquino.com)

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 

51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA