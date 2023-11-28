<table style="border-width: 1pt">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
    </tr>
    @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->publisher}}</td>
        </tr>
    @endforeach
</table>