<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamPlus\Models\Huyen;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Xa extends Model
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
    protected $table = 'list_xas';

    /**
     * Get the huyen that owns the Xa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function huyen(): BelongsTo
    {
        return $this->belongsTo(Huyen::class, 'huyen_id', 'id');
    }
}
