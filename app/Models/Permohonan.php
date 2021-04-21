<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permohonan
 * 
 * @property int $ID_PERMOHONAN
 * @property int $ID_USER
 * @property int $ID_STATUS
 * @property string $DOKUMEN_PERMOHONAN
 * @property string $KETERANGAN
 * @property Carbon $TANGGAL
 * 
 * @property Status $status
 * @property User $user
 * @property Collection|Feedback[] $feedback
 *
 * @package App\Models
 */
class Permohonan extends Model
{
	protected $table = 'permohonan';
	protected $primaryKey = 'ID_PERMOHONAN';
	public $timestamps = false;

	protected $casts = [
		'ID_USER' => 'int',
		'ID_STATUS' => 'int'
	];

	protected $fillable = [
		'ID_USER',
		'ID_STATUS',
		'NOMOR_URUT',
		'DOKUMEN_PERMOHONAN',
		'KETERANGAN',
		'TANGGAL'
	];

	public function status()
	{
		return $this->belongsTo(Status::class, 'ID_STATUS');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_USER');
	}

	public function feedback()
	{
		return $this->hasOne(Feedback::class, 'ID_PERMOHONAN');
	}
}
