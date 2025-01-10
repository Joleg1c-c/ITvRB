<?php
namespace App\Models;

class User {
    public $uuid;
    public $username;
    public $first_name;
    public $last_name;

    public function __construct($uuid, $username, $first_name, $last_name) {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
}

?>