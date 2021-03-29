# MunkiReport ReportData v2 Module #

> An example of using laravel's auto-discover functionality to find MunkiReport modules

## Walkthrough ##

## Layout ##

```shell script

assets/     # Frontend (JavaScript / CSS / etc) Assets
  js/
config/     # Module Config File
  config.php  # provides "defaults"
factories/  # Database Faker Factories - Used to generate test data
graphql/    # GraphQL Schema
  schema.graphql
locales/    # Laravel i18n Locales (Not currently used)
migrations/ # Laravel Database Migrations
web-routes.php   # Web (HTML) Routes
api-routes.php   # Api (JSON or other) Routes
scripts/    # Install and Uninstall scripts, as well as collection scripts.
            # Same as MunkiReport 5.6
src/        # All the backend code for the module lives here.
  ModuleServiceProvider.php  # The main way to register module functionality
  Controller.php             # Controller for this module
  Model.php                  # Eloquent model for this module
  ApiController.php          # REST API Controller
  ModelResource.php          # (optional) JSON representation of Model
  ModelCollectionResource.php  # (optional) JSON representation of List of Models
views/      # Backend rendered HTML views (Blade or KISSMVC)
  x.php        # KISSMVC view
  x.blade.php  # Blade view
```

## Configuration ##

Instead of editing the configuration from the package, you may use the artisan `vendor:publish` command
to copy the provided config file into the munkireport root config, for example:

    php please vendor:publish --provider="Munkireport\Packagename\ModuleServiceProvider" --tag="config"

As long as the ModuleServiceProvider contains a line to publish the config file, something like:

    $this->publishes([
      __DIR__.'/../config/config.php' => config_path('mypackage.php'),
    ], 'config');

## provides.php VS ModuleServiceProvider ##

You may register a module the old way (using provides.php), or you can register the module inside
ModuleServiceProvider, but you can't do both.


