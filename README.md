# 📷 Instagram Scraper

[![Latest Stable Version](https://poser.pugx.org/instagramscraperapi/php-sdk/v)](https://packagist.org/packages/instagramscraperapi/php-sdk) [![Total Downloads](https://poser.pugx.org/instagramscraperapi/php-sdk/downloads)](https://packagist.org/packages/instagramscraperapi/php-sdk) [![License](https://poser.pugx.org/instagramscraperapi/php-sdk/license)](https://packagist.org/packages/instagramscraperapi/php-sdk)

Instagram scraper, with support for users, medias, tags, comments and locations. Proxified by Residential and 4G Proxies.

Get a public users data, media, or search for a specific tag or location, without having to register an app.

Since this library uses the web version of Instagram to scrape content, it can break at any time should the returned source code for these pages change.

Proxified for [Instagram Scraper API](https://instagramscraperapi.com) use a intelligent proxy balancing to better data get and no blocking, success rate is very high.

## Requirements

- Instagram Scraper API
- PHP 5.6.0 or higher


## Installation

```
composer require instagramscraperapi/php-sdk
```


## Usage

### Starting API

Informe your Rapid API Key

```php
$is = new InstagramScraperAPI\InstagramScraper('API-KEY');
```

### Getting a public users data

Returns all public data from an Instagram profile.

```php
// by Username
$result = $is->getProfileByUsername('nike');

// by URL
$result = $is->getProfileByURL('https://www.instagram.com/nike/');
```

### Getting medias

Returns all public medias.

```php

// by User Id
$result = $is->getMedias(13460080);

// by public Hashtag
$result = $is->getMediaByHashtag('travel');

// by public Place
$result = $is->getMediaByLocation(108424279189115);

```

### Getting a media data

Returns a specific public media data.

```php
// by Media Shortcode
$result = $is->getMediaByCode('CMe3AQxnhmd');

// by Media URL
$result = $is->getMediaByUrl('https://www.instagram.com/p/CMnW2SBMKiu/');

```

### Getting search results

Returns a list of users, tags or locations

```php

// by Hashtags
$result = $is->searchHashtags('travel');

// by Location
$result = $is->searchLocations('New york');

// by Userame
$result = $is->searchUsers('nik');

```








