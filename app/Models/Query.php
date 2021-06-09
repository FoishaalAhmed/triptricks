<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'message',
    ];

    public function storeQuery(Object $request)
    {
        $this->name    = $request->name;
        $this->email   = $request->email;
        $this->phone   = $request->phone;
        $this->message = $request->message;
        $this->save();
    }

    public function destroyQuery(Int $id)
    {
        $query = Query::findOrFail($id);
        $destroyQuery = $query->delete();

        $destroyQuery
            ? session()->flash('message', 'Query Deleted Successfully')
            : session()->flash('message', 'Something Went Wrong');
    }
}
