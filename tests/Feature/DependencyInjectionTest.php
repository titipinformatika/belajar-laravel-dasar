<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Category;
use App\Data\Foo;
use App\Data\Person;
use App\Data\Product;
use App\Service\HelloService;
use App\Service\HelloServiceIndonesia;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{

   
   function testDepedency(){
    $foo = new Foo();
    $bar = new Bar($foo);

    $this->assertEquals("Foo and Bar", $bar->Bar());
   }

   function testCreateDependency(){
    $foo1 = $this->app->make(Foo::class);
    $foo2 = $this->app->make(Foo::class);
    $this->assertEquals($foo1->foo(), $foo2->foo());
    self::assertSame($foo1,$foo2);
   }

   public function testBind(){

      $this->app->bind(Person::class,function(){
         return new Person("Asep","Riki");
      });

      $person1 = $this->app->make(Person::class);
      $person2 = $this->app->make(Person::class);
      self::assertNotSame($person1,$person2);

      $this->assertEquals($person1->firstName,$person2->firstName);
      
   }

   public function testSingleTone(){
      $this->app->singleton(Person::class,function(){
         return new Person("Asep","Riki");
      });

      $person1= $this->app->make(Person::class);
      $person2= $this->app->make(Person::class);

      $this->assertEquals($person1->firstName, $person2->firstName);
      $this->assertSame($person1, $person2);
   }

   function testInstance(){
      $person = new Person("Asep","Riki");
      $this->app->instance(Person::class,$person);

      $result1= $this->app->make(Person::class);
      $result2 = $this->app->make(Person::class);
      $this->assertEquals($result1->firstName, $result2->firstName);
      $this->assertEquals($result1->firstName, $person->firstName);
      $this->assertEquals($result2->firstName, $person->firstName);

      $this->assertSame($person, $result1);
      $this->assertSame($result2, $result1);
      $this->assertSame($result2, $person);
   }

   public function testDependencyInjection(){
      $this->app->singleton(Foo::class,function($app){
         return new Foo();
      });

      $foo = $this->app->make(Foo::class);
      $bar = $this->app->make(Bar::class);

      $this->assertSame("Foo and Bar", $bar->bar());
      $this->assertSame("Foo", $bar->foo->foo());
      $this->assertEquals($foo,$bar->foo);
   }

   public function testGetServiceContainer(){
      $bar =$this->app->make(Bar::class);
      
      $this->assertEquals("Foo and Bar",$bar->bar());
      $this->assertEquals("Foo",$bar->foo->foo());
   }

   function testCreateDependecyPerson(){
      $this->app->singleton(Person::class,function(){
         return new Person("Asep","Riki");
      });
      $this->assertTrue(true);
   }

 


   function testCreateDependencyProduct(){
      $this->app->singleton(Category::class,function(){
         return new Category("Hanphone");
      });
      $product1= $this->app->make(Product::class);

      $this->assertEquals("Hanphone",$product1->getCategoryName());
   }

   function testDependencyInjectionClosure(){
      $this->app->singleton(Category::class,function(){
         return new Category("Tablet Pc");
      });

      $this->app->singleton(Product::class,function($app){
         return new Product($app->make(Category::class));
      });

      $product1 = $this->app->make(Product::class);
      $product2 = $this->app->make(Product::class);
      self::assertSame($product1,$product2);

      self::assertEquals($product1->getCategoryName(),"Tablet Pc");
     
   }

   function testHelloService(){
      $this->app->singleton(HelloService::class,HelloServiceIndonesia::class);
      $helloService = $this->app->make(HelloService::class);
      self::assertEquals("Hello Riki",$helloService->hello("Riki"));
   }
   
   function testBidingClosure(){

      $this->app->singleton(HelloService::class,function(){
         return new HelloServiceIndonesia();
      });

      $hello1 = $this->app->make(HelloService::class);
      $hello2 = $this->app->make(HelloService::class);

      self::assertSame($hello1,$hello2);
      self::assertEquals("Hello Rendi",$hello1->hello("Rendi"));

      self::assertEquals("Hello Riki",$hello2->hello("Riki"));
   }

}
