
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
After the package has been installed you may publish the view and the config file with the following command. 
    
```bash
  php artisan vendor:publish --provider=Ap24\PackageForAgencies\AgenciesServiceProvider --force
```
## Usage/Examples

Use the 'activateAccount' middleware to protect the routes you want. If the key is not activated the user will be redirected to the verification view. 

**Note:** Make sure to include the email as a parameter in every request you use the middleware if you are not authenticated.


