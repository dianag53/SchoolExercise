<?php
$username = $_POST["username"];
$password = $_POST["password"];

/** es kann aber auch password_verify genutzt werden =>
 * nicht sha1 => nicht sicher
 * Wofür ist PASSWORD_BCRYPT?
 **/
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo "password: " . $password;

