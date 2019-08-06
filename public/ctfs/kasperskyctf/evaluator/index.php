<html>
	<head>
		<title>Evaluator</title>
		<link rel="stylesheet" type="text/css" media="screen" href="//cdn.muicss.com/mui-0.9.41/css/mui.css" />
		<script src="//cdn.muicss.com/mui-0.9.41/js/mui.js"></script>
		<style>
			/* Add font-smoothing */
			html,
			body,
			input,
			textarea,
			button {
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
				text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
			}
			code{
				word-break: break-all;
			}
			body{
			  font-family: 'Montserrat', sans-serif;
			  -webkit-font-smoothing: antialiased;
			  background: #E7E7E7;
			  padding: 30px 60px;
			}
		</style>
    </head>
	<body>
		<div class="mui-panel">
			<form class="mui-form" method="POST" action="?action=calc">
				<legend>Expression evaluator</legend>
				<div class="mui-textfield">
					<input type="text" name="x" required>
					<label>Number or Token</label>
				</div>
				<div class="mui-select">
					<select name="op">
						<option value="sum">+</option>
						<option value="sub">-</option>
						<option value="mul">*</option>
						<option value="div">/</option>
					</select>
					<label>Operator</label>
				</div>
				<div class="mui-textfield">
					<input type="text" name="y" required>
					<label>Number or Token</label>
				</div>
				<button type="submit" class="mui-btn mui-btn--raised">Submit</button>
			</form>
		</div>
<?php

$error_message = "<div class=\"mui-panel\">
<font color=\"red\">%s</fond>
</div>";

function sum($params)
{
    return $params[0] + $params[1];
}

function sub($params)
{
    return $params[0] - $params[1];
}

function mul($params)
{
    return $params[0] * $params[1];
}

function div($params)
{
    return $params[0] / $params[1];
}

function un_minus($params)
{
    return -1 * $params[0];
}

function op_convert($op)
{
	switch ($op)
	{
		case "sum":
			return "+";
		case "sub":
			return "-";
		case "mul":
			return "*";
		case "div":
			return "/";
		default:
			global $error_message;
			die(sprintf($error_message, "Operator '{$op}' not exists!"));
	}
}

class Expression
{
    private $op;
    private $params;
	public $stringify;
    function __construct($op, $params)
    {
        switch ($op)
        {
            case "sum":
            case "sub":
            case "mul":
            case "div":
                $this->op = $op;
				$op_sign = op_convert($op);
                break;
            default:
				global $error_message;
				die(sprintf($error_message, "Operator '{$op}' not exists!"));
        }
        $this->params = [];
		$str_params = [];
		foreach ($params as $param)
        {
            if (is_numeric($param))
            {
                array_push($this->params, floatval($param));
				array_push($str_params, $param);
            } else
            {
                $expr = @unserialize(@base64_decode($param));
                if ($expr)
                {
                    array_push($this->params, $expr->evaluate());
					array_push($str_params, "(" . $expr->stringify. ")");
                } else
                {
					global $error_message;
                    die(sprintf($error_message, "Bad argument"));
                }
            }
        }
		$this->stringify = $str_params[0] . " " . $op_sign . " " . $str_params[1];
    }

    function evaluate()
    {
        return ($this->op)($this->params);
    }

    function __toString()
    {
        return strval($this->evaluate());
    }
}

if (isset($_GET['action']))
{
    $action = $_GET['action'];
    if ($action == 'load')
    {
        if (isset($_GET['token']))
        {
            $expr = @unserialize(@base64_decode($_GET['token']));
			echo "<div class=\"mui-panel\">";
            echo "<pre>" . $expr->stringify . " = " . $expr . "</pre>";
			echo "</div>";
        }
    }
    if ($action == 'calc')
    {
        if (isset($_POST['x']) && isset($_POST['y']) && isset($_POST['op']))
        {
            $expr = new Expression($_POST['op'], [$_POST['x'], $_POST['y']]);
			echo "<div class=\"mui-panel\">";
            echo "<pre>" . $expr->stringify . " = " . $expr . "</pre>";
            $token = @base64_encode(@serialize($expr));
            echo "<code>Token: {$token}<br></code>";
            echo "<a href=\"?action=load&token={$token}\">Share it</a>" . PHP_EOL;
			echo "</div>";
        }
    }
}
?>
	</body>
</html>
