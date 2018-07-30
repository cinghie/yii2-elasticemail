# Yii2 Elasticemail
Yii2 Elasticemail extension to manage the Email Marketing Platform: https://www.elasticemail.com

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require cinghie/yii2-elasticemail "*"
```

or add

```
"cinghie/yii2-elasticemail": "*"
```

Configuration
-------------

Set on your configuration file, in modules section

```
'modules' => [ 
    
    'elasticemail' => [
        'class' => 'cinghie\elasticemail\Elasticemail'
    ]
    
]
```
