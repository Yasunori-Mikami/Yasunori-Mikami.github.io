<header class="header_top header_bg">
    <h1><a href="../../index.php">WAFOO</a></h1>
    <nav>
        <ul>
            <li><a href="../search/search.php">Search Experience</a></li>
            <li><a href="../host/host_top.php">Become a Host（ホストになる）</a></li>
            <li>
                <?php if($_SESSION["user_id"] != ""){ ?>
                <a href="../mypage/mypage.php">My Page</a>
                <?php } else { ?>
                <a href="../mypage/sign_up.php">Sign up</a>
                <?php } ?>
            </li>
            <li>
                <?php if($_SESSION["user_id"] != ""){ ?>
                <a href="../../backend/logout.php">Log Out</a>
                <?php } else { ?>
                <a href="../mypage/login.php">Log in</a>
                <?php } ?>
            </li>
        </ul>
    </nav>
</header>
