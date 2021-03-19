<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * 
 * @property int $ID_FEEDBACK
 * @property int $ID_PERMOHONAN
 * @property string $KETERANGAN
 * @property string $LINK_DOWNLOAD
 * @property Carbon $TGL_FEEDBACK
 * @property Carbon $WAKTU_ESTIMASI
 * @property string $NAMA_FILE
 * @property Carbon $EXPIRED_DATE
 * 
 * @property Permohonan $permohonan
 *
 * @package App\Models
 */
class Feedback extends Model
{
	protected $table = 'feedback';
	protected $primaryKey = 'ID_FEEDBACK';
	public $timestamps = false;

	protected $casts = [
		'ID_PERMOHONAN' => 'int'
	];

	protected $dates = [
		'TGL_FEEDBACK',
		'WAKTU_ESTIMASI',
		'EXPIRED_DATE'
	];

	protected $fillable = [
		'ID_PERMOHONAN',
		'KETERANGAN',
		'LINK_DOWNLOAD',
		'TGL_FEEDBACK',
		'WAKTU_ESTIMASI',
		'NAMA_FILE',
		'EXPIRED_DATE'
	];

	public function permohonan()
	{
		return $this->belongsTo(Permohonan::class, 'ID_PERMOHONAN');
	}
}
