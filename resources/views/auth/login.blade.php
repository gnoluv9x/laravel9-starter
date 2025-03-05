<h1>Please login</h1>

@error('error')
    <div style="color: rgb(214, 38, 38)" class="alert alert-danger">{{ $message }}</div>
@enderror

<form action={{ route('process_login') }} method="post">
    @csrf

    <label for="email">Email</label>
    <input type="text" name="email" id="email" />
    <br>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" />
    <br>
    <br>
    <button type="submit">Submit</button>
</form>
