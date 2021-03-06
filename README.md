# Config Multiple Modules for Phalcon version 3
1. Clone this source and replace on your Phalcon project version 3
    * You can replace `Service` word in all file to your `Project name` because `Service` is my Project name
2. Go to `app` > `modules` folder and clone `frontend` folder to `<new module>` folder
3. Go to `<new module>` folder and edit `Module.php` file. Replace `Frontend` to `<new module>`'s name (Example: `User`) at:

    ```
        namespace Service\Modules\Frontend;
    ```

    ```
        $loader->registerNamespaces([
            'Service\Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Service\Modules\Frontend\Models' => __DIR__ . '/models/',
        ]);
    ```

    ```
        $dispatcher->setDefaultNamespace("Service\Modules\Frontend\Controllers");
    ```

4. Change namespace in all `Controller file` to `<new module>`'s name. In this case, `User` is the new module's name:

    ```
        namespace Service\Modules\User\Controllers;
    ```

5. Go to `loader.php` file and add `<new module>` item into `$loader->registerClasses`. In this case, `user` is the new module:

    ```
        'Service\Modules\User\Module' => APP_PATH . '/modules/user/Module.php'
    ```

6. Config `bootstrap_web.php` file at `$application->registerModules` add `<new module>` item into this array. In this case, `user` is the new module:

    ```
        'user' => ['className' => 'Service\Modules\User\Module']
    ```

### P/s: Remember create `.phalcon` folder in Project root Folder ###
## Done! Hope it'll help you.
### Daniel - sir.truonghuynh@gmail.com - https://fb.com/daniel.huynh1368