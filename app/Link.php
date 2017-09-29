<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  protected $fillable = ["url", "uid"];

  /**
   * Generate unique ID
   * @param $length
   * @return string
   */
  private function randString($length) {
    $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $char = str_shuffle($char);
    for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
      $rand .= $char{mt_rand(0, $l)};
    }
    return $rand;
  }

  /**
   * @param $value
   */
  public function setUidAttribute($value)
  {
    $this->attributes['uid'] = $this->randString(5);
  }
}
