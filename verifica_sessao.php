<?php

session_start();

if(!isset($_SESSION['nome']) || !isset($_SESSION['senha'])) {
  unset($_SESSION['id']);
  unset($_SESSION['nome']);
  unset($_SESSION['senha']);
  header('location:./index.html');
  exit;
}

?>