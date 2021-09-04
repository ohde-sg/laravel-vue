#!/usr/bin/env bash

service php8.0-fpm start

# entrypoint & cmd of nginx base image
/docker-entrypoint.sh
nginx -g "daemon off;"
