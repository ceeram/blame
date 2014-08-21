Blame
-----

CakePHP 3.0 plugin to update `created_by` and `modified_by` fields.

Installation
============

Run the following command:

`composer require ceeram/cakephp-blame:dev-master`

or add the following lines to your application's `composer.json`:

```
    "require": {
        "ceeram/cakephp-blame": "dev-master"
    }
```

followed by the command:

`composer update`

Configuration
=============

Add the following line to your AppController:

```
    use \Blame\Controller\BlameTrait;
```

Attach the behavior in the models you want with:

```
    public function initialize(array $config) {
        $this->addBehavior('Blame.Blame');
    }
```