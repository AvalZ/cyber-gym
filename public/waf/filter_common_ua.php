<?php

$badagent = false;

$badAgents = array('chrome', 'mozilla', 'apple', 'webkit', 'firefox', 'edge', 'ie', 'safari');

foreach($badAgents as $agent) {
    if(stripos($_SERVER['HTTP_USER_AGENT'],$agent) !== false) {
        $badagent = true;
    }
}


if ($badagent) {
    echo "Your browser is not allowed here.";
} else {
    echo "flag{user_agents_cant_be_trusted}";
}
