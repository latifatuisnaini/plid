<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriDokuman
 * 
 * @property int $ID_KATEGORI
 * @property int $ID_JENIS_KATEGORI
 * @property string $KATEGORI
 * @property int $NOMOR_URUT
 * 
 * @property JenisKategoriDokuman $jenis_kategori_dokuman
 * @property Collection|Dokuman[] $dokumen
 *
 * @package App\Models
 */
class KategoriDokuman extends Model
{
	protected $table = 'kategori_dokumen';
	protected $primaryKey = 'ID_KATEGORI';
	public $timestamps = false;

	protected $casts = [
		'ID_JENIS_KATEGORI' => 'int',
		'NOMOR_URUT' => 'int'
	];

	protected $fillable = [
		'ID_JENIS_KATEGORI',
		'KATEGORI',
		'NOMOR_URUT'
	];

	public function jenis_kategori_dokuman()
	{
		return $this->belongsTo(JenisKategoriDokuman::class, 'ID_JENIS_KATEGORI');
	}

	public function dokumen()
	{
		return $this->hasMany(Dokuman::class, 'ID_KATEGORI');
	}
}
