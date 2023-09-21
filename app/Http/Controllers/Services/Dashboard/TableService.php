<?php
namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\TableServiceInterface;
use App\Models\Table;
use Illuminate\Support\Facades\Validator;

class TableService implements TableServiceInterface
{
    protected $table;
    public function __construct(Table $table)
    {
        $this->table=$table;
    }
    public function indexTable()
    {
        return $this->table->paginate(8);
    }

    public function tableShow($id)
    {
        //
    }

    public function tableStore($data)
    {
        
        $this->table->create($data->all());
    }

    public function tableUpdate($id, $data)
    {
        $table=$this->table->find($id);
        $table->update($data->all());
    }

    public function tableDelete($id)
    {
        $table=$this->table->findOrFail($id);
        $table->delete();
    }
}