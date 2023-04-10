<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">

	<!--
		File: edit.php - Presentation page
		Contributors: James West - westj4@csp.edu
		Course: CSC235 Server-Side Development
		Assignment: Individual Project - Week 4
		Date: 4/10/23
	-->
</head>
<body>
    <h1>CSC 235 Group Project Admin</h1>
    <form action="javascript:deploy()">
        <label for="msg">Update message:</label>
        <input type="text" id="msg"><br />
        <button type="submit">Deploy Changes to Server</button>
    </form>
    <p id="notify"></p>
    <p id="results"></p>
</body>
<script>
    async function deploy() {
        const msgVal = document.getElementById('msg').value;
        const msg = "Deploying to production server using message: " + (msgVal ? msgVal : "deploy to production");        
        document.getElementById('notify').innerHTML = msg;

        const response = await fetch("/serverSideDev/week4/updateServer.php", {
            method: 'POST',
            body: JSON.stringify({
                msg: msg
            }),
            headers: {"Content-type": "application/json; charset=UTF-8"}
        });
        console.log(response);
        const text = await response.text();
        document.getElementById("results").innerHTML = text;
    }
</script>

</html>