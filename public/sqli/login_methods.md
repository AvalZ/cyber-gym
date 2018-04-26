# Login methods

$query = "SELECT * FROM accounts WHERE email='$email' AND password=SHA('$pass', salt)";

$2y$10$VJsadqdsda

SELECT password FROM users WHERE username='qualcosa' OR email='qualcosa'

$password = $res->.....

if (password_verify($input_passwd, $password) === true ) {
     echo "OK";
}

 SHA($pass,salt) -+
                  |
                  V
 +----+------+----------+------+
 | id | user | password | salt |
 +----+------+----------+------+
 |  1 | abc  | ab103d.. | ba1..|
 |  2 | cb2  | 5adsd1.. | c1d..|
 +----+------+----------+------+

 ... (user, password, salt) VALUES('$user', SHA(CONCAT('$pass', '$salt'), '$salt')

 SELECT * FROM users WHERE user='$user' AND password=SHA(CONCAT('$pass', salt))
