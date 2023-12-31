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

Create Views
-
index
--
Create file ```index.blade.php``` in folder ```resources\views```
Call this view from BookController
```
public function index()
{
    $books = Book::all();
    return view('index', compact('books'));
}
```
Add to ```index.blade.php```
```
@foreach($books as $book)
    <tr>
        <td>{{$book->id}}</td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->publisher}}</td>
    </tr>
@endforeach
```

create
--
Create a view name ```create.blade.php``` in folder ```resources\views```
Call this view from BookController
```
return view('create');
```
In ```create.blade.php``` we will have a form to input new book
```
<form action="/books" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="publisher" placeholder="Publisher">
    <button type="submit">Add Book</button>
</form>
```

store
--
This function will receive request and store to database
```
Book::create($request->all());
return redirect()->route('books.index');
```