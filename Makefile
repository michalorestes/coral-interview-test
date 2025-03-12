test: unit

unit:
	APP_ENV=test ./vendor/bin/phpunit -c ./phpunit.xml --testsuite unit

.PHONY: specs
