<?php

namespace Thotam\ThotamPlus\Traits;

use Thotam\ThotamPlus\Models\ChiNhanh;
use Thotam\ThotamPlus\Models\NhomSanPham;
use Thotam\ThotamPlus\Models\KenhKinhDoanh;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ThoTamPlusTrait {
    /**
     * Get the chinhanh that owns the ThoTamPlusTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chinhanh(): BelongsTo
    {
        return $this->belongsTo(ChiNhanh::class, 'chinhanh_id', 'id');
    }

    /**
     * Get the kenh_kinh_doanh that owns the ThoTamPlusTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kenh_kinh_doanh(): BelongsTo
    {
        return $this->belongsTo(KenhKinhDoanh::class, 'kenh_kinh_doanh_id', 'id');
    }

    /**
     * Get the nhom_san_pham that owns the ThoTamPlusTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhom_san_pham(): BelongsTo
    {
        return $this->belongsTo(NhomSanPham::class, 'nhom_san_pham_id', 'id');
    }
}
