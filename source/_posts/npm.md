---
extends: _layouts.post
section: content
title: NPM
date: 2020-04-01
description: Initial NPM setup that always slips my mind.
categories: [ubuntu, reminders]
excerpt: Initial NPM setup that always slips my mind.
---

I was setting up a Rasperry Pi over the weekend and I'd forgotten how to set up NPM permissions so I don't have to use sudo to install global packages

```bash
mkdir ~/.npm-global
npm config set prefix '~/.npm-global'
```

That's a relief - sudo npm'ing anything is a terrifying prospect!