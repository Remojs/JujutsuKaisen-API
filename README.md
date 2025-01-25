Practica CRUD para practicar laravel

API de Jujustu kaisen en Desarrollo

Informacion sacada de https://jujutsu-kaisen.fandom.com/wiki/Jujutsu_Kaisen_Wiki

##

En esta aplicacion estoy aprendiendo a hacer un CRUD con laravel, motivado por una vacante laboral a la que aplique, en dicha practica priorice el crear un producto unico, algo que no solo sea un crud de practica como los miles que hay por internet, trate de hacer algo unico, como esta api la cual no existe nada solido hoy en dia.

En este codigo estoy priorizando la funcionalidad y la verficiacion de datos, integrando mensajes de error separados para manejar todo tipo de casos y errores, intentando que cada tabla, sea relacionada o no, tenga su funcionalidad completa para luego integrar todo a un panel de administracion donde podre poblar toda la DB con informacion

La DB cuenta con una tabla principal, llamada "Characters" en la cual van todos los datos de cada personaje del anime, ademas de tener 3 tablas relacionadas, las cuales son ocupacion, afiliacion y grado, que son relaciones de uno a muchos, porque un personaje puede tener un solo tipo de cada una, pero todas pueden estar relacionadas con muchos personajes. Ademas de tener una tabla extra con las tecnicas y poderes de cada personaje, la cual es de muchos a muchos, por lo que tendra una tabla intermedia donde se emparejen los id para luego traer todo junto al renderizar los personajes completos

