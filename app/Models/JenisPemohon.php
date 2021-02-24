<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisPemohon
 * 
 * @property int $ID_JENIS_PEMOHON
 * @property string $JENIS_PEMOHON
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class JenisPemohon extends Model
{
	protected $table = 'jenis_pemohon';
	protected $primaryKey = 'ID_JENIS_PEMOHON';
	public $timestamps = false;

	protected $fillable = [
		'JENIS_PEMOHON'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'ID_JENIS_PEMOHON');
	}
}
