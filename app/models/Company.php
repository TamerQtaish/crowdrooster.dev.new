<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';
	
	/**
	 * Access relationship - many to one
	 */	
	public function access() {
		return $this->belongsTo('Access', 'object_id');
	}

	/**
	 * Link relationship - one to many
	 */
	public function links() {
		return $this->hasMany('Link', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Address relationship - one to many
	 */
	public function addresses() {
		return $this->hasMany('Address', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

}