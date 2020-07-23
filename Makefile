
uid := $(shell id -u)
gid := $(shell id -g)

init: docker-down-clear docker-build docker-up composer-install

docker-up:
	export uid=$(uid) gid=$(gid); \
	docker-compose -f ./docker-compose.yml up -d

docker-down:
	export uid=$(uid) gid=$(gid); \
	docker-compose -f ./docker-compose.yml down --remove-orphans

docker-down-clear:
	export uid=$(uid) gid=$(gid); \
	docker-compose -f ./docker-compose.yml down -v --remove-orphans

docker-build:
	export uid=$(uid) gid=$(gid); \
	docker-compose -f ./docker-compose.yml build

composer-install:
	export uid=$(uid) gid=$(gid); \
	docker-compose -f ./docker-compose.yml run --rm app-php-cli composer install

test:
	docker-compose -f ./docker-compose.yml run --rm app-php-cli php bin/console.php sum ted path=123