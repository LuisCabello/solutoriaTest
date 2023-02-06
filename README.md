# Conexión y base de datos

Para la coxión se creo un controlador llamado "AccessController.php" el cual mediante el metodo "curl" hace una peticion http a la Api entregandole las credenciales, luego de obtener el token y usando el endPoint de los indicadores, se hace un segundo llamado Get utilizando el Bearer Token, se toma toda la data y se guarda en la base de datos.

Para la base de datos se utilizo PostgresSql : 
![image](https://user-images.githubusercontent.com/46609963/217054192-a4d34caf-63a5-4b92-8321-e17366417a12.png)

Se hizo la base de datos a mano, y luego desde el proyecto se migro la tabla con los campos, como no hay mas tablas no se hicieron las relaciones.
La base comprueba si existe informacion, en caso de que no tenga, se vuelve a hacer la conexión con la Api para guardar la data

## Grafico y página principal

el grafico se hizo con chart.js y funciona de la siguiente manera : 

Tiene unos filtros que se utilizan para el rango en la muestra de data, la fecha se selecciona desde un calendario

![image](https://user-images.githubusercontent.com/46609963/217051159-837baee2-119d-4bb3-bbee-f0d476169dbb.png)

El siguiente ejemplo corresponde a el mes de enero del año 2021

![image](https://user-images.githubusercontent.com/46609963/217051315-414210ef-31bc-40ba-a0ab-cbdca1f0c5ed.png)

Esta es una vista desde la página sin filtro, el enlace "Solutoria Test" nos trae a esta pagina
![image](https://user-images.githubusercontent.com/46609963/217050892-4e713847-4886-4098-b081-21a9ca9c9599.png)


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
