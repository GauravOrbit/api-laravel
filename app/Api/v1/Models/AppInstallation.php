<?php
/**
 * The class for User api calls
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
namespace App\Api\v1\Models;

use App\Api\v1\Models\BaseApiModel;

class AppInstallation extends BaseApiModel
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_installations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['installation_id', 'app_identifier', 'app_name', 'app_version', 'app_checksum', 'client_id', 'owner_id', 'badge', 'timezone', 'device_type', 'status'];

}
