# Laravel Chat Application with EMOJI Support 

[![Latest Stable Version](https://poser.pugx.org/hanishkumar/chatapp/v/stable)](https://packagist.org/packages/hanishkumar/chatapp) [![Total Downloads](https://poser.pugx.org/hanishkumar/chatapp/downloads)](https://packagist.org/packages/hanishkumar/chatapp) [![Latest Unstable Version](https://poser.pugx.org/hanishkumar/chatapp/v/unstable)](https://packagist.org/packages/hanishkumar/chatapp) [![License](https://poser.pugx.org/hanishkumar/chatapp/license)](https://packagist.org/packages/hanishkumar/chatapp)

###Installing

```bash
	composer require hanishkumar/chatapp
```

Add to config/app.php the following line to the 'providers' array:

```php
	Hanish\ChatApp\ChatAppServiceProvider::class,
```

Publish Migrations

```php
	php artisan migrate
```

Publish Asserts To Public Folder to install basic theme for chat

```php
	php artisan vendor:publish
```

To Include ChatBox In Your Master Page Just Add

```php
	 @if(!empty(Auth::user()->id))
                        @include('chat::directChat')
            @endif
```

