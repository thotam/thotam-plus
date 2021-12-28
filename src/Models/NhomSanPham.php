<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamHr\Models\HR;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Thotam\ThotamPlus\Models\KenhKinhDoanh;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhomSanPham extends Model
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
    protected $table = 'nhom_san_phams';

    /**
     * Get the kinhdoanh that owns the NhomSanPham
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kinhdoanh(): BelongsTo
    {
        return $this->belongsTo(KenhKinhDoanh::class, 'kenh_kinh_doanh_id', 'id');
    }

    /**
     * The hrs that belong to the NhomSanPham
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hrs(): BelongsToMany
    {
        return $this->belongsToMany(HR::class, 'hr_nhom_san_phams', 'nhom_san_pham_id', 'hr_key');
    }
}
