<?php
namespace Munkireport\ReportData;

use Illuminate\Database\Eloquent\Model;
//use App\Scopes\NotUpdatedForScope;
//use App\Scopes\UpdatedBetweenScope;
//use App\Scopes\UpdatedSinceScope;

class ReportData extends Model
{
    /**
     * @inheritDoc
     */
    protected $table = 'reportdata';

    public $timestamps = false;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'serial_number',
        'console_user',
        'long_username',
        'uid',
        'remote_ip',
        'uptime',
        'reg_timestamp',
        'machine_group',
        'archive_status',
        'timestamp',
    ];

    protected $casts = [
        'uptime' => 'integer'
    ];

    //// RELATIONSHIPS

    /**
     * Retrieve the machine model associated with this report data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Munkireport\Machine\Machine', 'serial_number', 'serial_number');
    }

    // Leaky abstractions
    public function munkireport() {
        return $this->belongsTo('Munkireport\MunkiReport\MunkiReport', 'serial_number', 'serial_number');
    }

    public function warranty() {
        return $this->belongsTo('Munkireport\Warranty\Warranty', 'serial_number', 'serial_number');
    }

    //// SCOPES

//    use UpdatedSinceScope;
//    use NotUpdatedForScope;
//    use UpdatedBetweenScope;
    
}
