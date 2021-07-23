<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamPlus\Models\Huyen;
use Wildside\Userstamps\Userstamps;
use Thotam\ThotamPlus\Models\ChiNhanh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tinh extends Model
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
    protected $table = 'list_tinhs';

    /**
     * Get the chinhanh that owns the Tinh
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chinhanh(): BelongsTo
    {
        return $this->belongsTo(ChiNhanh::class, 'chinhanh_id', 'id');
    }

    /**
     * Get all of the huyens for the Tinh
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function huyens(): HasMany
    {
        return $this->hasMany(Huyen::class, 'tinh_id', 'id')->where('active', true)->orderBy('order')->orderBy('name');
    }
}
