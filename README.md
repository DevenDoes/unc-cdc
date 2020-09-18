## laravel-docker
My simple Docker Compose framework for developing Laravel applications on a LEMP stack. Original inspired by [Andrew Schmelyun's repo](https://github.com/aschmelyun/docker-compose-laravel).

### Initial Setup
To initialize the cloned repository for use locally, run the `init.sh` script.

This script removes the `.git` repository directory and the `src/README.md` file to allow for a new Git repository for the Laravel project.


### How it Works
[Docker](https://docs.docker.com/docker-for-windows/install/) must be installed to utilize this repository. 

I am running Docker for Windows 10 on a WSL2 Ubuntu 20.04 backend. More information regarding my Docker environment can be found [here](https://docs.docker.com/docker-for-windows/wsl/).

Once Docker has been installed, clone this repository to your local file system and start the Docker containers with the following command:
```shell script
docker-compose up -d --build site
```

Next, navigate to the `src` directory and add the Laravel project. For more information on how to clone an existing Laravel project or create a fresh one, reference the `src/README.md` file.

By specifying that Docker Compose start the container network with `site` rather than `up`, we prevent the command containers (composer, npm, artisan, etc.) from being unnecessarily started.

By default, the following containers, and corresponding exposed ports, are built when starting the web server:

Container | Exposed Port(s)
--- | ---
nginx | `8080 -> 80`
mysql | `3306 -> 3306`
php | `9000 -> 9000`

Additionally, to eliminate the necessity for command line tools to be installed on the local machine, the following command containers are included:

Local | Container
--- | ---
`composer ...` | `docker-compose run --rm composer ...`
`npm ...` | `docker-compose run --rm npm ...`
`php artisan ...` | `docker-compose run --rm artisan ...`

### MySQL
When configuring the Laravel application's `.env` file, use each service's Docker container name in place of an IP address. For example:

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql # container name instead of localhost
DB_PORT=3306
DB_DATABASE=laravel
DB_USERBNAME=docker
DB_PASSWORD=secret
```