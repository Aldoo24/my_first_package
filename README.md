
# Package for agencies

This package allows you to verify your users through an api key.




## Features

- Verify your users secret key
- Verify if your users key is activated through a middleware

## Installation

This package can be required with composer. Paste the following command in your project's terminal.

```bash
  composer require ap24/package-for-agencies:dev-main
```
After the package has been installed you need to publish the files necessary for the package to work. 
    
```bash
  php artisan vendor:publish --provider=Ap24\PackageForAgencies\AgenciesServiceProvider --force
```
In your app/Http/Middleware folder a new middleware named EnsureAgencyHasSecretKey has been added. You need to change this middleware's namespace according to your project and register it in app/Http/Kernel.php in the 'middlewareAliases' array.
## Usage/Examples

Create a route named 'verify-key' which returns the published blade file named 'verify-secret-key' in you views/vendor/agencies folder. Then create a route named 'verify-secret-key' for the controller method where you are going to verify the key and redirect the user. In your controller use the already loaded gate, for example:
```php
if (Gate::allows(enter-app)) {
  //redirect the user
}
```

Use the middleware you registered previously to protect the routes you want.

**Note:** Make sure the user is authenticated before verifying the secret key. 

