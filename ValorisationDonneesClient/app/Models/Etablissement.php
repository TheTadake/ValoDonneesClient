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
 * @property int $siret
 * @property int $siren
 * @property int $nic
 * @property string|null $ville
 * @property string|null $codePays
 * @property string|null $pays
 * @property bool $siege
 * @property int|null $codenaf
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
		'siret' => 'int',
		'siren' => 'int',
		'nic' => 'int',
		'siege' => 'bool',
		'codenaf' => 'int'
	];

	protected $fillable = [
		'siren',
		'nic',
		'ville',
		'codePays',
		'pays',
		'siege',
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
