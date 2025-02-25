<h1>Danh sách lớp</h1>

<a href="{{ route('courses.create') }}">Thêm mới</a>
<br>
<br>

<form>
    <label for="q">Search</label>
    <input type="search" name="q" id="q" value="{{ $search }}">
</form>

<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td><a href="{{ route('courses.edit', $course) }}">Edit</a></td>
            <td>
                <form action="{{ route('courses.destroy', $course) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $courses->links() }}
