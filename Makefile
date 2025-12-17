COMPOSER_HOME ?= ${HOME}
CURRENT_UID := $(shell id -u)
CURRENT_GID := $(shell id -g)
YEAR ?= $(shell date +"%Y")
DAY ?= $(shell date +"%d")
.PHONY: run all lint bootstrap tests shell clean

run: vendor
	docker-compose run -u $(CURRENT_UID):$(CURRENT_GID) -T --rm php application.php aoc:run $(YEAR) $(DAY)

all: vendor
	docker-compose run -u $(CURRENT_UID):$(CURRENT_GID) -T --rm php application.php aoc:run --all

lint: vendor
	docker-compose run --rm php ./vendor/bin/phpcs .

bootstrap: vendor
	docker-compose run -u $(CURRENT_UID) -T --rm php application.php aoc:bootstrap --next

vendor:
	docker run --rm -it \
		-u $(CURRENT_UID):$(CURRENT_GID) \
		-v $(dir $(abspath $(lastword $(MAKEFILE_LIST)))):/app \
		-v ${COMPOSER_HOME}/.composer:/tmp/.composer \
		composer:2.9.2 composer install -n

tests: vendor
	docker-compose run -u $(CURRENT_UID):$(CURRENT_GID) -it --rm php ./vendor/bin/phpunit

shell:
	docker-compose run -u $(CURRENT_UID):$(CURRENT_GID) -it --rm --entrypoint /bin/sh php

clean:
	rm -rf vendor
