# Dixie Street Storage

This is the central repository for Dixie Street Storage. It's really simple.

## Installation

In order to get the Mailgun mailer to work correctly, you must install Mailgun wherever the application resides. To do this, simply run the following:


```bash
~$ cd path/to/project

~/path/to/project$ php composer.phar install
```

Is that it? Not quite.

In your project directory you should see a ```env.php.dist``` clone that file as ```env.php``` and update the values to reflect your required Mailgun environment.

```bash
~$ cp env.php.dist env.php
```

```env.php```
```php

return [
    'domain' => 'your.sites.domain.com',
    'to' => 'First Last <user2@example2.org',
    'api_key' => 'mailgun-api-key-7284edc3c0fbfbc15a53'
];
```
