<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="POST">
        @csrf
        <label for="firstname">First Name:</label><br><br>
        <input type="text" name="firstname" id="firstname" required><br><br>
        <label for="lastname">Last Name:</label><br><br>
        <input type="text" name="lastname" id="lastname" required><br><br>
        <label for="gender">Gender:</label><br><br>
        <input type="radio" name="gender" value="1"> Male <br>
        <input type="radio" name="gender" value="2"> Female <br>
        <input type="radio" name="gender" value="3"> Other <br><br>
        <label for="negara">Nationality:</label><br><br>
        <select name="negara" id="negara">
            <option value="1">Indonesia</option>
            <option value="2">Malaysia</option>
            <option value="3">China</option>
            <option value="4">Jepang</option>
            <option value="5">US</option>
        </select><br><br>
        <label for="bahasa">Language Spoken:</label><br><br>
        <input type="checkbox" name="bahasa" value="1"> Bahasa Indonesia <br>
        <input type="checkbox" name="bahasa" value="2"> English <br>
        <input type="checkbox" name="bahasa" value="3"> Other <br><br>
        <label for="bio">Bio</label><br><br>
        <textarea name="bio" id="bio" cols="25" rows="10"></textarea><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>