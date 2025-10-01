# Changelog functionality

## Generell
Often I want to add a changelog or a version to my website. I use the version from the composer.json file and the Changelog from the Changelog.md file.
With this bundle I realized this with a [VersionService](../src/Service/VersionService.php) and [Controller](../src/Controller/VersionController.php).

## Controller
To use the Controller, you have to import the routes of this bundle in your application:


``` yaml
# config/routes/tdc_toolbox.yaml

tdc_toolbox_routes:
    resource: "@TdcToolboxBundle/config/routes.php"
    type: php
    prefix: /toolbox
```

## VersionService
The [VersionService](../src/Service/VersionService.php) is used to serve the version and the changelog in a cached way.