THIS := $(realpath $(lastword $(MAKEFILE_LIST)))
HERE := $(shell dirname $(THIS))

.PHONY: all fix audit

all: audit

fix:
	php -n -dmemory_limit=12G -dzend_extension=opcache.so -dopcache.enable_cli=On -dopcache.jit_buffer_size=128M $(HERE)/vendor/bin/php-cs-fixer fix -vvv --config=$(HERE)/.php-cs-fixer.php

audit:
	php -n -dmemory_limit=12G -dzend_extension=opcache.so -dopcache.enable_cli=On -dopcache.jit_buffer_size=128M $(HERE)/vendor/bin/php-cs-fixer fix -vvv --config=$(HERE)/.php-cs-fixer.php --dry-run
