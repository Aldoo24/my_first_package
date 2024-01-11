
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
After the package has been installed, publish the package's config file where the api routes are found.  
    
```bash
  php artisan vendor:publish --tag=agency-config --force
```
You also may publish the views.
```bash
  php artisan vendor:publish --tag=agency-views --force
```

Add the middleware found in the package to the app/Http/Kernel.php file in the 'middlewareAliases' array. For example:
```
'activateAccount' => \Ap24\PackageForAgencies\Middleware\EnsureAgencyHasSecretKey::class,
```
## Usage/Examples

Use the 'activateAccount' middleware to protect the routes you want. If the key is not activated the user will be redirected to the verification view. 

**Note:** Make sure to include the email as a parameter in every request you use the middleware if you are not authenticated.


