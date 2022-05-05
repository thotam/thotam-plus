<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamHr\Models\HR;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ChiNhanh extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;

    /**
     * Disable Laravel's mass assignment protection
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chinhanhs';

    /**
     * The giamdocs that belong to the ChiNhanh
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function giamdocs(): BelongsToMany
    {
        return $this->belongsToMany(HR::class, 'chinhanh_giamdocs', 'chinhanh_id', 'hr_key');
    }
}
