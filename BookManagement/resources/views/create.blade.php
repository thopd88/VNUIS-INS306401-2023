<form action="/books" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="publisher" placeholder="Publisher">
    <button type="submit">Add Book</button>
</form>