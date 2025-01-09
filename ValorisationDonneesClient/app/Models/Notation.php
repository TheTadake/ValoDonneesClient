<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notation
 * 
 * @property int $idNotes
 * @property int $id_user
 * @property string $siret
 * @property float $note
 * 
 * @property User $user
 * @property Etablissement $etablissement
 *
 * @package App\Models
 */
class Notation extends Model
{
	protected $table = 'notation';
	protected $primaryKey = 'idNotes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idNotes' => 'int',
		'id_user' => 'int',
		'note' => 'float'
	];

	protected $fillable = [
		'id_user',
		'siret',
		'note'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function etablissement()
	{
		return $this->belongsTo(Etablissement::class, 'siret');
	}
}
