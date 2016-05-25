# websec_tutorial
Deliberately vulnerable PHP scripts for Web Security training

## Prerequisites
* [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)

## Setup
1. `git clone https://github.com/AvalZ/websec_tutorial.git` or `git clone git@github.com:AvalZ/websec_tutorial.git` or just download the zip from [here](https://github.com/AvalZ/websec_tutorial/archive/master.zip) and unzip it in a local folder.
2. `cd websec_tutorial/` (or `cd websec-tutorial-master` if you downloaded the zip)
3. `vagrant up`
4. Browse http://192.168.33.10
5. Create a table named 'accounts' or go to http://192.168.33.10/sqli/create_table.php
6. Fill the table with records, or go to: http://192.168.33.10/sqli/seed_table.php
7. Done!
