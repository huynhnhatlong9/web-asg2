<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <!-- Font -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />
    <!--Add this-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/queries.css" />
    <title>Siro web</title>
  </head>
  <body>
    <nav>
      <div class="header__logo-box">
        <a href="#"
          ><img src="./img/logo.png" alt="srdb" class="header__logo"
        /></a>
      </div>
      <ul class="header__nav-bar">
        <li><a href="#home">home</a></li>
        <li><a href="#about">about</a></li>
        <li><a href="service.html">service</a></li>
        <li><a href="pricing.html">pricing</a></li>
        <li><a href="contact.html">contact</a></li>
        <?php 
        include "./lib/database.php";
        if (isset($_SESSION['uid'])){
            $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
            $query = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);
            echo '
                <li class="user-section"><a href="login.php">'.$row['first_name'].'</a></li>
                ';
        }
        else{
                echo '
                <li class="user-section"><a href="login.php">Login</a></li>
                
                ';
        }
        ?>
      </ul>
      <i class="fas fa-bars mobile-nav-icon"></i>
    </nav>
    <div class="section-container">
      <header id="home" class="header">
        <div class="nav">
          <div class="header__logo-box">
            <a href="#home"
              ><img src="./img/logo.png" alt="srdb" class="header__logo"
            /></a>
          </div>
          <ul class="header__nav-bar">
            <li><a href="#home">home</a></li>
            <li><a href="#about">about</a></li>
            <li><a href="service.html">service</a></li>
            <li><a href="pricing.html">pricing</a></li>
            <li><a href="contact.html">contact</a></li>
            <?php 
        if (isset($_SESSION['uid'])){
            $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
            $query = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);
            echo '
                <li class="user-section"><a href="login.php">'.$row['first_name'].'</a></li>
                ';
        }
        else{
                echo '
                <li class="user-section"><a href="#">Login</a></li>
                ';
        }
        ?>
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