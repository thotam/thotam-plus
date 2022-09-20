<?php

namespace Thotam\ThotamPlus\Traits;

use Thotam\ThotamPlus\Models\Xa;
use Thotam\ThotamPlus\Models\Tinh;
use Thotam\ThotamPlus\Models\Huyen;
use Thotam\ThotamPlus\Models\ChiNhanh;
use Thotam\ThotamPlus\Models\NhomSanPham;
use Thotam\ThotamPlus\Models\KenhKinhDoanh;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait TinhHuyenXaTrait
{
    /**
     * Get the tinh that owns the TinhHuyenXaTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tinh(): BelongsTo
    {
        return $this->belongsTo(Tinh::class, 'tinh_id', 'id');
    }

    /**
     * Get the huyen that owns the TinhHuyenXaTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function huyen(): BelongsTo
    {
        return $this->belongsTo(Huyen::class, 'huyen_id', 'id');
    }

    /**
     * Get the xa that owns the TinhHuyenXaTrait
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function xa(): BelongsTo
    {
        return $this->belongsTo(Xa::class, 'xa_id', 'id');
    }

    /**
     * getHuyenAttribute
     *
     * @return void
     */
    public function getHuyenAttribute()
    {
        return $this->xa->huyen;
    }

    /**
     * getTinhAttribute
     *
     * @return void
     */
    public function getTinhAttribute()
    {
        return $this->xa->huyen->tinh;
    }

    /**
     * getFullDiachiAttribute
     *
     * @param  mixed $long
     * @return void
     */
    public function getFullDiachiAttribute(bool $long = false)
    {
        $diachi = [];
        $diachi[] = $this->diachi;
        $diachi[] = ($long ? $this->xa->level : $this->xa->sort_level) . ' ' . $this->xa->name;
        $diachi[] = ($long ? $this->xa->huyen->level : $this->xa->huyen->sort_level) . ' ' . $this->xa->huyen->name;
        $diachi[] = ($long ? $this->xa->huyen->tinh->level : $this->xa->huyen->tinh->sort_level) . ' ' . $this->xa->huyen->tinh->name;
        return collect($diachi)->implode(' - ');
    }
}
