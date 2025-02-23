<h1>Cập nhật sinh viên</h1>

<form action="{{ route('courses.update', $course) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $course->name }}">
    <br>
    <br>

    <input type="submit" value="Submit">
</form>
