<h1>Danh sách sinh viên</h1>

<a href="{{ route('students.create') }}">Thêm mới</a>
<br>
<br>

<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @foreach ($students as $each)
        <tr>
            <td>{{ $each->id }}</td>
            <td>{{ $each->fullName }}</td>
            <td>{{ $each->getAge }}</td>
            <td>{{ $each->getGender }}</td>
            <td><a href="{{ route('students.edit', $each) }}">Edit</a></td>
            <td>
                <form action="{{ route('students.destroy', $each) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
