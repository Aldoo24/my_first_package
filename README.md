
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

## Usage/Examples

Use the 'activateAccount' middleware to protect the routes you want. If the key is not activated the user will be redirected to the verification view. 

To uri for the verification view is 'verify-key'. If you want to return this view from your controller use 'ap24::verify-key'.

If the verification is successful, the user will automatically be redirected home. If you wish the user is redirected somewhere else, in the published 'agency.php' config file, add to the array the route name you want pairing it with the 'redirect' key. Example: 
```
'redirect' => //The name of the route
``` 

**Note:** Make sure to include the email as a parameter in every request you use the middleware if you are not authenticated.


