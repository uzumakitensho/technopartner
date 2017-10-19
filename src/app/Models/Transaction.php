<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 'transactions';
	protected $guarded = ['id'];
	protected $dates = [
		'created_at',
		'updated_at',
	];

	public function category()
	{
		return $this->belongsTo(
			'App\Models\Category',
			'category_id'            
		);
	}
}
