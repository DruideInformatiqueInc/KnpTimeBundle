# Friendly ago dates ("5 minutes ago")!

This bundle does one simple job: takes dates and gives you friendly "2 hours ago"-type messages. Woh!

```html+jinja
Last edited {{ post.updatedAt|ago }}
<-- Last edited 1 week ago -->
```
Added functionality : stop displaying "ago" format after a specified time and display the date in long format after this time
```html+jinja
Last edited {{ post.updatedAt|ago("now"|date('Y-m-d H:i:s'),'+ 1 month') }}
<-- Last edited 1 week ago -->
<-- Last edited January 22, 2019 -->
```

The date formatted can be translated into any language, and may are supported out of the box.

## INSTALLATION via Composer

    composer require knplabs/knp-time-bundle

## CONFIGURATION
Register the bundle:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Knp\Bundle\TimeBundle\KnpTimeBundle(),
    );
    // ...
}

// Symfony 4.x
// config/bundles.php
return [
    //...
    Knp\Bundle\TimeBundle\KnpTimeBundle::class => ['all' => true],
];
```

Enable the translation component if you haven't already done it:

```yaml
# app/config/config.yml
framework:
    # ...
    translator:      { fallback: '%locale%' } # uncomment this line if you see this line commented

# Symfony 4.x
# config/packages/translation.yaml
framework:
    # ...
    translator:
        default_path: '%kernel.project_dir%/translations'
        fallbacks: ['%locale%']

```


## USAGE

In PHP!

```php
<?php
// Use the helper with Php
echo $view['time']->diff($dateTime); // returns something like "3 minutes ago"
```

In Twig!

```html+jinja
{{ someDateTimeVariable|ago }}
... or use the equivalent function
{{ time_diff(someDateTimeVariable) }}
```

With time paramater
```html+jinja
{{ someDateTimeVariable|ago("now"|date('Y-m-d H:i:s'),'+ 1 month') }}
The time paramater must be in a format supported by the strtotime function
```

## TESTS

If you want to run tests, please check that you have installed dev dependencies.

```bash
./vendor/bin/phpunit
```

## Maintainers

Anyone can contribute to this repository (and it's warmly welcomed!). The following
people maintain and can merge into this library:

 - [@akovalyov](https://github.com/akovalyov)
 - [@weaverryan](https://github.com/weaverryan)
 - [@NicolasNSSM](https://github.com/NicolasNSSM)
