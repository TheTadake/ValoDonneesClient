<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Commentaire
 * 
 * @property int $idComm
 * @property int $siret
 * @property int $id_user
 * @property string $texte
 * 
 * @property Etablissement $etablissement
 * @property User $user
 *
 * @package App\Models
 */
class Commentaire extends Model
{
	protected $table = 'commentaires';
	protected $primaryKey = 'idComm';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idComm' => 'int',
		'siret' => 'int',
		'id_user' => 'int'
	];

	protected $fillable = [
		'siret',
		'id_user',
		'texte'
	];

	public function etablissement()
	{
		return $this->belongsTo(Etablissement::class, 'siret');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
