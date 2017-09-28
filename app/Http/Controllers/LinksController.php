<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinksController extends Controller
{

  public function redirect($id){
    $link = Link::findOrFail($id);

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
    $link = Link::create($request->all());

    return response(url("/r") . "/" . $link->id, 201);
  }
}
