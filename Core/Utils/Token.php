<?php

namespace Core\Utils;

abstract class Token {

    static public function generate() {
        if (!empty($_SESSION['csrf']) && !empty($_SESSION['csrf']['token'])) {
            $_SESSION['csrf'] ['createAt'] = new \DateTime();
            return $_SESSION['csrf']['token'];
        }
        $token = bin2hex(random_bytes(32));

        $_SESSION['csrf'] = [
            'token' => $token,
            'createAt' => new \DateTime(),
        ];

        return $token;
    }

    static public function verify($token) {
        if (empty($_SESSION['csrf'])) {
            return false;
        }

        if ($_SESSION['csrf']['token'] !== $token) {
            return false;
        }

        if ((time() - $_SESSION['csrf']['createAt']->getTimestamp()) > 15 * 60) {
            return false;
        }
        unset($_SESSION['csrf']);
        return true;
    }

}
