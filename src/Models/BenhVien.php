<?php

namespace Thotam\ThotamPlus\Models;

use Thotam\ThotamHr\Models\HR;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thotam\ThotamPlus\Traits\TinhHuyenXaTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BenhVien extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Userstamps;
    use TinhHuyenXaTrait;

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
    protected $table = 'benhviens';

    /**
     * Get the hr that owns the BenhVien
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hr(): BelongsTo
    {
        return $this->belongsTo(HR::class, 'hr_key');
    }

    /**
     * @var array TUYEN
     */
    const TUYEN = [
        '1' => 'Trung ương',
        '2' => 'Tỉnh',
        '3' => 'Huyện',
    ];

    /**
     * Get the bệnh viện's tuyến.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function tuyen(): Attribute
    {
        return Attribute::make(
            get: function () {
                return collect(self::TUYEN)->get($this->tuyen_id);
            },
        );
    }
}
