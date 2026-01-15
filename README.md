• Nombre del proyecto:
Tienda online de juegos de mesa "Board this way!".

• Se trata de la página web para una tienda online que dispone de:
- Un CRUD completo (Create, Read, Update, Delete).
- Encabezados y footers interactivos con enlaces funcionales a las páginas de la aplicación.
- Página principal con contenido dinámico.
- Diseño modular con distintos tipos de tarjetas: productos, ofertas, categorías...
- Login/logout funcional.
- Página de registro para crear cuentas nuevas.
- Botones y menús adaptados y descriptivos.
- Lista de deseos para usuarios autenticados.
- Función de carrito simulada mediante sesión.
- Página de contacto con formulario funcional.
- Vista en detalle de cada producto.
- Páginas únicas para cada género y oferta.
- Redirecciones inteligentes.
- Feedback funcional mediante alertas.
- Navegación simple e intuitiva.

• Tecnologías utilizadas:
- Entorno Linux con la distribución de Ubuntu 24.04.
- Editor de texto Visual Studio Code.
- Docker para lanzar el contenedor donde estará todo el proyecto.
- Node.js, PHP y Composer.
- Framework Laravel, Laravel Sail y Artisan CLI.
- Base de datos de MySQL.
- Vite y Tailwind CSS para el frontend.
- Laravel Telescope para depuración.
- Datos mock y Trait personalizado para carga de datos de prueba.
- Motor de plantillas Blade.
- Eloquent ORM para la comunicación con la base de datos.
- Migraciones y seeders para mover y rellenar la BBDD.
- CLI de Tinker para trabajar el CRUD con comandos.
- Middleware y CSRF para las capas de seguridad de la aplicación.
- Laravel Breeze para implementar el registro y las sesiones de los usuarios.

• Estructura del proyecto:
>📁 app:
   - En /Http se contienen los controladores, middleware y request.
   - En /Models incluye los modelos principales: Category, Offer, Product y User.
   -  /Providers.
   - /Traits contiene el fichero LoadsMockData.php.
   - /View/Components.
>📁 bootstrap:
   - Paquetes, caché y credenciales necesarias para el funcionamiento de la aplicación.
>📁 config:
   - Ficheros php con configuración la aplicación como logs, caché, sesiones...
>📁 database:
   - En /data se encuentran ficheros mock personalizados para categorías, productos, ofertas y carrito.
   - En /factories está el fichero UserFactory.php que define la clase usuario.
   - /migrations incluye todos los ficheros para las migraciones.
   - Y /seeders contiene un fichero distinto para poblar cada una de las tablas.
>📁 node_modules:
   - Directorio con paquetes y configuraciones que se genera por defecto.
>📁 public:
   - Contiene ficheros varios como el favicon, enlaces simbólicos, /assets...
>📁 resources:
   - /css contiene un fichero para el CSS.
   - /js contiene ficheros para el javascript.
>📁 resources/views:
   - En /admin se encuentran las vistas del CRUD (/products) y de la wishlist.
   - /auth contiene las vistas de las páginas de inicio de sesión y registro.
   - /cart tiene su propia vista para la página del carrito.
   - En /categories están la vista general de las categorías y la que muestra cada una.
   - /components contiene pequeños componentes Blade reutilizables para la construcción de vistas.
   - /layouts incluye las plantillas básicas para contruir las páginas principales.
   - En /offers están la vista general de las ofertas y la de cada una.
   - /partials contiene el diseño de los headers, footer, nav y los mensajes flash.
   - En /products están la vista general de los productos y la de cada uno.
   - En /profile están los ficheros que genera Breeze automáticamente y que construyen la vista del perfil de usuario.
>📁 routes:
   - Contiene 3 ficheros con todas las rutas de la aplicación.
>📁 storage:
   - /app contiene los directorios donde se guardan las imágenes públicas y privadas.
   - /framework contiene caché e información sobre las sesiones y datos en general.
   - /logs.
>📁 tests:
   - Directorios y ficheros para pruebas generados automáticamente.
>📁 vendor:
   - Biblioteca con gran cantidad de plugins y extensiones.


