<?php
ob_start();
?>
<h1>Welcome to the Home Page</h1>

<a href="index.php?page=users&action=createUser" class="buttonHome">Inscription</a>
<a href="index.php?page=users&action=login" class="buttonHome">Login</a>
<?php
$content = ob_get_clean();
require_once __DIR__ . "/layout.php";
?>