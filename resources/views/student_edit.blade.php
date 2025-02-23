<h1>Thêm mới sinh viên</h1>

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" value="{{ $student->first_name }}">
    <br />
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" value="{{ $student->last_name }}">
    <br />
    <label for="birthday">Birthday</label>
    <input type="date" name="birthday" id="birthday" value="{{ $student->birthday }}">
    <br />
    <label for="gender">Gender</label>
    <input type="radio" id="male" name="gender" value="1" checked="{{ $student->gender === 1 }}">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="0" checked="{{ $student->gender === 0 }}">
    <label for="female">Female</label><br>

    <input type="submit" value="Submit">
</form>
