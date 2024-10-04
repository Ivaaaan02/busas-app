<h1>Create User</h1>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation">

    <button type="submit">Create User</button>
</form>