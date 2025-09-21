<?php
namespace App\Http\Controllers\Contracts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ContractsController extends Controller
{
    public function index()
    {
        Return View('content.Contracts.index'); 
    }

    public function ContractShow($id)
    {
        Return View('content.Contracts.show', [
            'id' => $id
        ]);
    }
}
