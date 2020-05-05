---
extends: _layouts.post
section: content
title: NGINX 
date: 2020-03-23
description: NGINX stubs and reminders.
categories: [ubuntu, reminders]
excerpt: NGINX stubs and reminders.
---

NGINX has been my web server of choice for quite a few years now.
There are many approaches for fine tuning but the template below serves as the starting point for a new Laravel project:

```nginx
server {

    ## Begin - Server Info
    listen 80;
    index index.html index.php;
    root /home/user/site/deploys/current/public;
    server_name site.test;
    ## End - Server Info

    ## Begin - Index
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    ## End - Index

    ## Begin - PHP
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.3-fpm.sock;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root/$fastcgi_script_name;
    }
    ## End - PHP

    ## Begin - Security
    # deny all direct access for these folders
    location ~* /(.git|cache|bin|logs|backups|tests)/.*$ { return 403; }
    # deny running scripts inside core system folders
    location ~* /(system|vendor)/.*\.(txt|xml|md|html|yaml|php|pl|py|cgi|twig|sh|bat)$ { return 403; }
    # deny running scripts inside user folder
    location ~* /user/.*\.(txt|md|yaml|php|pl|py|cgi|twig|sh|bat)$ { return 403; }
    # deny access to specific files in the root folder
    location ~ /(LICENSE.txt|composer.lock|composer.json|nginx.conf|web.config|htaccess.txt|\.htaccess) { return 403; }
    ## End - Security
}
```

## Continuous Delivery

The NGINX setup I'm using above allows me to achieve continuous delivery of my projects. ```/current/``` is symlinked to the correct folder during my deployment process.

