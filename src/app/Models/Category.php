<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $guarded = ['id'];
	protected $dates = [
		'created_at',
		'updated_at',
	];

	public function transactions()
	{
		return $this->hasMany(
			'App\Models\Transaction',
			'category_id'            
		);
	}
}
