# Config Multiple Modules for Phalcon version 3
1. Clone this source and replace on your Phalcon project version 3
    * You can replace `Service` word in all file to your `Project name` because `Service` is my Project name
2. Go to `app` > `modules` folder and clone `frontend` folder to `<new module>` folder
3. Go to `<new module>` folder and edit `Module.php` file. Replace `Frontend` to `<new module>`'s name (Example: `User`) at:
    ```vim
        namespace Service\Modules\Frontend;
    ```
    ```vim
        $loader->registerNamespaces([
            'Service\Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Service\Modules\Frontend\Models' => __DIR__ . '/models/',
        ]);
    ```
    ```vim
        $dispatcher->setDefaultNamespace("Service\Modules\Frontend\Controllers");
    ```
4. Change namespace in all `Controller file` to `<new module>`'s name. In this case, `User` is the new module's name:
    ```vim
        namespace Service\Modules\User\Controllers;
    ```
5. Go to `loader.php` file and add `<new module>` item into `$loader->registerClasses`. In this case, `user` is the new module:
    ```vim
        'Service\Modules\User\Module' => APP_PATH . '/modules/user/Module.php'
    ```
6. Config `bootstrap_web.php` file at `$application->registerModules` add `<new module>` item into this array. In this case, `user` is the new module:
    ```vim
        'user' => ['className' => 'Service\Modules\User\Module']
    ```
7. Go to `routes.php` file and add `<new router>` for `<new module>`. Example:
    ```vim
        $router->add('/user', [
            'module' => 'user',
            'controller' => 'index',
            'action' => 'index'
        ]);
    ```
##### Set Vim font to a Nerd Font

Linux
 ```vim
 set guifont=<FONT_NAME> <FONT_SIZE>
 ```
## Done! Hope it'll help you.
### Daniel - sir.truonghuynh@gmail.com - https://fb.com/mr.d.luffy.93