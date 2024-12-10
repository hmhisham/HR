<?php
namespace App\Http\Livewire\Property;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Property\Property;
 
class Propert extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Property = [];
     public $PropertSearch, $Propert, $PropertId;
    public $user_id,$worker_id,$bonds_id,$from_date,$to_date,$months_count,$total_amount,$paid_amount,$property_status,$status,$notifications,$notes;


    Public function render()
    {
        $PropertSearch ='%' . $this->PropertSearch . '%';
        $Property = Property::where('user_id', 'LIKE', $PropertSearch)
->orWhere('worker_id', 'LIKE', $PropertSearch)
->orWhere('bonds_id', 'LIKE', $PropertSearch)
->orWhere('from_date', 'LIKE', $PropertSearch)
->orWhere('to_date', 'LIKE', $PropertSearch)
->orWhere('months_count', 'LIKE', $PropertSearch)
->orWhere('total_amount', 'LIKE', $PropertSearch)
->orWhere('paid_amount', 'LIKE', $PropertSearch)
->orWhere('property_status', 'LIKE', $PropertSearch)
->orWhere('status', 'LIKE', $PropertSearch)
->orWhere('notifications', 'LIKE', $PropertSearch)
->orWhere('notes', 'LIKE', $PropertSearch)
 
 
         ->orderBy('id', 'ASC')
         ->paginate(10); 
        $links = $Property;
        $this->Property = collect($Property->items());
        return view('livewire.property.propert', [
            'links' => $links
        ]);
    }
     public function AddPropertModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('PropertModalShow');
    }

 
    public function store()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required' ,
'worker_id' => 'required' ,
'bonds_id' => 'required' ,
'from_date' => 'required' ,
'to_date' => 'required' ,
'months_count' => 'required' ,
'total_amount' => 'required' ,
'paid_amount' => 'required' ,
'property_status' => 'required' ,
'status' => 'required' ,
'notifications' => 'required' ,
'notes' => 'required' ,

                 ], [
                'user_id.required' => 'حقل رقم المستخدم مطلوب', 
                'worker_id.required' => 'حقل رقم المستخدم مطلوب', 
                'bonds_id.required' => 'حقل رقم العقار مطلوب', 
                'from_date.required' => 'حقل من تاريخ مطلوب', 
                'to_date.required' => 'حقل الى تاريخ مطلوب', 
                'months_count.required' => 'حقل عدد الاشهر مطلوب', 
                'total_amount.required' => 'حقل المبلغ الكلي مطلوب', 
                'paid_amount.required' => 'حقل مجموع المسدد مطلوب', 
                'property_status.required' => 'حقل حالة العقار مطلوب', 
                'status.required' => 'حقل الحالة مطلوب', 
                'notifications.required' => 'حقل الاشعارات مطلوب', 
                'notes.required' => 'حقل ملاحظات مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Property::create([
'user_id'=> $this->user_id,
'worker_id'=> $this->worker_id,
'bonds_id'=> $this->bonds_id,
'from_date'=> $this->from_date,
'to_date'=> $this->to_date,
'months_count'=> $this->months_count,
'total_amount'=> $this->total_amount,
'paid_amount'=> $this->paid_amount,
'property_status'=> $this->property_status,
'status'=> $this->status,
'notifications'=> $this->notifications,
'notes'=> $this->notes,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetPropert($PropertId)
    {
        $this->resetValidation();

        $this-> Propert  = Property::find($PropertId);
        $this-> PropertId = $this->Propert->id;
             $this->user_id= $this->Propert->user_id;
      $this->worker_id= $this->Propert->worker_id;
      $this->bonds_id= $this->Propert->bonds_id;
      $this->from_date= $this->Propert->from_date;
      $this->to_date= $this->Propert->to_date;
      $this->months_count= $this->Propert->months_count;
      $this->total_amount= $this->Propert->total_amount;
      $this->paid_amount= $this->Propert->paid_amount;
      $this->property_status= $this->Propert->property_status;
      $this->status= $this->Propert->status;
      $this->notifications= $this->Propert->notifications;
      $this->notes= $this->Propert->notes;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required:property' ,
'worker_id' => 'required:property' ,
'bonds_id' => 'required:property' ,
'from_date' => 'required:property' ,
'to_date' => 'required:property' ,
'months_count' => 'required:property' ,
'total_amount' => 'required:property' ,
'paid_amount' => 'required:property' ,
'property_status' => 'required:property' ,
'status' => 'required:property' ,
'notifications' => 'required:property' ,
'notes' => 'required:property' ,

                 ], [
                'user_id.required' => 'حقل رقم المستخدم مطلوب',
                'worker_id.required' => 'حقل رقم المستخدم مطلوب',
                'bonds_id.required' => 'حقل رقم العقار مطلوب',
                'from_date.required' => 'حقل من تاريخ مطلوب',
                'to_date.required' => 'حقل الى تاريخ مطلوب',
                'months_count.required' => 'حقل عدد الاشهر مطلوب',
                'total_amount.required' => 'حقل المبلغ الكلي مطلوب',
                'paid_amount.required' => 'حقل مجموع المسدد مطلوب',
                'property_status.required' => 'حقل حالة العقار مطلوب',
                'status.required' => 'حقل الحالة مطلوب',
                'notifications.required' => 'حقل الاشعارات مطلوب',
                'notes.required' => 'حقل ملاحظات مطلوب', ]);
                                 
             $Property = Property::find($this->PropertId);     $Property->update([
'user_id'=> $this->user_id,
'worker_id'=> $this->worker_id,
'bonds_id'=> $this->bonds_id,
'from_date'=> $this->from_date,
'to_date'=> $this->to_date,
'months_count'=> $this->months_count,
'total_amount'=> $this->total_amount,
'paid_amount'=> $this->paid_amount,
'property_status'=> $this->property_status,
'status'=> $this->status,
'notifications'=> $this->notifications,
'notes'=> $this->notes,

]);
        $this->reset();
         $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
     }
                         
public function destroy()
{
    $Property = Property::find($this->PropertId);

    if ($Property) {

        $Property->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}
