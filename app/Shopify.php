<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopify extends Model
{

    /**
     * Shopify API instance
     *
     * @var object
     */
    public $shopify = null;

    private static $instance = null;
    /**
     * @return Singleton
     */
    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $shopify_config = config('shopify');
        $this->shopify = \App::make('ShopifyAPI', array_merge(
            $shopify_config,
            ['ACCESS_TOKEN'  => $shopify_config['API_SECRET']]
        ));
    }

    private static function _getApiPath($name)
    {
        preg_match_all('/((?:^|[A-Z])[a-z]+)/', $name, $matches);

        return $matches[0];
    }

    public static function __callStatic($name, $arguments = [])
    {
        $obj = self::getInstance();
        $path = self::_getApiPath($name);
        $method = array_shift($path);
        $path = strtolower(implode($path, '/'));

        $query_string = '';
        if (!empty($arguments)) {
            $query_string = '?' . http_build_query($arguments[0]);
        }
        try
        {
            $customers = $obj->shopify->call([
                'METHOD'    => strtoupper($method),
                'URL'       => '/' . $path . '.json' . $query_string
            ]);
            return [
                'data' => $customers,
                'error' => ''
            ];
        }
        catch (Exception $e)
        {
            return [
                'data' => [],
                'error' => $e->getMessage()
            ];

        }
    }

}
