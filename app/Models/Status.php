<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $ID_STATUS
 * @property string $STATUS
 * 
 * @property Collection|Permohonan[] $permohonans
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'status';
	protected $primaryKey = 'ID_STATUS';
	public $timestamps = false;

	protected $fillable = [
		'STATUS'
	];

	public function permohonans()
	{
		return $this->hasMany(Permohonan::class, 'ID_STATUS');
	}
}
