<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dokuman
 * 
 * @property int $ID_DOKUMEN
 * @property int $ID_KATEGORI
 * @property int $ID_JENIS_DOKUMEN
 * @property string $NAMA_DOKUMEN
 * @property int $NOMOR_URUT
 * @property string $LINK_FILE
 * 
 * @property JenisDokuman $jenis_dokuman
 * @property KategoriDokuman $kategori_dokuman
 *
 * @package App\Models
 */
class Dokuman extends Model
{
	protected $table = 'dokumen';
	protected $primaryKey = 'ID_DOKUMEN';
	public $timestamps = false;

	protected $casts = [
		'ID_KATEGORI' => 'int',
		'ID_JENIS_DOKUMEN' => 'int',
		'NOMOR_URUT' => 'int'
	];

	protected $fillable = [
		'ID_KATEGORI',
		'ID_JENIS_DOKUMEN',
		'NAMA_DOKUMEN',
		'NOMOR_URUT',
		'LINK_FILE'
	];

	public function jenis_dokuman()
	{
		return $this->belongsTo(JenisDokuman::class, 'ID_JENIS_DOKUMEN');
	}

	public function kategori_dokuman()
	{
		return $this->belongsTo(KategoriDokuman::class, 'ID_KATEGORI');
	}
}
