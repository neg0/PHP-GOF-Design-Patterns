#!/bin/bash

if [ ! -d "/usr/local/patterns/vendor" ]; then
  cd /usr/local/patterns
  composer install
fi