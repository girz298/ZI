#!/usr/bin/env bash

if [ -n "$1" ] && [ $1 = "DEBUG" ]
then
    docker  build ./docker/php -t zi_php
else
    docker  build -q ./docker/php -t zi_php
fi

docker run -v "$PWD"/app/:/app/ zi_php php /app/LCG/main.php