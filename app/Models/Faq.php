<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 * 
 * @property int $ID_FAQ
 * @property string $QUESTION
 * @property string $ANSWER
 *
 * @package App\Models
 */
class Faq extends Model
{
	protected $table = 'faq';
	protected $primaryKey = 'ID_FAQ';
	public $timestamps = false;

	protected $fillable = [
		'QUESTION',
		'ANSWER'
	];
}
