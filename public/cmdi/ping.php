<?php

// Ping the selected host 4 times
$output = shell_exec("ping -c 4 " . $_GET['host']);

// Use htmlspecialchars to prevent Reflected XSS
echo htmlspecialchars($output);
