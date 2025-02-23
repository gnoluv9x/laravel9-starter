<h1>Thêm sinh viên</h1>

<form action="{{ route('courses.store') }}" method="POST">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <br>
    <br>

    <input type="submit" value="Submit">
</form>
