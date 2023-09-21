<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Table::filter($request->query())->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        return Table::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return $table;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        $table=Table::find($id);
        $table->update($request->all());
        return [
            'message'=>'Table Updated Successfully'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        table::destroy($id);
        return [
            'message'=>'tabel Deleted Successfully'
        ];
    }
}