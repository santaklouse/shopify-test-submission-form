<?php

namespace App\Http\Controllers;

use App\Shopify;
use Illuminate\Support\Arr;

class CustomersController extends Controller
{

    private function _filter($customers = [])
    {
        return array_map(function($customer) {
            return [
                'id' => $customer->id,
                'name' => $customer->first_name . ' ' . $customer->last_name,
                'phone' => $customer->phone,
                'country' => (!empty($customer->default_address)) ? $customer->default_address->country_name : ''
            ];
        }, $customers);
    }

    public function searchAction()
    {
        $query = request()->query('q');
        $customers = Arr::get($this->_shopify = Shopify::getAdminCustomersSearch([
            'query' => 'first_name:'.$query . '* OR last_name:'.$query.'*'
        ]), 'data')->customers;

        return response()->json(
            [
                'response' => $customers = $this->_filter($customers)
            ],
            200
        );
    }

    public function listAction()
    {
        $customers = Arr::get($this->_shopify = Shopify::getAdminCustomers(), 'data')->customers;

        return response()->json(
            $customers = $this->_filter($customers),
            500
        );
    }

}
