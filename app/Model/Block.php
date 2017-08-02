<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Block
 *
 * @property int $id
 * @property int $project_id
 * @property int $parcel_id
 * @property string $block_no
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereBlockNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereParcelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Block extends Model
{
    protected $table = 'block';
}
