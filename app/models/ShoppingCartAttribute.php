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

	/**
	 * Attribute Value relationship - one to many
	 */
	public function attributeValue()
	{
		return $this->hasOne('AttributeValue', 'id')->where('soft_deleted', 0);
	}

	/**
	 * Product relationship - one to one
	 */
	public function product()
	{
		return $this->hasOne('Product', 'product_id')->where('soft_deleted', 0);
	}

}