# laravelforum

My training forum with Laravel 5.5

## Use locally

You must get [Composer](https://getcomposer.org/) in your PATH.

```
git clone https://github.com/EloD10/laravelforum.git
cd laravelforum
```

Rename `.env.example` to `.env`.
Configure your `.env` file :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydatabase
DB_USERNAME=root
DB_PASSWORD=secret
```

Generate a new encryption key with this command: `php artisan key:generate`
Copy and paste this new key to `APP_KEY=` in line 3 to the `env.` file.

You can now access the the application. But we need to fill our database. 
```
php artisan migrate
php artisan tinker
$threads = factory('App\Thread', 50)->create();
$threads->each(function ($thread) { factory('App\Replies', 10)->create(['thread_id' => $thread->id]); });
```
These commands will auto-generate and fill automatically your tables. 

Finally ! You can launch the server with `php artisan serve`.
You can see existing routes in the routes folder, try for example to go on the `/threads` route. And don't forget to create a user.

## TODO

### Near Future

- [x] Add Replies functionality
- [x] Create Thread functionality
- [x] Channels functionality
- [x] Generic Filters functionality
- [x] "My Threads" filter
- [ ] More filters like "favorite" and "popular"
- [x] Migrate to Laravel 5.6
- [x] Add Paginations
- [ ] Meta Informations in threads/replies (examples: "number of replies", etc... it's an improvement of the interface and his data)
- [ ] Delete threads functionality
- [ ] Vote for replies
- [ ] Probably not use channels in a clickable dropdown but like a web interface/button like most of forums



### Far Future
- [ ] Use front-end framework, VueJS is considered
- [ ] Use Laravel Echo for real-time
- [ ] Administration Panel
- [ ] In a long future, i realy would like to rewrite this application in Rust with Rocket (or Actix) for up my skills in Rust and compare performance
- [ ] Rewrite front-end style and remove Bootstrap and experiment with new CSS tools (not be limited by rétropcompatibilty), probably it will be done when i will use a front-end framework.

