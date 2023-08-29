<?php
namespace App\Data;

class Category{

    private string $name;

    public function __construct(string $name){
        $this->name = $name;
    }


	/**
	 * @return 
	 */
	public function getName(): string {
		return $this->name;
	}
	

}