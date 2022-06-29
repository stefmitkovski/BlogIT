First run(in the directory BlogIT)
```js script
npm install  
```
so it can download the required bootstrap files, then run a dev server in the root directory(BlogIT) like so:

```php
php -S localhost:8000
```
and then access the file databse.php like so:

http://localhost:8000/database.php

WARNING: You first need to start up the mysql server and change the user and password in the database.php file.

And in the end access the main index.php file trough the url:

http://localhost:8000/public/products/index.php 