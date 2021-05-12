<?php
session_start();
session_unset();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}