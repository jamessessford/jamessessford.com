---
extends: _layouts.post
section: content
title: Ubuntu splash screens
date: 2019-12-23
description: A look at customising the splash screen for Ubuntu.
categories: [ubuntu]
excerpt: A look at customising the splash screen for Ubuntu.
cover_image: /assets/img/ubuntu-splash-screen.png
featured: true
---

I'd like to start by saying that I consider myself **terrible** at design
and animation but that is where my original spark for computing came from.

My parents got a 486 for the house when I was about 11 years old that came with
a box full of old games and old computing books. Inside this box were two items
that would change the course of my life.

##  Monkey Island

Up until this point of my life, I'd been a cartridge based gamer. After tearing
through the instruction manual, I learned that I had an A drive on the machine and
that these disks could be installed!

The install process was smooth, if I remember correctly I had an option or two to
select from and a beautiful console spinner to watch as the install progressed.

Not satisfied that I just had to run "install.bat", I opened the file in the editor
to see if I could understand what it was doing and to my suprise, I could read the
contents.

Batch files were a perfect entry point for me! Whilst confusing - there were a lot
of keywords I'd never seen before - I knew I'd seen a book in the box that was sent
over with a title similar to "Everything you ever wanted to know about DOS but were
afraid to ask your parents".

##  Everything you ever wanted to know about DOS but were afraid to ask your parents

This book became my bible. With it I was able to build context menus to help my
parents around the computer, create boot disks for games that demanded more resource
and then finally, with the discovery of ANSI.sys, change the entire look and feel of
the DOS command prompt that I loved.

The 486 eventually left us to visit the big mainframe in the sky but the ideas I
learned playing on that have always stuck with me:

An interface should be simple and easy to understand whilst also providing useful
feedback.

Having control over the style of the console was fantastic.

##  An impressionable child sees Hackers

We didn't have a computer in the house at the time I saw Hackers, and wouldn't for
many years later, but I never forgot the splash screens that everyone had when they
booted up their laptop. That seemed the obvious extension to me from being able to
customise the console.

I wouldn't remember to actually try this until many, *many* years later.

##  Enter, Plymouth!

```bash
// torchlight! {"lineNumbers": false}
sudo apt get plymouth-themes
```

Installing this gave me a directory where the currently running Ubuntu theme could
be edited.

Prepare three files to copy:

    progress-dot-off.png
    progress-dot-on.png
    ubuntu-logo.png

### ubuntu-logo.png

This should be the logo you want to appear when the machine boots up.
I'd suggest putting it on a transparent background.

##  progress-dot-off.png

This is a progress indicator in it's off state. I made it a blank png with full alpha
transparency.

##  progress-dot-on.png

This is a progress indicator in it's off state. I made it the same colour as the logo.

Move the three files you've created to

    /usr/share/plymouth/themes/ubuntu-logo/

The default background colour for the splash screen can be updated in

    /usr/share/plymouth/themes/ubuntu-logo/ubuntu-logo.script

You're looking for the following function calls:

    Window.SetBackgroundTopColor
    Window.SetBackgroundBottomColor

After completing this you're good to reboot and see your Hackersesque splash screen
in all its glory!
