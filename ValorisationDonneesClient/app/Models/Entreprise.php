<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entreprise
 * 
 * @property int $siren
 * @property string $nomEntr
 * @property string $personneMoral
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $sexe
 * @property int|null $codenaf
 * @property string|null $libelleNaf
 * @property string|null $statutRcs
 * @property string|null $numRcs
 * 
 * @property Collection|Etablissement[] $etablissements
 *
 * @package App\Models
 */
class Entreprise extends Model
{
	protected $table = 'entreprise';
	protected $primaryKey = 'siren';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'siren' => 'int',
		'codenaf' => 'int'
	];

	protected $fillable = [
		'nomEntr',
		'personneMoral',
		'nom',
		'prenom',
		'sexe',
		'codenaf',
		'libelleNaf',
		'statutRcs',
		'numRcs'
	];

	public function etablissements()
	{
		return $this->hasMany(Etablissement::class, 'siren');
	}
}
