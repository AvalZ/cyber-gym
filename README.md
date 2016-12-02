# Web Security Tutorial scripts
Deliberately vulnerable PHP scripts for Web Security training

## Prerequisites
* [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)

## Setup
1. Clone this repository
    * `git clone https://github.com/AvalZ/websec_tutorial.git` _or_
    * `git clone git@github.com:AvalZ/websec_tutorial.git` _or_
    * download the zip from [here](https://github.com/AvalZ/websec_tutorial/archive/master.zip) and unzip it in a local folder.
2. `cd websec_tutorial/` (or `cd websec_tutorial-master` if you downloaded the zip)
3. `vagrant up`
4. Browse http://192.168.33.10
5. Create a table named 'accounts' or go to http://192.168.33.10/db/setup_db.php
6. Done!

## Useful links
* [Slides - Common Attacks](https://docs.google.com/presentation/d/1rRpO9-9agNAUETXPjfsm7dMUZ3EPfKxWcaP-W8kt0ZM/edit?usp=sharing)
* [mysqli\_real\_escape\_string gotchas](https://avalz89.wordpress.com/2016/06/23/debunking-the-mysql_real_escape_string-myth/)
* [Slides - Web Security Hands-on](https://docs.google.com/presentation/d/1L27fhQWU8Cz9VrfSrNn-SrMiBvcx7tlXa2m5ot4IXCM/edit?usp=sharing)
