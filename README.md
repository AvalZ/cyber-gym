# Cyber Gym
## Deliberately vulnerable PHP scripts for Web Security training

An array of vulnerable Web pages to test security tools or manual assessment.

## Usage (Docker)

### Prerequisites
* [Docker and docker-compose](https://docker.io)

### Setup

1. Clone this repository
    * `git clone https://github.com/AvalZ/cyber-gym.git` _or_
    * `git clone git@github.com:AvalZ/cyber-gym.git` _or_
    * download the zip from [here](https://github.com/AvalZ/cyber-gym/archive/master.zip) and unzip it in a local folder.
2. `cd cyber-gym/` (or `cd cyber-gym-master` if you downloaded the zip)
3. `docker-compose up`
4. Browse http://127.0.0.1:8080
5. Create a table named 'accounts' or go to http://127.0.0.1:8080/db/setup_db.php
6. Done!

## Usage (Vagrant)

### Prerequisites
* [Virtualbox](https://www.virtualbox.org/wiki/Downloads)
* [Vagrant](https://www.vagrantup.com/downloads.html)

### Setup

1. Clone this repository
    * `git clone https://github.com/AvalZ/cyber-gym.git` _or_
    * `git clone git@github.com:AvalZ/cyber-gym.git` _or_
    * download the zip from [here](https://github.com/AvalZ/cyber-gym/archive/master.zip) and unzip it in a local folder.
2. `cd cyber-gym/` (or `cd cyber-gym-master` if you downloaded the zip)
3. `vagrant up`
4. Browse http://192.168.33.10
5. Create a table named 'accounts' or go to http://192.168.33.10/db/setup_db.php
6. Done!

## Useful links

* [Slides - Common Attacks](https://docs.google.com/presentation/d/1rRpO9-9agNAUETXPjfsm7dMUZ3EPfKxWcaP-W8kt0ZM/edit?usp=sharing)
* [mysqli\_real\_escape\_string gotchas](https://avalz.it/blog/debunking-the-mysql_real_escape_string-myth/)
* [Slides - Web Security Hands-on](https://docs.google.com/presentation/d/1L27fhQWU8Cz9VrfSrNn-SrMiBvcx7tlXa2m5ot4IXCM/edit?usp=sharing)

## ZenHackademy 

* [Part 1 - Client-Side Security](https://docs.google.com/presentation/d/1JEYzoVQ7WgJkt2X_U2rKFBqPpKimLVWPvToiyr8vTBM/edit?usp=sharing)
* [Part 2 - Server-Side Security](https://docs.google.com/presentation/d/1z_vHrtTMHP4Xz9w2IZpNaVqn1SuAjq_azk8Njtcro0I/edit?usp=sharing)
