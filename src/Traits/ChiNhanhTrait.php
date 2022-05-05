<?php

namespace Thotam\ThotamPlus\Traits;

use Thotam\ThotamPlus\Models\ChiNhanh;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ChiNhanhTrait
{

    /**
     * The gd_of_chinhanhs that belong to the ChiNhanhTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function gd_of_chinhanhs(): BelongsToMany
    {
        return $this->belongsToMany(ChiNhanh::class, 'chinhanh_giamdocs', 'hr_key', 'chinhanh_id');
    }

    /**
     * getIsGdcnAttribute
     *
     * @return void
     */
    public function getIsGdcnAttribute()
    {
        return !!count($this->gd_of_chinhanhs);
    }
}
