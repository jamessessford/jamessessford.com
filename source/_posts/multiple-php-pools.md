---
extends: _layouts.post
section: content
title: Multiple PHP Pools
date: 2020-05-10
description: Setup for seperate PHP Pools.
categories: [ubuntu, development]
excerpt: Setup for seperate PHP Pools.
---

PHP has gotten phenomenal to work with over the last few years.
There have been so many improvements - both to the language itself and, in my humble opinion, the developer experience in using the language every day.

I'm a terrible hypeman for anything but if you're interested in the current state of PHP, I'd highly recommend reading [PHP in 2020](https://stitcher.io/blog/php-in-2020) by Brent Roose.

One of the new features of PHP that I wanted to experiment with was preloading but I had several sites on my Rasperry Pi and they didn't all depend on the same code, so I needed to seperate my instances.

## Enter pools

PHP pools are seperate processes that can each be used to serve a subset of requests. You'll probably already be using the default pool at the moment:

```nginx
server {
    ###

    server_name www.test;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }

    ###
}
```

On Ubuntu, PHP pool configuration is located at ```/etc/php/7.4/fpm/pool.d/```. I'd start by copying the template that's there for my new pool.

```bash
cd /etc/php/7.4/fpm/pool.d
sudo cp www.conf www2eb.conf
```

You'll then want to edit this file and update, at minimum, a setting or two.

```bash
sudo nano www2eb.conf
```

Update the name of the pool:

```ini
; Start a new pool named 'www'.
; the variable $pool can be used in any directive and will be replaced by the
; pool name ('www' here)
[www2eb]
```

If you want to change the user that owns the pool, update the following:

```ini
; Unix user/group of processes
; Note: The user is mandatory. If the group is not set, the default user's group
;       will be used.
user = poolowner
```

Lastly, we need to give it a different socket so we can send requests to it via NGINX

```ini
; Note: This value is mandatory.
listen = /run/php/php7.4-fpm.poolowner.sock
```

Now that we've updated the PHP pools, we need to update our NGINX server block to point to the correct socket:

```nginx
server {
    ###

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.poolowner.sock;
    }

    ###
}
```

We've now made all of the updates that we need, it's time to restart our services:

```bash
sudo service nginx restart && sudo service php-7.4-fpm restart
```

You can now check that your new PHP pool is working by visiting your site in a browser.