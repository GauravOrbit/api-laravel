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
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

class AppInstallation extends BaseApiModel implements LogsActivityInterface
{

    use LogsActivity;

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

    /**
     * Get the message that needs to be logged for the given event name.
     *
     * @param string $eventName
     * @return string
     */
    public function getActivityDescriptionForEvent($eventName)
    {
        if ($eventName == 'created') {
            return 'AppInstallation "' . $this->name . '" was created';
        }

        if ($eventName == 'updated') {
            return 'AppInstallation "' . $this->name . '" was updated';
        }

        if ($eventName == 'deleted') {
            return 'AppInstallation "' . $this->name . '" was deleted';
        }

        return '';
    }
}
