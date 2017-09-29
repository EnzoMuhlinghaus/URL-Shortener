<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinksController extends Controller
{
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
    $url = $request["url"];

    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
      return response('bad parameters', 400);
    }

    $link = Link::firstOrCreate(
      ["url" => $url,],
      ["uid" => 0]
    );

    return response(url("/") . "/" . $link->uid, 201);
  }
}
