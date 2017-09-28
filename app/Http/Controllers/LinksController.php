<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinksController extends Controller
{

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
   * Redirect to the URL
   * @param $uid
   * @return RedirectResponse
   */
  public function redirect($uid){
    $link = Link::where("uid", $uid)->first();

    return new RedirectResponse($link->url, 301);
  }
    /**
     * Display a listing of the resource.
     * GET /links
     *
     * @return \Illuminate\Http\Response
     */
  public function index()
  {
    $links = Link::all();
    return response($links, 200);
  }

  /**
   * Store a newly created resource in storage.
   * POST /links
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $uid = $this->randString(5);
    $url = $request["url"];

    $link = Link::create([
      "url" => $url,
      "uid" => $uid
    ]);

    return response(url("/") . "/" . $link->uid, 201);
  }
}
