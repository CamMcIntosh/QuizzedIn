<!DOCTYPE html>
<html>
    <head>
        <title>QuizzedIn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styling.css">
    </head>

<body>
    <nav>
        <h3 style="float: left;"><a href="index.html">QuizzedIn</a></h3>
        <ul style="float: left;">
            <li><a href="categories.html">Categories</a></li>
            <li><a href="create.html">Create</a></li>
            <li>Search</li>
        </ul>
        <ul>
            <li><a href="signIn.html">Sign In</a></li>
            <li><a href="signUp.html">Sign Up</a></li>
        </ul><br>
    </nav>
    <main>
    <form action="index.html">
        Name your Quiz:<br>
        <input type="text" name="name"><br>
        Choose a Category: <br>
        <input type="text" name="category"><br><br><br>
        Type of Question:<br>
        <input type="radio" name="question" value="multiple" checked> Multiple Choice<br>
        <input type="radio" name="question" value="trueFalse" checked> True/False<br>
        <input type="radio" name="question" value="fillIn" checked> Fill In The Blank<br>
        Question 1:<br>
        <input type="text" name="q1"><br>
        <!-- Code for this still needs to be completed -->

        <input type="submit" value="Submit">
        
    </form>
    </main>

</body>
</html>