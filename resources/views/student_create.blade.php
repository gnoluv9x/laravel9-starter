<h1>Thêm mới sinh viên</h1>

<form action="{{ route('student.store') }}" method="post">
    @csrf

    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name">
    <br />
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name">
    <br />
    <label for="birthday">Birthday</label>
    <input type="date" name="birthday" id="birthday">
    <br />
    <label for="gender">Gender</label>
    <input type="radio" id="male" name="gender" value="1">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="0">
    <label for="female">Female</label><br>

    <input type="submit" value="Submit">
</form>
