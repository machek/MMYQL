MMYQL
=====
Version 0.01 Created by Zdenek Machek during Yahoo! Hack Europe: London 2013

Introduction
------------
This is simple module simplifying YQL  - Yahoo! Query Language (http://developer.yahoo.com/yql/) usage

## Installation

 1. Add `"machek/mmyql": "dev-master"` to your `composer.json` file and run `php composer.phar update`.
 2. Add `MMYQL` to your `config/application.config.php` file under the `modules` key.
 3. copy /vendor/machek/mmyql/configmmyql.local.php.dist to /config/autoload/mmyql.local.php

 ##usage
```php
		$select = "latitude, longitude, radius";
        $from = "geo.placefinder";
        $where = "text=\"{$query}\"";

        $response = $this->getServiceLocator()->get('serviceYQL')->executeQuery($select, $from, $where);
        $responseArray = json_decode($response);
```
