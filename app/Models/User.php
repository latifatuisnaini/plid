<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $ID_USER
 * @property int $ID_JENIS_IDENTITAS
 * @property int $ID_JENIS_PEMOHON
 * @property string $NOMOR_IDENTITAS
 * @property string $NAMA_LENGKAP
 * @property string $NPWP
 * @property string $EMAIL
 * @property string $PEKERJAAN
 * @property string $ALAMAT
 * @property string $NO_TLP
 * @property string $NO_FAX
 * @property string $PASSWORD
 * 
 * @property JenisPemohon $jenis_pemohon
 * @property JenisIdentita $jenis_identita
 * @property Collection|Permohonan[] $permohonans
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'ID_USER';
	public $timestamps = false;

	protected $casts = [
		'ID_JENIS_IDENTITAS' => 'int',
		'ID_JENIS_PEMOHON' => 'int'
	];

	protected $fillable = [
		'ID_JENIS_IDENTITAS',
		'ID_JENIS_PEMOHON',
		'NOMOR_IDENTITAS',
		'NAMA_LENGKAP',
		'NPWP',
		'EMAIL',
		'PEKERJAAN',
		'ALAMAT',
		'NO_TLP',
		'NO_FAX',
		'PASSWORD'
	];

	public function jenis_pemohon()
	{
		return $this->belongsTo(JenisPemohon::class, 'ID_JENIS_PEMOHON');
	}

	public function jenis_identita()
	{
		return $this->belongsTo(JenisIdentita::class, 'ID_JENIS_IDENTITAS');
	}

	public function permohonans()
	{
		return $this->hasMany(Permohonan::class, 'ID_USER');
	}
}
