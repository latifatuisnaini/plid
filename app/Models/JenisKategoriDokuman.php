<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JenisKategoriDokuman
 * 
 * @property int $ID_JENIS_KATEGORI
 * @property string $JENIS_KATEGORI
 * 
 * @property Collection|KategoriDokuman[] $kategori_dokumen
 *
 * @package App\Models
 */
class JenisKategoriDokuman extends Model
{
	protected $table = 'jenis_kategori_dokumen';
	protected $primaryKey = 'ID_JENIS_KATEGORI';
	public $timestamps = false;

	protected $fillable = [
		'JENIS_KATEGORI'
	];

	public function kategori_dokumen()
	{
		return $this->hasMany(KategoriDokuman::class, 'ID_JENIS_KATEGORI');
	}
}
