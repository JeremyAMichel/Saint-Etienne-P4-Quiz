<?php

if (isset($_SESSION['game']) && !empty($_SESSION['game'])) {
    unset($_SESSION['game']);
}
?>