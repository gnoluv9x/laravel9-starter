@include('header')

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
        @if (checkSuperAdminPerm())
            <th>Delete</th>
        @endif
    </tr>

    @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td><a href="{{ route('courses.edit', $course) }}">Edit</a></td>
            @if (checkSuperAdminPerm())
                <td>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
</table>

{{ $courses->links() }}
