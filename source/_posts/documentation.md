---
extends: _layouts.post
section: content
title: Writing better documentation
date: 2022-10-16
description: Documentation
categories: [documentation]
excerpt: An attempt to write better documentation or how I learned to stop worrying and love Ibis.
---

Over the past couple of months I've been asked at work to write more documentation.

This isn't a bad thing. I think even if you take away the instant benefits for the team/business and focus solely on yourself, it provides a sometimes easier way to refresh yourself on the inner workings of something than source diving a whole project/branch/feature to try and remember something.

I think the biggest problem I had with writing documentation was consinstency.

If I was using Word or a program like it, I'd have to remember all of the styles I was using for sections/headings etc and make sure I'd remembered to follow them throughout a sometimes lengthy document and that quite often left me in a state where I didn't want to even start writing, coupled with the fear of having to get a correct table of contents and page numbering right was also crippling.

## Enter Ibis

[Ibis](https://github.com/themsaid/ibis) is a fantastic tool created by [Mohamed Said](https://twitter.com/themsaid) that allows you to create a PDF document based on a directory of [Markdown](https://www.markdownguide.org/basic-syntax/) and image files.

## What's different?

Now I can write my documentation in an environment I have much more control over - Markdown and CSS.

As the [repo](https://github.com/themsaid/ibis) explains, it comes with two themes which are completely editable to the look and feel you wish to go for with your documentation and enforce consistency throughout.

It also allows you to add a cover image and automatically generates a clickable table of contents for your document, with all pages numbered correctly.
