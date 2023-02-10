COMPOSER_HOME ?= ${HOME}
CURRENT_UID := $(shell id -u)
CURRENT_GID := $(shell id -g)
YEAR ?= $(shell date +"%Y")
DAY ?= $(shell date +"%d")
.PHONY: run all bootstrap clean

run: vendor
	docker-compose run -T --rm php application.php aoc:run $(YEAR) $(DAY)

all: vendor
	docker-compose run -T --rm php application.php aoc:run --all

bootstrap: vendor
	docker-compose run -T --rm php application.php aoc:bootstrap --next

vendor:
	docker run --rm -it \
		-u $(CURRENT_UID):$(CURRENT_GID) \
		-v $(dir $(abspath $(lastword $(MAKEFILE_LIST)))):/app \
		-v ${COMPOSER_HOME}/.composer:/tmp/.composer \
		composer:2.4.4 composer install -n

tests: vendor
	docker-compose run -T --rm php ./vendor/bin/phpunit

clean:
	rm -rf vendor
