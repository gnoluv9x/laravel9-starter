<h1>Danh sách sv</h1>

<a href="{{ route('students.create') }}">Thêm mới</a>
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
        <th>Gender</th>
        <th>Email</th>
        <th>Status</th>
        <th>Course name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->getGender() }}</td>
            <td>{{ $student->getStatus() }}</td>
            <td>{{ $student->course->name }}</td>
            <td><a href="{{ route('students.edit', $student) }}">Edit</a></td>
            <td>
                <form action="{{ route('students.destroy', $student) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{{ $students->links() }}
