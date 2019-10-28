# Asana Intergration for Laravel
A simple Laravel package for integrating [Asana's API](https://developers.asana.com/docs/) with a Laravel application.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/christhompsontldr/laravel-asana.svg?style=flat-square)](https://packagist.org/packages/christhompsontldr/laravel-asana)

## Installation

### Composer
`composer require christhompsontldr/laravel-asana`

### Config

Uses Laravel's `vendor:publish` to publish the package's configuration file.  This is not a required step.

## Commands

### CustomFields

Asana.com doesn't have a way to get the `gid` for your workspace's custom fields.  This command will list all the information for your custom fields

`php artisan asana:custom-fields`

Pass it a workspace ID as the first parameter to get custom fields from a different workspace than the one configured in the config/asana.php file.

### Users

Get the users and their associated information from the Asana workspace

`php artisan asana:users`

## Events

### AsanaResponse

This event fires whenever a response from Asana is received.  This allows your application to execute listeners based on the response.
