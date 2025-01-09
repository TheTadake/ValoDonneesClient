<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etablissement
 * 
 * @property string $siret
 * @property string $siren
 * @property string $nic
 * @property string|null $ville
 * @property string|null $codePays
 * @property string|null $pays
 * @property bool $siege
 * @property bool $active
 * @property string|null $codenaf
 * @property string|null $libelleNaf
 * @property string|null $adresse
 * 
 * @property Entreprise $entreprise
 * @property Collection|Commentaire[] $commentaires
 * @property Collection|Notation[] $notations
 *
 * @package App\Models
 */
class Etablissement extends Model
{
	protected $table = 'etablissement';
	protected $primaryKey = 'siret';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'siret' => 'string',
		'siren' => 'string',
		'nic' => 'string',
		'ville' => 'string',
		'codePays' => 'string',
		'pays' => 'string',
		
		'siege' => 'bool',
		'active' => 'bool',
		'codenaf' => 'string',
		'libelleNaf' => 'string',
		'adresse' => 'string'
	];
	

	protected $fillable = [
		'siren',
		'nic',
		'ville',
		'codePays',
		'pays',
		'siege',
		'active',
		'codenaf',
		'libelleNaf',
		'adresse'
	];

	public function entreprise()
	{
		return $this->belongsTo(Entreprise::class, 'siren');
	}

	public function commentaires()
	{
		return $this->hasMany(Commentaire::class, 'siret');
	}

	public function notations()
	{
		return $this->hasMany(Notation::class, 'siret');
	}
}
