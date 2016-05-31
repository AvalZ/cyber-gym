<?php

echo "<hr>";
echo "<h3>Creating 'accounts' table</h3><br>";
include('accounts/create_table.php');
echo "<hr>";
echo "<h3>Seeding 'accounts' table</h3><br>";
include('accounts/seed_table.php');
echo "<hr>";
echo "<h3>Creating 'datacapture' table</h3><br>";
include('datacapture/create_table.php');
echo "<hr>";
