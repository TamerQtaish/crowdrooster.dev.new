<?php

class ShippingCost extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shipping_costs';

	/**
	 * Product relationship - many to one
	 */
	public function product()
	{
		return $this->belongsTo('Product', 'product_id')->where('soft_deleted', 0);
	}

	/**
	 * Return content type Name
	 */
	public function getContentTypeName()
	{
		return self::$content_type[$this->content_type];
	}

}