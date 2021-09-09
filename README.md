
# イメージ＆コンテナ作成・再作成

> docker compose up -d --build --force-recreate

# コンテナ起動

> docker compose start
# composer install

> docker compose exec app bash -ic "composer install"

# create .env

> docker compose exec app bash -ic "cp .env.example .env && php artisan key:generate"

# マイグレーション & Seed

> docker compose exec app bash -ic "php artisan migrate"
> docker compose exec app bash -ic "php artisan db:seed"

# .envファイルの設定

```
DB_HOST=db
DB_PASSWORD=password

SANCTUM_STATEFUL_DOMAINS=127.0.0.1:8080
```

# devサーバー起動

> docker compose exec app bash -ic "npm run hot"

# ブラウザで確認

http://127.0.0.1:8080

## ポートの使用先

* 8080 => Laravel(api)
* 3030 => LaravelMix(app.js)
* 35729 => livereload(websocket)

## Hotリロードを使わず閲覧するだけなら

docker compose exec app bash -ic "npm run dev"

