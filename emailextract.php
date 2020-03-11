<?php
class User
{
    public function extractEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }
        
        $username = substr($email, 0, strpos($email, '@'));
        if (strpos($username, ".") !== false) {
            $res = explode('.', $username);
            $username = '';
            foreach ($res as $v) {
                $username .= $v[0];
            }
            return $username;
        } else {
            return $username;
        }
    }
}
    $user = new User;
    $email = "quirjohnincoy@gmail.com";
    echo "<pre>";
    echo $user->extractEmail($email);
    echo "</pre>";
?>