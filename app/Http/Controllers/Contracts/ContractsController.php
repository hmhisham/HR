<?php
namespace App\Http\Controllers\Contracts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ContractsController extends Controller
{
    public function index(Request $request, $property_folder_id = null)
    {
        // تنظيف وتأمين المعاملات
        $cleanPropertyFolderId = $this->sanitizeInput($property_folder_id);
        $cleanPropertyId = $this->sanitizeNumericInput($request->get('property_id'));
        $cleanPropertyName = $this->sanitizeInput($request->get('property_name'));
        $cleanId = $this->sanitizeNumericInput($request->get('id'));
        
        return View('content.Contracts.index', [
            'property_folder_id' => $cleanPropertyFolderId,
            'property_id' => $cleanPropertyId,
            'property_name' => $cleanPropertyName,
            'id' => $cleanId
        ]);
    }
    
    private function sanitizeInput($input)
    {
        if (is_null($input)) return null;
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }
    
    private function sanitizeNumericInput($input)
    {
        if (is_null($input)) return null;
        return is_numeric($input) && $input > 0 ? (int) $input : null;
    }

    public function ContractShow($id)
    {
        Return View('content.Contracts.show', [
            'id' => $id
        ]);
    }
}
