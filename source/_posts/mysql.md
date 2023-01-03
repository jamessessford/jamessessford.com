---
extends: _layouts.post
section: content
title: MySQL
date: 2020-03-08
description: A few reminders of how to work with MySQL.
categories: [ubuntu, reminders]
excerpt: A few reminders of how to work with MySQL.
---

I always forget how to do some MySQL operations, especially the more modern ways to add users.
I'm listing them here in hopes of either cementing the information because I've written it down
or finding my own blog post when I have to search again :)

Depening on what environment you're working in, you could be accessing MySQL in a multitude of different ways.
I'm currently using DBeaver &amp; MyCLI on my Ubuntu laptop &amp; HeidiSQL at work.

## Databases

```sql
// torchlight! {"lineNumbers": false}
CREATE DATABASE mydatabase;
```

## Users

```sql
// torchlight! {"lineNumbers": false}
CREATE USER 'mydatabaseuser'@'%' IDENTIFIED WITH mysql_native_password BY 'mydatabasepassword';
```

## Permissions

```sql
// torchlight! {"lineNumbers": false}
GRANT ALL ON mydatabase.* to 'mydatabaseuser'@'%';
FLUSH PRIVILEGES;
```

## Access

```bash
// torchlight! {"lineNumbers": false}
mycli -u mydatabaseuser -p mydatabase
```

I'll probably update this post with more MySQL things I remember that I forget as time goes on!