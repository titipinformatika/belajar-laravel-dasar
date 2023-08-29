<?php
namespace App\Data;
class Product{

    private Category $category;
    private string $name;
    
    public function __construct(Category $category){
        $this->category = $category;

    }


	/**
	 * @return 
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param  $name 
	 * @return void
	 */
	public function setName(string $name): void {
		$this->name = $name;
		
	}

    function getCategoryName():string{
        return $this->category->getName();
    }
}