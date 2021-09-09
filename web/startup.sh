#!/usr/bin/env bash

# 環境変数用設定ファイル作成
printenv | grep APP_ | sed -r "s/^APP_(.+)\=(.+)$/env[\1]=\2/" > /etc/php/8.0/fpm/php-fpm-env.conf

service php8.0-fpm start

# entrypoint & cmd of nginx base image
/docker-entrypoint.sh
nginx -g "daemon off;"
