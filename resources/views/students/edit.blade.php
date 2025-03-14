@include('header')

<h1>Cập nhật sinh viên</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: rgb(219, 43, 43)">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $student->name }}">
    <br>
    <br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ $student->email }}">
    <br>
    <br>
    <label for="gender">Gender: </label>
    @foreach ($gender as $key => $value)
        <input type="radio" id={{ $value }} name="gender" value={{ $value }}
            @if (strval($student->gender) === $value) checked @endif />
        <label for={{ $value }}>{{ $key }} </label>
    @endforeach
    <br>
    <br>
    <label for="course_id">Course: </label>
    <select name="course_id" id="course_id">
        @foreach ($courses as $course)
            <option value={{ $course->id }} @if ($student->course_id === $course->id) selected @endif>{{ $course->name }}
            </option>
        @endforeach
    </select>
    <br>
    <br>
    <label for="status">Status: </label>
    <select name="status" id="status">
        @foreach ($status as $key => $value)
            <option value={{ $value }} @if ($student->status === $value) selected @endif>{{ $key }}
            </option>
        @endforeach
    </select>
    <br>
    <br>

    <input type="submit" value="Submit">
</form>
