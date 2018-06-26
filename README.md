# Smiple PHP MVC
MVC architecture base pure PHP framework. this framework is inpride by [Laravel](https://laravel.com/)


## Installation

1.  download the zip.
2.  create a folder in the htdocs or www .
3.  unzip the content to that folder.
4.  change the `base_url` ***constant*** as the name of folder <br>
     ex -  if you name the folder final_project change the `define('base_url', 'http://localhost/final/');` to `define('base_url', 'http://localhost/final_project /');` in the `index.php` file 
5.  create a database named `project` using `phpmyadmin` or any other tool
     if you are going to have different name change the database name in the `libs\Database.php`. `parent::__construct('mysql:host=localhost;dbname=your_database_name', 'root' , '');`


username - admin <br>
password - 123123

## Routing

Application recive all it request to `index.php` and uses the `Handler` class in the `lib` folder and redicrect to the relavent controller method.

`http://http/localhost/project-file-name/controller-name/method-name/method-parameter`

## Controllers

Handel the logic for request received in to the application. and return a view or JSON respon. All Controller should be located in `\controllers` folder.
All controllers should be extended form the main controller class in the `lib\Controller.php` class. this class is consite of `view` and `validation` class.

## Model

All the models are located in the `models` folder and are extend form `lib\Database.php` class. which uses [PHP PDO](http://php.net/manual/en/book.pdo.php) all the database queries are handle by that. 

## Views

All the view are located in the `views` folder and contains mostly `HTLM`, `CSS`, `JavaScript`. views has sub inclued file which are located in the `views\includes` folder. When returing a view file from the controlle the view get added inside of a `col-md-9` `div` which can be changed from the `View` class located in the `lib\View.php`  file.