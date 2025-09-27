<?php
namespace App\Http\Controllers\Tenants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TenantsController extends Controller
{
    public function index()
    {
        Return View('content.Tenants.index');
    }

    public function TenantShow($id)
    {
        Return View('content.Tenants.show', [
            'id' => $id
        ]);
    }
}
