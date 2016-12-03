<?php

namespace App;

class Cart{

	public $items = null;
	public $totalPrice = 0;
	public $totalQty = 0;

	public function __construct($oldcart){
		if ($oldcart) {
			$this->items = $oldcart->items;
			$this->totalQty = $oldcart->totalQty;
			$this->totalPrice = $oldcart->totalPrice;
		}

		
	}

	public function add($item , $id){

		$storedItem = ['Qty' => 0, 'price' => $item->price , 'item' => $item ];

		if ($this->items) {
			if (array_key_exists($id, $this->items)) {

				$storedItem = $this->items[$id];
				
			}
		}

		$storedItem['Qty']++;
		$storedItem['price'] = $item->price * $storedItem['Qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty++;
		$this->totalPrice += $item->price;

	}


}