• Instrucciones de instalación:
- Preparar el entorno e instalar WSL2 y Ubuntu 24.04. Configurar Docker para integrar en él Ubuntu.
- Instalar Node.js, PHP y Composer, así como las extensiones de VSC para integrar WSL y poder trabajar con Laravel.
- Crear y vincular el proyecto a la plataforma mediante Composer prestando atención a la ruta de los directorios.
- Instalar y configurar Sail. Después de esto se levantan los contenedores de Docker para aplicar todos los cambios.
- Configurar el fichero .env para enlazarlo con la base de datos y crear la BBDD "myshop" en MySQL, en la cual se otorgarán permisos completos al usuario sail. Se ejecutan las primeras migraciones y se revisa que la aplicación funciona desde el navegador con la ruta "localhost". Por último se verifica el estado de los contenedores y la conexión con la base de datos.
- Finalmente se instalan Vite y Tailwind CSS para el frontend y se configuran las herramientas para análisis y depuración de código.
- A lo largo del proyecto se ejecuta `php artisan storage:link` para habilitar el acceso a imágenes públicas.

• Uso básico:
- Se accede a la aplicación desde el navegador en la ruta "localhost".
- Para navegar por ella están las siguientes páginas:
    - 🏠 El main menú o página principal es la primera página que se ve y muestra productos recomendados así como los géneros y las ofertas disponibles. Desde el encabezado se puede navegar a las demás páginas, iniciar sesión, registrarse o comprobar el carrito. El nombre de la web o "Inicio" redirigen a esta página.
    - 🎁 Productos muestra la página con todos los productos de la tienda mediante tarjetas individuales. Dispone de una barra de búsqueda para filtrar por nombre o contenido de la descripción. Desde "Ver detalles" en cada tarjeta se accede a la ficha individual de cada producto.
    - 📃 La página personal de cada producto muestra su información y dispone de botones para "añadir al carrito", "guardar en la lista de deseos" (solo para usuarios autenticados) y retroceder.
    - 🗂️ Géneros contiene tarjetas para cada uno de los mismos. Desde "ver productos" se accede a la página individual de cada género donde se presentan los productos que pertenecen al mismo.
    - 📁 La página individual de cada género muestra información sobre ese género y los productos catalogados dentro del mismo.
    - 💰 Ofertas contiene tarjetas para cada uno de las mismas. Desde "ver productos" se accede a la página individual de cada oferta donde se presentan los productos que la tienen aplicada.
    - 💸 La página individual de cada oferta muestra información sobre la misma y los productos que la aplican actualmente.
    - ☎️ Contacto muestra un pequeño formulario funcional para contactar con la empresa.
    - 🔐 Login redirige a una página para insertar las credenciales de inicio de sesión.
    - 🪪 Crear cuenta redirige a un formulario para registrarse en la web.
    - 🛒 El carrito muestra una lista con los productos seleccionados, su información, el cálculo del gasto total, botones para editar la selección y la opción de realizar la compra.
    - 📊 Los usuarios autenticados y administradores pueden acceder a "Gestionar tienda" donde se muestra el listado actual de productos y se pueden configurar.
    - 💾 Crear nuevo producto muestra un formulario con todos los campos necesarios para guardar un nuevo elemento en la base de datos.
    - ✏️ Editar redirige a una página para cambiar la información de un producto.
    - 🗑️ Eliminar abre un modal que hay que aceptar para borrar un producto.
    - 👤 El nombre de usuario despliega un menú con las opciones para configurar el perfil y para cerrar la sesión.

• Lógica del proyecto:
1. Gestión de la base de datos:
    - Migraciones para las tablas:
        1. users (id, email, email_verified_at, name, password, token, timestamps).
        2. categories (id, name, description, slug, timestamps).
        3. products (id, name, description, price, stock, category_id, image, min_players, max_players, offer_id, timestamps).
        4. offers (id, name, slug, discount_percentage, description, start_date, end_date, active,timestamps).
        5. product_user (id, product_id, user_id, quantity, timestamps).
    - Características técnicas:
        - IDs autoincrementales para cada tabla.
        - Claves únicas en email y slug.
        - Eliminación en cascada.
        - Integridad referencial con foreign keys.
        - Tabla pivote entre usuarios y productos para gestionar el carrito.
