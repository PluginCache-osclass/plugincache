plugincache
===========
version 2.0.0

Plugin Cache is an improved version of Simple Cache plugin for Osclass.
Plugin renders php files into static html files, reducing server response and page loading times.

Features
========

- individual/optional caching of main page, search page, item and static pages
- option to define individual regeneration intervals
- option to manually delete cached group of pages (main/search/item/static)
- automatic regeneration each time user visits page if present any changes
- search page cache is only for categories and regions (no pattern and cities caching)
- dynamic updates of cached pages:
  - when an ad is posted or deleted, search and main cache is cleaned
  - any modification on the ad, such us edit the ad or adding a comment or deactivate etc, will clean the ad cache
- item cache folder now have subfolders (item pubblication date)
- user can choose how to create the subfolders for items (by day, by month, by year)
- cached page html comment tags with date & time stamp in source code of each html file as a reference
