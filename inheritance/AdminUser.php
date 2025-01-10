<?php

class AdminUser extends User {
    public $permissions;

    public function __construct($id, $name, $email, $password, $permissions) {
        parent::__construct($id, $name, $email, $password);
        $this->permissions = $permissions;
    }

    public function grantPermission($permission) {
        $this->permissions[] = $permission;
    }
}

?>
