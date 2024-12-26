<?php

namespace App\Http\Livewire\Boycotts;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Boycotts\Boycotts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class Boycott extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Boycotts = [];
    public $BoycottSearch, $Boycott, $BoycottId;
    public $boycott_number, $boycott_name;

    public $searchBoycottNumber = '';
    public $searchBoycottName = '';

    /*  public function render()
    {
        $cacheKey = 'Boycotts_search_' . $this->searchBoycottNumber . '_' . $this->searchBoycottName;
        $Boycotts = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return Boycotts::select(['id', 'boycott_number', 'boycott_name'])->when($this->searchBoycottNumber, function ($query) {
                return $query->where('boycott_number', 'LIKE', '%' . $this->searchBoycottNumber . '%');
            })->when($this->searchBoycottName, function ($query) {
                return $query->where('boycott_name', 'LIKE', '%' . $this->searchBoycottName . '%');
            })->orderBy('id', 'ASC')->paginate(10);
        });
        $this->Boycotts = collect($Boycotts->items());
        return view('livewire.boycotts.boycott', ['Boycotts' => $this->Boycotts, 'links' => $Boycotts]);
    } */

    public $search = [
        'boycott_number' => '',
        'boycott_name' => '',
    ];

    public function render()
    {
        $boycotts = QueryBuilder::for(Boycotts::class)
            ->allowedFilters([
                AllowedFilter::callback('boycott_number', function ($query, $value) {
                    $query->where('boycott_number', 'LIKE', '%' . $value . '%');
                }),
                AllowedFilter::partial('boycott_name'),
            ])
            ->where(function ($query) {
                foreach ($this->search as $field => $value) {
                    if (!empty($value)) {
                        $query->where($field, 'LIKE', '%' . $value . '%');
                    }
                }
            })
            ->orderBy('id', 'ASC')
            ->paginate(10);

            return view('livewire.boycotts.boycott', [
                'boycotts' => $boycotts,
            ]);
    }



    public function AddBoycottModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('BoycottModalShow');
    }

    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_number' => 'required|unique:boycotts,boycott_number',
            'boycott_name' => 'required|unique:boycotts,boycott_name',
        ], [
            'boycott_number.required' => 'حقل رقم المقاطعة مطلوب',
            'boycott_number.unique' => 'رقم المقاطعة موجود',
            'boycott_name.required' => 'حقل اسم المقاطعة مطلوب',
            'boycott_name.unique' => 'اسم المقاطعة موجود',
        ]);

        Boycotts::create([
            'user_id' => Auth::id(),
            'boycott_number' => $this->boycott_number,
            'boycott_name' => $this->boycott_name,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetBoycott($BoycottId)
    {
        $this->resetValidation();

        $this->Boycott  = Boycotts::find($BoycottId);
        $this->BoycottId = $this->Boycott->id;
        $this->boycott_number = $this->Boycott->boycott_number;
        $this->boycott_name = $this->Boycott->boycott_name;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'boycott_number' => 'required|unique:boycotts,boycott_number,' . $this->BoycottId . ',id',
            'boycott_name' => 'required|unique:boycotts,boycott_name,' . $this->BoycottId . ',id',
        ], [
            'boycott_number.required' => 'حقل رقم المقاطعة مطلوب',
            'boycott_number.unique' => 'رقم المقاطعة موجود',
            'boycott_name.required' => 'حقل اسم المقاطعة مطلوب',
            'boycott_name.unique' => 'اسم المقاطعة موجود',
        ]);

        $Boycotts = Boycotts::find($this->BoycottId);
        $Boycotts->update([
            'user_id' => Auth::id(),
            'boycott_number' => $this->boycott_number,
            'boycott_name' => $this->boycott_name,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Boycotts = Boycotts::find($this->BoycottId);

        if ($Boycotts) {
            $Boycotts->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}
