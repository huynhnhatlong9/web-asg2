<?php
$authen = '';
if (!isset($_SESSION['username'])) {
  $authen = '<li><a href="login.php">login</a></li>';
} else {
  $authen = '<li><a href="logout.php">Logout</a></li>';
}

?>

<nav>
    <div class="header__logo-box">
        <a href="#"><img src="./img/logo.png" alt="srdb" class="header__logo" /></a>
    </div>
    <ul class="header__nav-bar">
        <li><a href="#home">home</a></li>
        <li><a href="#about">about</a></li>
        <li><a href="service.html">service</a></li>
        <li><a href="pricing.html">pricing</a></li>
        <li><a href="contact.html">contact</a></li>
        <?php echo $authen ?>
    </ul>
    <i class="fas fa-bars mobile-nav-icon"></i>
</nav>

<div class="section-container">
    <header id="home" class="header">
        <div class="nav">
            <div class="header__logo-box">
                <a href="#home"><img src="./img/logo.png" alt="srdb" class="header__logo" /></a>
            </div>
            <ul class="header__nav-bar">
                <li><a href="#home">home</a></li>
                <li><a href="#about">about</a></li>
                <li><a href="service.html">service</a></li>
                <li><a href="pricing.html">pricing</a></li>
                <li><a href="contact.html">contact</a></li>
                <?php echo $authen ?>
            </ul>
            <i class="fas fa-bars mobile-nav-icon"></i>
        </div>

        <div class="header__text-box">
            <h3 class="heading-primary">
                <span class="heading-primary--main">we are the most</span>
                <span class="heading-primary--sub">
                    our best quality for business
                </span>
            </h3>
        </div>
        <div class="header__btn header__btn--1">
            <a href="#about" class="btn btn--white btn--animated"> read more </a>
        </div>
        <div class="header__btn header__btn--2">
            <a href="contact.html" class="btn btn__opacity--slow"> contact us </a>
        </div>
    </header>
</div>