<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bb extends Model
{
    use HasFactory;
    protected  $fillable = ['title', 'content', 'price'];

    /**
     *Declaration of the inverse relation of "one to many"
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}




