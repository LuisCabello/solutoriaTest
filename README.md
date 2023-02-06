# Conexión y base de datos

-Para la conexión se creo un controlador llamado "AccessController.php" el cual mediante el método "curl" hace una petición http a la Api entregándole las credenciales, luego de obtener el token y usando el endPoint de los indicadores, se hace un segundo llamado Get utilizando el Bearer Token, se toma toda la data y se guarda en la base de datos.

-Para la base de datos se utilizó PostgresSql : 
![image](https://user-images.githubusercontent.com/46609963/217054192-a4d34caf-63a5-4b92-8321-e17366417a12.png)

-Se hizo la base de datos desde el pgAdmin, y luego desde el proyecto se migro la tabla con los campos, como no hay más tablas no se hicieron las relaciones.
La base comprueba si existe información, en caso de que no tenga, se vuelve a hacer la conexión con la Api para guardar la data

## Grafico y página principal

-El grafico se hizo con chart.js y funciona de la siguiente manera: 

-Tiene unos filtros que se utilizan para obtener la data entre las fechas seleccionadas, se hace mediante un calendario

![image](https://user-images.githubusercontent.com/46609963/217051159-837baee2-119d-4bb3-bbee-f0d476169dbb.png)

-El siguiente ejemplo corresponde a el mes de enero del año 2021

![image](https://user-images.githubusercontent.com/46609963/217051315-414210ef-31bc-40ba-a0ab-cbdca1f0c5ed.png)

-Esta es una vista desde la página sin filtro, el enlace "Solutoria Test" nos trae a esta pagina
![image](https://user-images.githubusercontent.com/46609963/217050892-4e713847-4886-4098-b081-21a9ca9c9599.png)

-Existe un botón para ingresar al crud.

## CRUD

-El Crud se ve de la siguiente manera: 

![image](https://user-images.githubusercontent.com/46609963/217055459-4a50b0f7-5d44-4a0f-b293-3f8f651fc07c.png)

-Se utilizo Data Tables para el manejo de la información.
-Cada botón abre un modal ejemplo para agregar un nuevo indicador:
![image](https://user-images.githubusercontent.com/46609963/217055963-df5526a1-2510-462d-b9c3-8f2156ae0abb.png)
![image](https://user-images.githubusercontent.com/46609963/217056001-58448cc1-3abc-4426-a772-0ff8924bd091.png)
![image](https://user-images.githubusercontent.com/46609963/217056045-2d6ddc6c-54f8-4ef5-8036-552f32cfac87.png)

-Se utilizo sWEETALERT 2 para los mensajes, ejemplo al eliminar:
![image](https://user-images.githubusercontent.com/46609963/217056158-b52e1800-0985-4561-be24-9f3d4bd167d5.png)
![image](https://user-images.githubusercontent.com/46609963/217056197-c11bfdf5-ae44-470f-b642-ea9f97b13ecc.png)

-Finalmente un ejemplo para modificar: 

![image](https://user-images.githubusercontent.com/46609963/217056440-257fd001-e569-4267-9edc-6d434f5dcc49.png)
![image](https://user-images.githubusercontent.com/46609963/217056494-f3976696-0604-4801-9465-874b3e4a710a.png)
