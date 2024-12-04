<?php
namespace App\Http\Livewire\Bonds;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Bonds\Bonds;
 
class Bond extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Bonds = [];
     public $BondSearch, $Bond, $BondId;
    public $boycott_id,$part_number,$property_number,$area_in_meters,$area_in_olok,$area_in_donum,$count,$date,$volume_number,$ownership,$property_type,$governorate,$district,$area,$mortgage_notes,$registered_office,$specialized_department,$property_deed_image,$notes,$visibility;


    Public function render()
    {
        $BondSearch ='%' . $this->BondSearch . '%';
        $Bonds = Bonds::where('boycott_id', 'LIKE', $BondSearch)
->orWhere('part_number', 'LIKE', $BondSearch)
->orWhere('property_number', 'LIKE', $BondSearch)
->orWhere('area_in_meters', 'LIKE', $BondSearch)
->orWhere('area_in_olok', 'LIKE', $BondSearch)
->orWhere('area_in_donum', 'LIKE', $BondSearch)
->orWhere('count', 'LIKE', $BondSearch)
->orWhere('date', 'LIKE', $BondSearch)
->orWhere('volume_number', 'LIKE', $BondSearch)
->orWhere('ownership', 'LIKE', $BondSearch)
->orWhere('property_type', 'LIKE', $BondSearch)
->orWhere('governorate', 'LIKE', $BondSearch)
->orWhere('district', 'LIKE', $BondSearch)
->orWhere('area', 'LIKE', $BondSearch)
->orWhere('mortgage_notes', 'LIKE', $BondSearch)
->orWhere('registered_office', 'LIKE', $BondSearch)
->orWhere('specialized_department', 'LIKE', $BondSearch)
->orWhere('property_deed_image', 'LIKE', $BondSearch)
->orWhere('notes', 'LIKE', $BondSearch)
->orWhere('visibility', 'LIKE', $BondSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Bonds;
        $this->Bonds = collect($Bonds->items());
        return view('livewire.bonds.bond', [
            'links' => $links
        ]);
    }

    public function AddBondModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('BondModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['boycott_id' => 'required' ,
'part_number' => 'required' ,
'property_number' => 'required' ,
'area_in_meters' => 'required' ,
'area_in_olok' => 'required' ,
'area_in_donum' => 'required' ,
'count' => 'required' ,
'date' => 'required' ,
'volume_number' => 'required' ,
'ownership' => 'required' ,
'property_type' => 'required' ,
'governorate' => 'required' ,
'district' => 'required' ,
'area' => 'required' ,
'mortgage_notes' => 'required' ,
'registered_office' => 'required' ,
'specialized_department' => 'required' ,
'property_deed_image' => 'required' ,
'notes' => 'required' ,
'visibility' => 'required' ,

                 ], [
                'boycott_id.required' => 'حقل رقم المقاطعة مطلوب', 
                'part_number.required' => 'حقل رقم القطعة مطلوب', 
                'property_number.required' => 'حقل رقم العقار مطلوب', 
                'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب', 
                'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب', 
                'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب', 
                'count.required' => 'حقل العدد مطلوب', 
                'date.required' => 'حقل التاريخ مطلوب', 
                'volume_number.required' => 'حقل رقم الجلد مطلوب', 
                'ownership.required' => 'حقل العائدية مطلوب', 
                'property_type.required' => 'حقل جنس العقار مطلوب', 
                'governorate.required' => 'حقل المحافظة مطلوب', 
                'district.required' => 'حقل القضاء مطلوب', 
                'area.required' => 'حقل الناحية مطلوب', 
                'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب', 
                'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب', 
                'specialized_department.required' => 'حقل الشعبة المختصة مطلوب', 
                'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب', 
                'notes.required' => 'حقل ملاحظات مطلوب', 
                'visibility.required' => 'حقل إمكانية ظهوره مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Bonds::create([
'boycott_id'=> $this->boycott_id,
'part_number'=> $this->part_number,
'property_number'=> $this->property_number,
'area_in_meters'=> $this->area_in_meters,
'area_in_olok'=> $this->area_in_olok,
'area_in_donum'=> $this->area_in_donum,
'count'=> $this->count,
'date'=> $this->date,
'volume_number'=> $this->volume_number,
'ownership'=> $this->ownership,
'property_type'=> $this->property_type,
'governorate'=> $this->governorate,
'district'=> $this->district,
'area'=> $this->area,
'mortgage_notes'=> $this->mortgage_notes,
'registered_office'=> $this->registered_office,
'specialized_department'=> $this->specialized_department,
'property_deed_image'=> $this->property_deed_image,
'notes'=> $this->notes,
'visibility'=> $this->visibility,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetBond($BondId)
    {
        $this->resetValidation();

        $this-> Bond  = Bonds::find($BondId);
        $this-> BondId = $this->Bond->id;
             $this->boycott_id= $this->Bond->boycott_id;
      $this->part_number= $this->Bond->part_number;
      $this->property_number= $this->Bond->property_number;
      $this->area_in_meters= $this->Bond->area_in_meters;
      $this->area_in_olok= $this->Bond->area_in_olok;
      $this->area_in_donum= $this->Bond->area_in_donum;
      $this->count= $this->Bond->count;
      $this->date= $this->Bond->date;
      $this->volume_number= $this->Bond->volume_number;
      $this->ownership= $this->Bond->ownership;
      $this->property_type= $this->Bond->property_type;
      $this->governorate= $this->Bond->governorate;
      $this->district= $this->Bond->district;
      $this->area= $this->Bond->area;
      $this->mortgage_notes= $this->Bond->mortgage_notes;
      $this->registered_office= $this->Bond->registered_office;
      $this->specialized_department= $this->Bond->specialized_department;
      $this->property_deed_image= $this->Bond->property_deed_image;
      $this->notes= $this->Bond->notes;
      $this->visibility= $this->Bond->visibility;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['boycott_id' => 'required:bonds' ,
'part_number' => 'required:bonds' ,
'property_number' => 'required:bonds' ,
'area_in_meters' => 'required:bonds' ,
'area_in_olok' => 'required:bonds' ,
'area_in_donum' => 'required:bonds' ,
'count' => 'required:bonds' ,
'date' => 'required:bonds' ,
'volume_number' => 'required:bonds' ,
'ownership' => 'required:bonds' ,
'property_type' => 'required:bonds' ,
'governorate' => 'required:bonds' ,
'district' => 'required:bonds' ,
'area' => 'required:bonds' ,
'mortgage_notes' => 'required:bonds' ,
'registered_office' => 'required:bonds' ,
'specialized_department' => 'required:bonds' ,
'property_deed_image' => 'required:bonds' ,
'notes' => 'required:bonds' ,
'visibility' => 'required:bonds' ,

                 ], [
                'boycott_id.required' => 'حقل رقم المقاطعة مطلوب',
                'part_number.required' => 'حقل رقم القطعة مطلوب',
                'property_number.required' => 'حقل رقم العقار مطلوب',
                'area_in_meters.required' => 'حقل المساحة بالمتر مطلوب',
                'area_in_olok.required' => 'حقل المساحة بالأولك مطلوب',
                'area_in_donum.required' => 'حقل المساحة بالدونم مطلوب',
                'count.required' => 'حقل العدد مطلوب',
                'date.required' => 'حقل التاريخ مطلوب',
                'volume_number.required' => 'حقل رقم الجلد مطلوب',
                'ownership.required' => 'حقل العائدية مطلوب',
                'property_type.required' => 'حقل جنس العقار مطلوب',
                'governorate.required' => 'حقل المحافظة مطلوب',
                'district.required' => 'حقل القضاء مطلوب',
                'area.required' => 'حقل الناحية مطلوب',
                'mortgage_notes.required' => 'حقل إشارات التأمينات مطلوب',
                'registered_office.required' => 'حقل الدائرة المسجل لديها مطلوب',
                'specialized_department.required' => 'حقل الشعبة المختصة مطلوب',
                'property_deed_image.required' => 'حقل صورة السند العقاري مطلوب',
                'notes.required' => 'حقل ملاحظات مطلوب',
                'visibility.required' => 'حقل إمكانية ظهوره مطلوب', ]);
                                 
             $Bonds = Bonds::find($this->BondId);     $Bonds->update([
'boycott_id'=> $this->boycott_id,
'part_number'=> $this->part_number,
'property_number'=> $this->property_number,
'area_in_meters'=> $this->area_in_meters,
'area_in_olok'=> $this->area_in_olok,
'area_in_donum'=> $this->area_in_donum,
'count'=> $this->count,
'date'=> $this->date,
'volume_number'=> $this->volume_number,
'ownership'=> $this->ownership,
'property_type'=> $this->property_type,
'governorate'=> $this->governorate,
'district'=> $this->district,
'area'=> $this->area,
'mortgage_notes'=> $this->mortgage_notes,
'registered_office'=> $this->registered_office,
'specialized_department'=> $this->specialized_department,
'property_deed_image'=> $this->property_deed_image,
'notes'=> $this->notes,
'visibility'=> $this->visibility,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Bonds = Bonds::find($this->BondId);

    if ($Bonds) {

        $Bonds->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}
