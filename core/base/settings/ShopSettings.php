<?php


namespace core\base\settings;

use core\base\settings\Settings;

class ShopSettings
{
    static private $_instance;
    private $baseSettings;

    private  $routes = [

        'plugins' => [
            'path' => 'core/plugins/',
            'hrUrl' => false,
            'dir' => false,
            'routes' => [

            ]
        ],
    ];

    private $templateArr = [
        'text' => ['priceXXX', 'adressYYY'],
        'textArea' => ['contentXXX', 'keywordsYYY', 'goods_content']
    ];


    private function __construct()
    {
    }
    private function __clone()
    {
    }

    static public function get($property){
        return self::instance()->$property;

    }

    static public function instance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

            self::$_instance = new self;
            self::$_instance->baseSettings = Settings::instance();
            $baseProperties = self::$_instance->baseSettings->glueProperties(get_class());
           self::$_instance->set_property($baseProperties);
            return self::$_instance;
    }
    protected function set_property($properties){
        if($properties){
            foreach ($properties as $name => $property){
                $this->$name = $property;
            }
        }
    }

}