2. CRUD de productos:
    - Create:
        1. Formulario para validar los datos obligatorios (nombre, precio, stock, etc.).
        2. MySQL asigna un ID autoincremental automáticamente.
        3. Establece relación entre productos y géneros mediante ID.
        4. Establece relación entre productos y ofertas mediante ID.
        5. Mensaje flash para confirmación de la acción.
    - Read:
        1. index() para obtener géneros, ofertas y productos. para los últimos también permite filtrarlos por nombre o descripción.
        2. onSale() para obtener productos en oferta.
        3. adminIndex() muestra la lista de productos en el panel de administración.
        4. Los productos, géneros y ofertas se muestran en tarjetas horizontales.
    - Update:
        1. Método edit() al que se le pasa el registro específico que se quiere editar y muestra un formulario pre-rellenado con sus datos actuales.
        2. Rellena el formulario con datos actuales.
        3. Desplegables para géneros y ofertas.
        4. Actualiza solo los campos modificados.
        5. Mensaje flash para confirmación de la acción.
    - Delete:
        1. Modal informativo para confirmar la acción
        2. Eliminación física directa en base de datos.
        3. Alertas de éxito/error con redirección.
        4. Mensaje flash para confirmación de la acción.
3. Gestión de usuarios y roles:
    - Roles:
        - Usuario autenticado: Acceso completo (CRUD) y lista de deseos.
        - Visitante: Login, contacto, registro y ver productos, géneros ofertas y carrito.
    - Autenticación:
        1. Verifica credenciales (email + password).
        2. Registro de usuarios mediante formulario y verificación.
        3. Inicia sesión con datos de usuario.
        4. Redirige automáticamente a la página principal.
    - Control de accesos:
        - Páginas CRUD protegidas solo para usuarios autenticados.
        - Configuración de perfil para usuarios con sesión iniciada.
        - El encabezado muestra registro para usuarios invitados y gestión de tienda para los autenticados.
4. Gestión de categorías y productos:
    - Relación: Products → category_id  → Category (id) y Products → offer_id  → Offer (id).
    - Menú dropdown de géneros y ofertas que se reordena dinámicamente en modo edición.
    - Filtrado de productos por nombre o descripción.
5. Seguridad del sistema:
    - Autenticación:
        - Registro de usuarios con validación.
        - Verificación de credenciales segura.
        - Login/Logout limpios de variables de sesión.
        - Recuperación de contraseña con email.
    - Autorización:
        - Actualización de perfil y contraseña para usuarios identificados.
        - Verificación de los datos de usuario.
        - Layouts distintos acceso público y privado.
        - Redirecciones automáticas si no tiene permisos.
        - Etiqueta CSRF para proteger de ese tipo de ataques.
    - Validaciones:
        - Protección frente a inserciones indebidas mediante $fillable en los modelos.
        - Middleware de seguridad para rutas.
        - Sanitización de datos antes de guardar.
        - Validación de tipos de datos (float, int).

• Requisitos previos: 
- Windows 11 con WSL2.
- Entorno Linux - Ubuntu 24.04.
- PHP 8.2 y extensiones: pdo, pdo_mysql, mbstring, openssl, tokenizer, xml, ctype, json, fileinfo.
- Composer 2.x.
- Laravel 12:
    - Migraciones.
    - Seeders.
    - Eloquent ORM.
    - Blade Components.
    - Sessions (carrito).
    - Validaciones.
    - Storage público (storage:link).
- Docker & Laravel Sail.
- MySQL y Redis.
- Vite y Tailwind CSS.
- Laravel Breeze.
- Visual Studio Code:
    - PHP Intelephense
    - Laravel Blade Snippets
    - Tailwind CSS IntelliSense

• Autores y créditos: 
- Ángel José García Ibáñez
- GitHub: https://github.com/Angelgarib/TiendaOnline_Laravel.git

• Licencia para uso educativo.