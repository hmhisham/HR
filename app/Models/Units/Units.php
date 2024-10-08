<?php
namespace App\Models\Units;
use App\Models\Branch\Branch;
use App\Models\Sections\Sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Units extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "units";
    public function Getbranc()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    Public function Getsection()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }
}
