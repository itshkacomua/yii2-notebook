Notepade module for yii2

========================

Notepade module for yii2



Installation

------------



1. The preferred way to install this extension is through [composer](http://getcomposer.org/download/).



Either run



```

php composer.phar require --prefer-dist itshkacomua/yii2-notebook "dev-master"

```



or add



```

"itshkacomua/yii2-notebook": "dev-master"

```



to the require section of your `composer.json` file.


2. In the console of the root directory of the site, run the command
 ```
 php yii migrate --migrationPath=@itshkacomua/notebook/migrations/
```

Usage

-----


Once the extension is installed, simply use it in your code by  :



```php

<?= \itshkacomua\notebook\AutoloadExample::widget(); ?>```
