Cache Plugin
============
version 2.0.5
forum topic: http://forums.osclass.org/plugins/caching-plugin/

Cache Plugin is an improved version of Simple Cache plugin for Osclass.
Plugin renders php files into static html files, reducing server response and page loading times.

Features
--------

- individual/optional caching of main page, search page, items and static pages
- option to define individual regeneration intervals
- option to manually delete cached group of pages (main/search/item/static)
- automatic regeneration each time user visits page if present any changes
- search page cache is only for categories and regions (no pattern and cities caching)
- dynamic updates of cached pages:
  - when a new ad is posted, search and main cache are cleaned (option to disable this behaviour)
  - when an ad is deleted, search and main cache are cleaned
  - any modifications to an ad, such as editing the ad or adding a comment or deactivating it etc, will clean the ad cache
- item cache folder now has subfolders (per item publication date)
- option to choose how the subfolders for items are created (by day, by month, by year)
- cached html page includes in source code comment tags with date & time stamp of each html file as a footprint/reference
