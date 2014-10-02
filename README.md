Blame
-----

CakePHP 3.0 plugin to update `created_by` and `modified_by` fields.

Installation
============

Add the following lines to your application's `composer.json`:

```
    "require": {
        "ceeram/cakephp-blame": "dev-master"
    }
```

followed by the command:

`composer update`

Or run the following command directly without changing your `composer.json`:

`composer require ceeram/cakephp-blame:dev-master`

Configuration
=============

Add the following line to your AppController:

```
    use \Ceeram\Blame\Controller\BlameTrait;
```

Attach the behavior in the models you want with:

```
    public function initialize(array $config) {
        $this->addBehavior('Ceeram/Blame.Blame');
    }
```