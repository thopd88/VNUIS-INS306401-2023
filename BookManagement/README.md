Create Project
-
```
composer create-project laravel/laravel BookManagement
```
You should install **[Composer](https://getcomposer.org/download/)** if needed

Go to the newly created folder
-
```
cd BookManagement
```

Open the Visual Studio Code
-
```
code .
```

Modify the .env
-
```
DB_DATABASE=book_management
DB_USERNAME=
DB_PASSWORD=
```

Run the project
-
```
php artisan serve
```

Migrate Database (testing the connection)
-
```
php artisan migrate
```

Create Model Book with migration
-
```
php artisan make:model Book -m
```

Add to create_books_table (migration)
-
```
$table->string('title');
$table->string('author');
$table->string('publisher');
```

Run migrate again to update the database
-
```
php artisan migrate
```

Add to Book model
-
```
protected $table = "books";
protected $fillable = [
    'title',
    'author',
    'publisher'
];
```

Create BookController
-
```
php artisan make:controller BookController --resource
```

Add Books to Route/web.php
-
```
Route::resource('books', BookController::class);
```
Remember to add
```
use App\Http\Controllers\BookController;
```