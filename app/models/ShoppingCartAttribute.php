<?php

class ShoppingCartAttribute extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shopping_cart_attributes';

	/**
	 * Shopping Cart relationship - many to one
	 */
	public function shoppingCart()
	{
		return $this->belongsTo('ShoppingCart', 'shopping_cart_id')->where('soft_deleted', 0);
	}

}