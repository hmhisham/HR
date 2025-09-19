<?php

namespace App\Http\Livewire\Propertyfolder;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Provinces\Provinces;
use Illuminate\Support\Facades\Auth;
use App\Models\Propertyfolder\Propertyfolder;
use App\Models\Propertytypes\Propertytypes;
use App\Models\Propertycategory\Propertycategory;

class Propertyfolde extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Propertyfolder = [];
    public $PropertyfoldeSearch, $Propertyfolde, $PropertyfoldeId;
    public $folder_number, $property_name, $id_property_location, $id_property_type, $id_property_description, $property_area, $plot_number, $district_name, $notes, $property_files;
    public $search = ['folder_number' => '', 'property_name' => '', 'id_property_location' => '', 'id_property_type' => '', 'id_property_description' => '', 'property_area' => '', 'plot_number' => '', 'district_name' => '', 'notes' => ''];
    public $provinces;
    public $propertyTypes = [], $propertyCategories = [];



    public function render()
    {

        $folder_numberSearch = '%' . $this->search['folder_number'] . '%';
        $property_nameSearch = '%' . $this->search['property_name'] . '%';
        $id_property_locationSearch = '%' . $this->search['id_property_location'] . '%';
        $id_property_typeSearch = '%' . $this->search['id_property_type'] . '%';
        $id_property_descriptionSearch = '%' . $this->search['id_property_description'] . '%';
        $property_areaSearch = '%' . $this->search['property_area'] . '%';
        $plot_numberSearch = '%' . $this->search['plot_number'] . '%';
        $district_nameSearch = '%' . $this->search['district_name'] . '%';
        $notesSearch = '%' . $this->search['notes'] . '%';
        $Propertyfolder = Propertyfolder::query()
            ->when($this->search['folder_number'], function ($query) use ($folder_numberSearch) {
                $query->where('folder_number', 'LIKE', $folder_numberSearch);
            })
            ->when($this->search['property_name'], function ($query) use ($property_nameSearch) {
                $query->where('property_name', 'LIKE', $property_nameSearch);
            })
            ->when($this->search['id_property_location'], function ($query) use ($id_property_locationSearch) {
                $query->where('id_property_location', 'LIKE', $id_property_locationSearch);
            })
            ->when($this->search['id_property_type'], function ($query) use ($id_property_typeSearch) {
                $query->where('id_property_type', 'LIKE', $id_property_typeSearch);
            })
            ->when($this->search['id_property_description'], function ($query) use ($id_property_descriptionSearch) {
                $query->where('id_property_description', 'LIKE', $id_property_descriptionSearch);
            })
            ->when($this->search['property_area'], function ($query) use ($property_areaSearch) {
                $query->where('property_area', 'LIKE', $property_areaSearch);
            })
            ->when($this->search['plot_number'], function ($query) use ($plot_numberSearch) {
                $query->where('plot_number', 'LIKE', $plot_numberSearch);
            })
            ->when($this->search['district_name'], function ($query) use ($district_nameSearch) {
                $query->where('district_name', 'LIKE', $district_nameSearch);
            })
            ->when($this->search['notes'], function ($query) use ($notesSearch) {
                $query->where('notes', 'LIKE', $notesSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Propertyfolder;
        $this->Propertyfolder = collect($Propertyfolder->items());
        return View('livewire.propertyfolder.propertyfolde', [
            'Propertyfolder' => $Propertyfolder,
            'links' => $links
        ]);
    }


    protected $listeners = [
        'SelectIdPropertyLocation',
        'SelectIdPropertyType',
        'SelectIdPropertyDescription',
    ];
    public function hydrate()
    {
        $this->emit('select2');
    }
    public function mount()
    {
        $this->provinces = Provinces::orderBy('province_number')->get();
        $this->propertyTypes = Propertytypes::orderBy('type_name')->get();
        $this->propertyCategories = Propertycategory::orderBy('category')->get();
    }
    public function SelectIdPropertyLocation($IdPropertyLocationID)
    {
        $propertyLocation = Provinces::find($IdPropertyLocationID);
        if ($propertyLocation) {
            $this->id_property_location = $IdPropertyLocationID;
        } else {
            $this->id_property_location = null;
        }
    }

    public function SelectIdPropertyType($IdPropertyTypeID)
    {
        $propertyType = Propertytypes::find($IdPropertyTypeID);
        if ($propertyType) {
            $this->id_property_type = $IdPropertyTypeID;
        } else {
            $this->id_property_type = null;
        }
    }

    public function SelectIdPropertyDescription($IdPropertyDescriptionID)
    {
        $propertyCategory = Propertycategory::find($IdPropertyDescriptionID);
        if ($propertyCategory) {
            $this->id_property_description = $IdPropertyDescriptionID;
        } else {
            $this->id_property_description = null;
        }
    }


    public function AddPropertyfoldeModalShow()
    {
        $this->reset();
        $this->resetValidation();

        $latestFolder = Propertyfolder::orderBy('folder_number', 'desc')->first();
        $this->folder_number = $latestFolder ? $latestFolder->folder_number + 1 : 1;
        $this->dispatchBrowserEvent('PropertyfoldeModalShow');
    }


    public function store()
    {
        // $this->resetValidation();
        // $this->validate([
        //     'folder_number' => 'required',
        //     'property_name' => 'required',
        //     'id_property_location' => 'required',
        //     'id_property_type' => 'required',
        //     'id_property_description' => 'required',
        //     'property_area' => 'required',
        //     'plot_number' => 'required',
        //     'district_name' => 'required',
        //     'notes' => 'required',
        //     'property_files' => 'required',

        // ], [
        //     // 'folder_number.required' => 'حقل رقم الاضبارة مطلوب',
        //     'property_name.required' => 'حقل اسم العقار مطلوب',
        //     'id_property_location.required' => 'حقل موقع العقار مطلوب',
        //     'id_property_type.required' => 'حقل نوع العقار مطلوب',
        //     'id_property_description.required' => 'حقل صفة العقار مطلوب',
        //     'property_area.required' => 'حقل مساحة العقار مطلوب',
        //     'plot_number.required' => 'حقل رقم القطعة مطلوب',
        //     'district_name.required' => 'حقل اسم المقاطعة مطلوب',
        //     'notes.required' => 'حقل الملاحظات مطلوب',
        //     'property_files.required' => 'حقل الملفات مطلوب',
        // ]);

        $latestFolder = Propertyfolder::latest()->first();
        if ($latestFolder) {
            $latestFolder = Propertyfolder::orderBy('folder_number', 'desc')->first();
            $this->folder_number = $latestFolder ? $latestFolder->folder_number + 1 : 1;
        } else {
            $this->folder_number = 1;
        }

        Propertyfolder::create([
            'user_id' => Auth::id(),
            'folder_number' => $this->folder_number,
            'property_name' => $this->property_name,
            'id_property_location' => $this->id_property_location,
            'id_property_type' => $this->id_property_type,
            'id_property_description' => $this->id_property_description,
            'property_area' => $this->property_area,
            'plot_number' => $this->plot_number,
            'district_name' => $this->district_name,
            'notes' => $this->notes,
            'property_files' => $this->property_files,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

    public function GetPropertyfolde($PropertyfoldeId)
    {
        $this->resetValidation();

        $this->Propertyfolde  = Propertyfolder::find($PropertyfoldeId);
        $this->PropertyfoldeId = $this->Propertyfolde->id;
        $this->folder_number = $this->Propertyfolde->folder_number;
        $this->property_name = $this->Propertyfolde->property_name;
        $this->id_property_location = $this->Propertyfolde->id_property_location;
        $this->id_property_type = $this->Propertyfolde->id_property_type;
        $this->id_property_description = $this->Propertyfolde->id_property_description;
        $this->property_area = $this->Propertyfolde->property_area;
        $this->plot_number = $this->Propertyfolde->plot_number;
        $this->district_name = $this->Propertyfolde->district_name;
        $this->notes = $this->Propertyfolde->notes;
        $this->property_files = $this->Propertyfolde->property_files;
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            // 'folder_number' => 'required:propertyfolder',
            'property_name' => 'required:propertyfolder',
            'id_property_location' => 'required:propertyfolder',
            'id_property_type' => 'required:propertyfolder',
            'id_property_description' => 'required:propertyfolder',
            'property_area' => 'required:propertyfolder',
            'plot_number' => 'required:propertyfolder',
            'district_name' => 'required:propertyfolder',
            'notes' => 'required:propertyfolder',
            'property_files' => 'required:propertyfolder',

        ], [
            // 'folder_number.required' => 'حقل رقم الاضبارة مطلوب',
            'property_name.required' => 'حقل اسم العقار مطلوب',
            'id_property_location.required' => 'حقل موقع العقار مطلوب',
            'id_property_type.required' => 'حقل نوع العقار مطلوب',
            'id_property_description.required' => 'حقل صفة العقار مطلوب',
            'property_area.required' => 'حقل مساحة العقار مطلوب',
            'plot_number.required' => 'حقل رقم القطعة مطلوب',
            'district_name.required' => 'حقل اسم المقاطعة مطلوب',
            'notes.required' => 'حقل الملاحظات مطلوب',
            'property_files.required' => 'حقل الملفات مطلوب',

        ]);

        $Propertyfolder = Propertyfolder::find($this->PropertyfoldeId);
        $Propertyfolder->update([
            'folder_number' => $this->folder_number,
            'property_name' => $this->property_name,
            'id_property_location' => $this->id_property_location,
            'id_property_type' => $this->id_property_type,
            'id_property_description' => $this->id_property_description,
            'property_area' => $this->property_area,
            'plot_number' => $this->plot_number,
            'district_name' => $this->district_name,
            'notes' => $this->notes,
            'property_files' => $this->property_files,

        ]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Propertyfolder = Propertyfolder::find($this->PropertyfoldeId);

        if ($Propertyfolder) {

            $Propertyfolder->delete();
            $this->reset();
            $this->dispatchBrowserEvent('success', [
                'message' => 'تم حذف البيانات بنجاح',
                'title' => 'الحذف'
            ]);
        }
    }
}
