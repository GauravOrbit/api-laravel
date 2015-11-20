<?php
/**
 * The class for User api calls
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class BaseApiModel extends Model
{

    /**
     * Return Table represent with the associated model
     * 
     * @return tablename
     */
    public static function table()
    {
        $instance = new static;
        return $instance->getTable();
    }

    /**
     * Return Table columns with the associated model
     * 
     * @return table columns
     */
    public static function getTableColumns($tableName)
    {
        return Schema::getColumnListing($tableName);
    }
}
