<?php

/**
 * @return userRole 0 : guest, 1 : user, 2 : admin
 */
function getUserRole() {
    $userLoggedIn = isset($_SESSION['user_id']);
    $userIsAdmin = false;
    
    if ($userLoggedIn) {
        require_once __DIR__ . '../../../models/UserModel.php';
        $userModel = new UserModel();
        $userData = $userModel->getCurrentUser();
        $userIsAdmin = $userData['category'] === 'admin';
    }

    $userRole = 0;
    if($userLoggedIn) {
        $userRole = 1;
    }
    if($userIsAdmin) {
        $userRole = 2;
    }
    return $userRole;
}
