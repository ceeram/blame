# Blame

[![Build Status](https://api.travis-ci.org/ceeram/blame.png)](https://travis-ci.org/ceeram/blame)
[![Latest Stable Version](https://poser.pugx.org/ceeram/cakephp-blame/v/stable.svg)](https://packagist.org/packages/ceeram/cakephp-blame)
[![Total Downloads](https://poser.pugx.org/ceeram/cakephp-blame/downloads.svg)](https://packagist.org/packages/ceeram/cakephp-blame)
[![Latest Unstable Version](https://poser.pugx.org/ceeram/cakephp-blame/v/unstable.svg)](https://packagist.org/packages/ceeram/cakephp-blame)
[![License](https://poser.pugx.org/ceeram/cakephp-blame/license.svg)](https://packagist.org/packages/ceeram/cakephp-blame)

CakePHP 3.0 plugin to update `created_by` and `modified_by` fields.

## Installation


Add the following lines to your application's `composer.json`:

```
    "require": {
        "ceeram/cakephp-blame": "~1.0"
    }
```

followed by the command:

`composer update`

Or run the following command directly without changing your `composer.json`:

`composer require ceeram/cakephp-blame:~1.0`

## Usage

In your app's `config/bootstrap.php` add: `Plugin::load('Ceeram/Blame')`;

## Configuration

Add the following line to your AppController:

```
    use \Ceeram\Blame\Controller\BlameTrait;
```

Add the following inside your AppController Class

```
class AppController extends Controller
{
    use BlameTrait;
}
```

Attach the behavior in the models you want with:

```
    public function initialize(array $config) {
        $this->addBehavior('Ceeram/Blame.Blame');
    }
```
