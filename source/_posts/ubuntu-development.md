---
extends: _layouts.post
section: content
title: Ubuntu development
date: 2019-12-10
description: Web development on Ubuntu
categories: [ubuntu, development]
excerpt: A look at the environment I've built for web development on Ubuntu.
---

After a few days, and a few more installs, I think I've got to a development 
environment I'm quite happy with.

It's essentially the same as the Windows environment with the addition of Nginx 
and Supervisor.

    -   VSCode for editing files
    -   Nginx to serve the application
    -   Supervisor to monitor php tasks
    -   MySQL and Redis running as background services
    -   Node running webpack or gulp
    -   Firefox to view the website

##  Nginx

I chose Nginx as the web server in my stack as it's just as easy to configure it 
to serve PHP as it is to upstream a connection to a Node backend.

This has eased development by allowing me to have one less terminal open when 
working on a project.

I can also quickly switch between the front end of any of the projects I'm building 
as they'll all have a dedicated config file.

##  Supervisor

Supervisor is a process control manager that monitors the status of it's running 
task and will automatically restart a task/process on error.

By using Supervisor to control these tasks, I've removed the need to have another 
couple of terminal panes open and also stopped myself from needing to start workers 
the project may rely on.

##  Current state of happiness

Very happy. So far I haven't needed to boot back on to the Windows machine and I'm 
very much enjoying developing on Ubuntu.
