<?php

namespace App\Service;

class ProductProcessor
{
    public function processProducts(array $items): array
    {
        return array_map(function($item) {
            return [
                'asin' => $item['ASIN'],
                'title' => $item['ItemInfo']['Title']['DisplayValue'],
                'brand' => $item['ItemInfo']['ByLineInfo']['Brand']['DisplayValue'],
                'price' => $item['Offers']['Listings'][0]['Price']['Amount'],
                'displayPrice' => $item['Offers']['Listings'][0]['Price']['DisplayAmount'],
                'savings' => $item['Offers']['Listings'][0]['Price']['Savings'] ?? null,
                'image' => $item['Images']['Primary']['Large']['URL'],
                'features' => $item['ItemInfo']['Features']['DisplayValues'] ?? [],
                'ranking' => $item['BrowseNodeInfo']['BrowseNodes'][0]['SalesRank'],
                'url' => $item['DetailPageURL'],
                'freeShipping' => $item['Offers']['Listings'][0]['DeliveryInfo']['IsFreeShippingEligible']
            ];
        }, $items);
    }
}