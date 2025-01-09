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
 * @property string $siret
 * @property int $id_user
 * @property string $texte
 * 
 * @property User $user
 * @property Etablissement $etablissement
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
		'id_user' => 'int'
	];

	protected $fillable = [
		'siret',
		'id_user',
		'texte'
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
