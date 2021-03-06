<?php

class Model_Item extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'itemId',
        'title',
        'globalId',
        'primaryCategory',
        'galleryURL',
        'viewItemURL',
        'paymentMethod',
        'autoPay',
        'postalCode',
        'location',
        'country',
        'shippingInfo',
        'sellingStatus',
        'listingInfo',
        'condition',
        'isMultiVariationListing',
        'topRatedListing',
        'sellerUserName',
        'feedbackScore',
        'storeName',
        'storeURL',
        'categoryID',
        'created_at',
        'updated_at',
    );

    protected static $_table_name = 'nan';

    protected static $_observers = array(
        'Orm\\Observer_Self' => array(
            'events' => array('before_save', 'after_load', 'before_update', 'after_insert', 'before_delete'),
        ),
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );

    public static function _init()
    {
        static::$_table_name = \Config::get('search.table');
    }

    public function _event_before_save()
    {

    }

    public function _event_before_update()
    {
    }

    public function _event_after_insert()
    {

    }
    public function _event_before_delete()
    {

    }

    public function _event_after_load()
    {

    }

    public static function get_count($categoryId = null)
    {
        if (is_null($categoryId)) {
            $result = \DB::query('SELECT count(*) as count FROM `'. \Config::get('search.table') . '` where isnull(`categoryId`)')->execute();
        } else {
            $result = \DB::query('SELECT count(*) as count FROM `'. \Config::get('search.table') . '` where `categoryId` =' . $categoryId)->execute();
        }

    // Fragile
    return (int)$result[0]['count'];
    }
}
