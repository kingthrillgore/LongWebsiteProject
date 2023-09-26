<?php

class User {
    // Fields
    public string $email;
    public string $password;

    // Methods
    // TODO Make Private
    public function check_email(string $email) {

    }

    // TODO Make Private
    public function check_password(string $password) {

    }

    // TODO Make Private
    public function check_access(int $id) {

    }

    public function open_session() {

    }

    public function close_session() {

    }

    public function check_session() {

    }

    public function create_user() {
        
    }

    private function crypt_password(string $password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}