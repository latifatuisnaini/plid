<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisIdentita
 * 
 * @property int $ID_JENIS_IDENTITAS
 * @property string $JENIS_IDENTITAS
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class JenisIdentita extends Model
{
	protected $table = 'jenis_identitas';
	protected $primaryKey = 'ID_JENIS_IDENTITAS';
	public $timestamps = false;

	protected $fillable = [
		'JENIS_IDENTITAS'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'ID_JENIS_IDENTITAS');
	}
}
