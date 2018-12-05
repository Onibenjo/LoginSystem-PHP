<?php
echo "hiiii";
$password2 = 'bman1997';
$password = '$2y$10$UoW5zcm23BQF07SaTO1a.O1aqt/HCh1256Zfo7kQXGpgUav7umSCS';
$password3 = password_hash("bman1997", PASSWORD_DEFAULT);

if (password_verify($password2, $hash)) {
    echo "hi";
}
echo (password_verify($password, $hash));
?>