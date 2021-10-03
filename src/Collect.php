<?php

namespace Lenard123\PHPCollect;

class Collect
{


  private array $data;




  public function __construct(array $args)
  {
    $this->data = $args;
  }




  /**
   * Return all the data as array
   **/
  public function all() : array
  {
    return $this->data;
  }





  /**
   * Returns the average of the collection
   */
  public function avg($key = null)
  {
    if (is_null($key)) {
    }
  }



  /**
   * Returns true if the given argument
   * exists on the data
   *
   * */
  public function contains($item)
  {
    foreach($this->data as $dataItem)
    {
      if ($dataItem === $item) 
        return true;
    }
    return false;
  }




  public function count()
  {
    return count($this->data);
  }



  public function isEmpty()
  {
    return $this->count <= 0;
  }




  public function reduce(callable $callback, $initial = null)
  {
    return array_reduce($this->data, $callback, $initial);
  }



  public function map(callable $callback) : Collect
  {
    $result = array_map($callback, $this->data);
    return self::create($result);
  }




  /**
   * Return the sum of the data
   */
  public function sum($key = null)
  {
    if (is_null($key)) return array_sum($this->data);

    $total = $this->reduce(function($acm, $item) use ($key) { 
      $value = $item[$key] ?? 0;
      return $acm + $value;
    }, 0);

    return $total;
  }





  //-- STATIC METHODS   
  public static function create(array $data)
  {
    return new self($data);
  }
}