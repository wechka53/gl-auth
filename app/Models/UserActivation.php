<?php


namespace App\Models;


use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserActivation
 *
 * @property string $id
 * @property string $user_id
 * @property string $token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserActivation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserActivation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserActivation whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserActivation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserActivation whereUserId($value)
 * @mixin \Eloquent
 * @property string $expired_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserActivation whereExpiredAt($value)
 */
class UserActivation extends Model
{
    use Uuids;

    public $incrementing = false;

    protected $table = 'user_activation';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable  = [
        'token',
        'user_id',
        'created_at',
        'updated_at',
        'expired_at'
    ];
}