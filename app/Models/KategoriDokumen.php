<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dokumen;

/**
 * Class KategoriDokumen
 * 
 * @property int $ID_KATEGORI
 * @property int $ID_JENIS_KATEGORI
 * @property string $KATEGORI
 * @property int $NOMOR_URUT
 * 
 * @property JenisKategoriDokumen $jenis_kategori_dokumen
 * @property Collection|Dokumen[] $dokumen
 *
 * @package App\Models
 */
class KategoriDokumen extends Model
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

	public function jenis_kategori_dokumen()
	{
		return $this->belongsTo(JenisKategoriDokumen::class, 'ID_JENIS_KATEGORI');
	}

	public function dokumen()
	{
		return $this->hasMany(Dokumen::class, 'ID_KATEGORI');
	}

	public static function dokumenKategori($id)
	{
		return Dokumen::where('ID_KATEGORI','=',$id)->orderBy('NOMOR_URUT')->get();
	}
}
