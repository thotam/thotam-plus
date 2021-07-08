<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamPlus\Models\Xa;
use Thotam\ThotamPlus\Models\Tinh;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Huyen extends Model
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
    protected $table = 'list_huyens';

    /**
     * Get the tinh that owns the Huyen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tinh(): BelongsTo
    {
        return $this->belongsTo(Tinh::class, 'tinh_id', 'id');
    }

    /**
     * Get all of the xas for the Huyen
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function xas(): HasMany
    {
        return $this->hasMany(Xa::class, 'huyen_id', 'id')->orderBy('order')->orderBy('name');
    }
}
