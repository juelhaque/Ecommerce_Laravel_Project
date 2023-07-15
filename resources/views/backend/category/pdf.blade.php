<table id="datatablesSimple">
    <thead>
        <tr>
            <th>SL#</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $category->title}}</td>
            <td>{{ $category->description}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<style>
    table, tr, th, td{
        border-collapse: collapse;
        width: 100%;
        font-size: 40px;
        border: 1px solid black;
        padding: 5px;
        text-align: center;
    }

</style>
