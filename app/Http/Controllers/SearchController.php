<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Compose as search;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;
class SearchController extends Controller
{


    public function searchInbox(Request $request)
    {
        $key = $request->input('search');
        $data = search::where('receiver', Auth::user()->email)
        ->where('sender', 'like', '%' . $key . '%')
        ->get();
        return response()->json($data);
    }

    public function searchSend(Request $request)
    {
        $key = $request->input('search');
        $data = search::where('sender', Auth::user()->email)
        ->where('receiver', 'like', '%' . $key . '%')
        ->get();
        return response()->json($data);
    }

    /**c
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
