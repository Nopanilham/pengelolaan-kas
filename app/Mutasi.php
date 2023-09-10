<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $table = "mutasi";

    protected $guarded = [];

    /**
     * Get the user that owns the Mutasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the sumber that owns the Mutasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sumber()
    {
        return $this->belongsTo(Kelas::class, 'dari_kelas');
    }

    /**
     * Get the tujuan that owns the Mutasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tujuan()
    {
        return $this->belongsTo(Kelas::class, 'ke_kelas');
    }
}
