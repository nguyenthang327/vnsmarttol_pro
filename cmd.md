* B1: download project và chạy cmd
```bash
composer i
```

```bash
php artisan key:generate
```

* B2: run migrate database
```bash
php artisan migrate
```

* B3: run seeder
```bash
php artisan db:seed
```

* B4: cấu hình env mail
sửa các mục sau với giá trị phù hợp để có thể gửi mail

```bash
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

* B5: chạy clear cache

```bash
php artisan optimize:clear
```