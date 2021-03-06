# Shariff Symfony 2 Bundle

This bundle allows to easily integrate [Shariff](https://github.com/heiseonline/shariff-backend-php) with your Symfony 2 application

Installation
------------

Install the bundle with composer:

```
composer require valiton/shariff-bundle
```

and activate the bundle in your kernel.

Add the following to your app/config/routing.yml:

```
valiton_shariff:
    resource: "@ValitonShariffBundle/Resources/config/routing.xml"
    prefix:   /shariff
```

Configuration
-------------

Configure the bundle according to your needs, full config example:

```
valiton_shariff:
    domain: '<your-domain>' 
    force_protocol: ~ # http or https
    cache:
        cacheDir: '%kernel.cache_dir%'   
        ttl: 3600
        adapter: 'Apc' # to use apc for caching, 
    client: # optinal guzzle settings
        timeout: 4
        connect_timeout: 2
    services:
        Facebook:
            app_id: <your app id>
            secret: <your secret>
        GooglePlus: ~
        Twitter: ~
```

