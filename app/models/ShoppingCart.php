<?php

class ShoppingCart extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shopping_carts';

	/**
	 * Shopping Cart Attributes relationship - one to many
	 */
	public function shoppingCartAttributes()
	{
		return $this->hasMany('ShoppingCartAttribute', 'shopping_cart_id')->where('soft_deleted', 0);
	}
	
}