#!/bin/bash

if [ $1 != "legacy" ] && [ $1 != "v3" ]; then
    echo "Target not allowed (only 'legacy' or 'v3')"
    exit
fi

docker exec -ti app-$1 bash -c 'cd /var/www/html/targets/'$1' && composer install'