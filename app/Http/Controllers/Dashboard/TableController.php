<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\TableServiceInterface;
use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    protected $table;
    protected $tableService;
    public function __construct(Table $table,TableServiceInterface $tableService)
    {
        $this->tableService=$tableService;
        $this->table=$table;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('tables.view');
        $tables=$this->tableService->indexTable();
        return view('admin.table.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('tables.create');
        $tables=$this->table->get();
        return view('admin.table.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        Gate::authorize('tables.create');
        $this->tableService->tableStore($request);
        return redirect()->route('tables')->
            with('success','Table Created');
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
        Gate::authorize('tables.update');
        $table=$this->table->findOrFail($id);
        return view('admin.table.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        Gate::authorize('tables.update');
        $this->tableService->tableUpdate($id,$request);
        return redirect()->route('tables')
            ->with('success','Table Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('tables.delete');
        $this->tableService->tableDelete($id);
        return Redirect::route('tables')
            ->with('success','Table Deleted');
    }
}
