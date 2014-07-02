<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	/**
	 * Link relationship - one to many
	 */
	public function links() {
		return $this->hasMany('Link', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

}