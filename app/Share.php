<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Share
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $desc
 * @property string $user_id
 * @property string $user_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Share whereUserName($value)
 */
class Share extends Model
{
    protected $fillable = ['name', 'link', 'desc', 'user_id', 'user_name'];
}
