---
extends: _layouts.post
section: content
title: Leaving Windows
date: 2019-12-07
description: Leaving Windows to try Ubuntu
categories: [ubuntu, development]
excerpt: A look at the reasons that got me to leave Windows and give Ubuntu a proper try.
---

Before I look at the reasons that got me to leave Windows, I must first state that I write this article from a position of extreme privilege.

I have a steady job that doesn't always require me to work extra hours so I have free time to play with different OSes and fortunate to have two laptops in the house that I could tinker with.

My girlfriend and I both had Windows machines, hers for college work and email, 
mine for web development. Both laptops are around five years old.

**Hers:**

    -   Toshiba Satelite
    -   AMD Dual Core
    -   4gb RAM
    -   Windows 8
    -   500gb hard drive

**Mine**

    -   Lenovo Thinkpad
    -   Intel Celeron
    -   4gb RAM
    -   Windows 10
    -   1tb hard drive

The Toshiba laptop had sat abandoned until college started and with not being updated regularly, it was impossible to get it back to a usable standard to work on. This caused it to be reabandoned and we shared one laptop for a couple of months.

Let's go back a week or two.

Whilst [developing on Windows](/blog/windows-development.html), my average response time to serve a page was > 20 seconds and the memory footprint for each page served was around 15mb (reported by Laravel Debugbar).

I was trying out Inertia.js and was heavily under the impression that I must have some
disastorous config setup on my machine, either in the project or the way I'd set up PHP itself. I went through a lot of posts/articles online for fine tuning PHP and Laravel
performance on Windows and tried several different ways to serve the application, all with little reduction in response time or memory cost.

The best experience I had with web development on Windows came using Laragon but I still felt it wasn't running smoothly enough that I was being productive.

I decided to flash one of the Raspberry Pi's and put the project on there and see if I could tweak it to run a little better. Debugbar reported a memory drop of ~12mb and the response time was down to milliseconds. It appeared the bottleneck was my laptop.

Let's jump back to the present.

Attempts to get both my machine to a state I was happy developing in and the Toshiba laptop just to be usable had burned out. I pitched the idea of a swap.

My laptop was decent enough for college work and I was willing to take a chance that I could put linux on the Toshiba and it be a comparable, if not better, experience to the Windows machine I was currently using. My expectations were completely blown away.

While not achieving the bar set by the Raspberry Pi, which didn't have VSCode or any of the other background services required to run the Windows laptop, the Toshiba reported < 1s response time and ~5mb memory consumption for initial page load and then ~750ms response time there after.

The next little while will be spent rebuilding my development environment on an Ubuntu machine :)