<html>
<head>
    <title>Untitled Document</title>
</head>
<body>
    <h1>Welcome
        <?php
        session_start();
        $login_session=$_SESSION['login_user'];
        echo $login_session;?> </h1>
        <a href="logout.php"> Logout </a>
    </body>
    </html>