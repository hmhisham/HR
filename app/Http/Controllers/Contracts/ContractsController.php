<?php
namespace App\Http\Controllers\Contracts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ContractsController extends Controller
{
    public function index($property_folder_id = null)
    {
        Return View('content.Contracts.index', [
            'property_folder_id' => $property_folder_id
        ]);
    }

    public function ContractShow($id)
    {
        Return View('content.Contracts.show', [
            'id' => $id
        ]);
    }
}
