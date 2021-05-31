<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    private $queryObject;

    public function __construct()
    {
        $this->queryObject = new Query();
    }

    public function index()
    {
        $queries = Query::orderBy('created_at', 'desc')->get();
        return view('backend.admin.queries.index', compact('queries'));
    }

    public function show(Int $id)
    {
        $query = Query::findOrFail($id);
        return view('backend.admin.queries.show', compact('query'));
    }

    public function destroy(Int $id)
    {
        $this->queryObject->destroyQuery($id);
        return back();
    }
}
