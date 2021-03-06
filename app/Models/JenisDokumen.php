<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisDokumen
 * 
 * @property int $ID_JENIS_DOKUMEN
 * @property string $JENIS_DOKUMEN
 * 
 * @property Collection|Dokumen[] $dokumen
 *
 * @package App\Models
 */
class JenisDokumen extends Model
{
	protected $table = 'jenis_dokumen';
	protected $primaryKey = 'ID_JENIS_DOKUMEN';
	public $timestamps = false;

	protected $fillable = [
		'JENIS_DOKUMEN'
	];

	public function dokumen()
	{
		return $this->hasMany(Dokumen::class, 'ID_JENIS_DOKUMEN');
	}
}
