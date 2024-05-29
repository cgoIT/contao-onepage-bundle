# Onepage Bundle for Contao Open Source CMS

With this bundle you can easily add a onepage navigation to your website. **No jQuery required!**

## How to install

### Contao Managed Edition


**With the awesome Contao Manager**

1. Search in the Contao Manager search bar the bundle `cgoit/contao-onepage-bundle` and click on the install button.
2. Go to the install tool and update the database. Then login into the back end.

**Without the awesome Contao Manager**

Run in your project folder the following Composer command to add the Onepage Bundle to your project:

```console
    composer require cgoit/contao-onepage-bundle
```

Clear the cache and warmup the cache with the following two commands:

```console
    vendor/bin/contao-console cache:clear --no-warmup
    vendor/bin/contao-console cache:warmup
```

Go to the install tool and update the database. Then login into the back end.

## Dependencies

- `php: ^8.1`
- `contao/core-bundle: ^4.13 || ^5.3`

## Licence

The onepage bundle is published under the LGPLv3.

## Documentation

[Go to the documentation](https://cgoit.github.io/contao-onepage-bundle/DOCUMENTATION)

[Zur Dokumentation (DE)](https://cgoit.github.io/contao-onepage-bundle/DOCUMENTATION-DE)
