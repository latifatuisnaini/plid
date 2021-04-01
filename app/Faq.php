<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
	protected $primaryKey = 'ID_FAQ';
	public $timestamps = false;

	protected $fillable = [
		'STATUS'
	];
}
