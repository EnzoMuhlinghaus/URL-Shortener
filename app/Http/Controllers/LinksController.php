<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinksController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $link = Link::create($request->all());

      return response($link->id, 201);
    }

    /**
     * Display the specified resource.
     * GET /links/{id}
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
      $link = Link::findOrFail($link);
      return response($link, 200);
    }
}
