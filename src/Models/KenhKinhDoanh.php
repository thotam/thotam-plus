<?php

namespace Thotam\ThotamPlus\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Thotam\ThotamPlus\Models\NhomSanPham;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KenhKinhDoanh extends Model
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
    protected $table = 'kenh_kinh_doanhs';

    /**
     * Get all of the nhom_san_phams for the KenhKinhDoanh
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nhom_san_phams(): HasMany
    {
        return $this->hasMany(NhomSanPham::class, 'kenh_kinh_doanh_id', 'id');
    }
}
