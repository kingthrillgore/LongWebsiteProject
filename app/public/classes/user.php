<?php

class User {
    // Fields
    public string $email;
    public string $password;

    // Methods
    public function check_password(string $password) {

    }

    private function crypt_password(string $password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}