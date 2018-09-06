# Use

Use laravel `5.6.*`.
    
```    
PHP >= 7.1.3
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Ctype PHP Extension
JSON PHP Extension
```

 - `composer install`
 - `npm run dev`
 - Configure your database and connection to it in `.env`.
 - `php artisan migrate --seed`
 - `php artisan serve`
  
An admin account is automatically created, connect to it with `a@a.com` and
`aaaaaa`.

# Todo

- Investigate query optimization
- Notification 
- An admin can delete a user
- search and filters