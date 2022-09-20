<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamHr\Models\HR;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thotam\ThotamCpc1hnProduct\Models\ProductList;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KhoaPhong extends Model
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
    protected $table = 'khoaphongs';

    /**
     * Get the hr that owns the KhoaPhong
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hr(): BelongsTo
    {
        return $this->belongsTo(HR::class, 'hr_key');
    }

    /**
     * The sanpham_batbuocs that belong to the KhoaPhong
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sanpham_batbuocs(): BelongsToMany
    {
        return $this->belongsToMany(ProductList::class, 'khoaphong_sanpham_batbuocs', 'khoaphong_id', 'sanpham_id');
    }
}
