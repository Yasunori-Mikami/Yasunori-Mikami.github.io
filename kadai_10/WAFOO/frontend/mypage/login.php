<?php
session_start();
?>
<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>
<main>
    <section class="userRegi_form">
        <h2>Log In</h2>
        <form action="../../backend/login_act.php" method="post" id="host_form" enctype="multipart/form-data">
            <p>USER ID　　<input type="text" name="email" size="64" placeholder="Email" class="login_input"></p>
            <p>PASSWORD<input type="password" name="password" size="64" placeholder="Password" class="login_input"></p>
            <p class="tac"><input type="submit" value="Log In" class="userRegi_btn"></p>
        </form>
        <div class="option_comment">
            <p>Don’t you have an account yet ?</p>
            <a href="sign_up.php">Sign Up for Free</a>
        </div>
    </section>
</main>
<?php include("../common/footertag.html")?>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/script.js"></script>
</body>
</html>