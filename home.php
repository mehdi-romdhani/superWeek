<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="script/script.js" type="application/javascript"></script>
    <title>SuperWeek</title>
</head>
<body>
    <span>All Users <button type="button" id="btn_all_user">Show</button></span>
    <hr>
    <span>All Books <button type="button" id="btn_all_book">Show</button></span>
    <hr>
    <span>

        <form method="POST" id="form_user">
            <label for="user">User ID</label>
            <input type="text" name="user_id" id="user_id">
            <button type="submit" name="submit_user">Search</button>
        </form>
    </span>
    <hr>
    <span>

        <form method="POST" id="form_book">
            <label for="book">Book ID</label>
            <input type="text" name="book_id" id="book_id">
            <button type="submit" name="book_user">Search</button>
        </form>
    </span>
    
</body>
</html>