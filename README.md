GlobalXtreme Parser
======

[![Latest Release](https://poser.pugx.org/globalxtreme/response/v/stable.png)](https://packagist.org/packages/globalxtreme/response)
[![Total Downloads](https://poser.pugx.org/globalxtreme/response/downloads.png)](https://packagist.org/packages/globalxtreme/response)
[![License](https://poser.pugx.org/globalxtreme/response/license.png)](https://packagist.org/packages/globalxtreme/response)

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require globalxtreme/response
```

## Using
- Install custom constant error/success and helpers with command.
    ```bash
    php artisan globalxtreme:response-install 
    ```
- Copy helpers file path app/Packages/Response/Status/globals.php to composer.json
    ```json
    {
        "autoload": {
            "files": [
                "app/Packages/Response/Status/globals.php"
            ]
        }
    } 
    ```
- You can add custom helpers function for error/success response in app/Packages/Response/Status/globals.php
    ```php
    use App\Packages\Response\Constant\Error;

    if (!function_exists("errTestingCustom")) {
        function errTestingCustom($internalMsg = "")
        {
            error(Error::DEFAULT, $internalMsg);
        }
    }
    ```
- Using response with controller.
    ```php
    use App\Http\Controllers\Controller;
    use App\Models\Custom;
    use GlobalXtreme\Parser\Parser;
    use GlobalXtreme\Response\Response;
    use GlobalXtreme\Response\Status;
    
    class CustomController extends Controller
    {
        public function testing() 
        {
            // Get more than one data
            $customs = Custom::get();
            
            // Display data auto call parser from Response package 
            $results = success($customs);
  
            // Display data using parser class
            $result = success(Parser::get($customs));
  
  
            // Get one data
            $custom = Custom::first();
            
            // Display data auto call parser from Response package
            $result = success($custom);
  
            // Display data using parser class
            $result = success(Parser::first($custom));
  
  
            // Get data with pagination
            $customs = Custom::paginate(10);
            
            // Display data auto call parser from Response package 
            $results = success($customs);
  
            // Display data using parser class and manual process pagination
            $results = success(Parser::get($customs), pagination: pagination($customs));

            // Display response using Response::class
            $status = new Status(true);
  
            // You can choose response type json/object
            $results = Response::json($status, $customs);
            $results = Response::object($status, $customs);
        }
    }
    ```