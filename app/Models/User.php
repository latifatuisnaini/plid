<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
	
	protected $table = 'users';
	protected $primaryKey = 'ID_USER';
	public $timestamps = false;

	protected $casts = [
		'ID_JENIS_IDENTITAS' => 'int',
		'ID_JENIS_PEMOHON' => 'int',
		'TIPE_USER' => 'int'
	];

	protected $fillable = [
		'ID_JENIS_IDENTITAS',
		'ID_JENIS_PEMOHON',
		'TIPE_USER',
		'NOMOR_IDENTITAS',
		'NAMA_LENGKAP',
		'NPWP',
		'EMAIL',
		'PEKERJAAN',
		'ALAMAT',
		'NO_TLP',
		'NO_FAX',
		'PASSWORD',
		'STATUS_KONFIRMASI'
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
