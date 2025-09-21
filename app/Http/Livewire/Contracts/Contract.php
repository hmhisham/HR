<?php
namespace App\Http\Livewire\Contracts;
use Livewire\Component;
  
 use Livewire\WithPagination;
use App\Models\Contracts\Contracts;
 
class Contract extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Contracts = [];
     public $ContractSearch, $Contract, $ContractId;
    public $user_id,$property_folder_id,$document_contract_number,$generated_contract_number,$start_date,$approval_date,$end_date,$tenant_name,$annual_rent_amount,$amount_in_words,$lease_duration,$usage_type,$phone_number,$address,$notes;
Public $search = ['document_contract_number' => '', 'generated_contract_number' => '', 'start_date' => '', 'end_date' => '', 'tenant_name' => '', 'annual_rent_amount' => '', 'notes' => ''];
 
        Public Function render()
    {
        
 $document_contract_numberSearch = '%' . $this->search['document_contract_number'] . '%';
 $generated_contract_numberSearch = '%' . $this->search['generated_contract_number'] . '%';
 $start_dateSearch = '%' . $this->search['start_date'] . '%';
 $end_dateSearch = '%' . $this->search['end_date'] . '%';
 $tenant_nameSearch = '%' . $this->search['tenant_name'] . '%';
 $annual_rent_amountSearch = '%' . $this->search['annual_rent_amount'] . '%';
 $notesSearch = '%' . $this->search['notes'] . '%';
$Contracts = Contracts::query()
 ->when($this->search['document_contract_number'], function ($query) use ($document_contract_numberSearch) {
                $query->where('document_contract_number', 'LIKE', $document_contract_numberSearch);
            })
 ->when($this->search['generated_contract_number'], function ($query) use ($generated_contract_numberSearch) {
                $query->where('generated_contract_number', 'LIKE', $generated_contract_numberSearch);
            })
 ->when($this->search['start_date'], function ($query) use ($start_dateSearch) {
                $query->where('start_date', 'LIKE', $start_dateSearch);
            })
 ->when($this->search['end_date'], function ($query) use ($end_dateSearch) {
                $query->where('end_date', 'LIKE', $end_dateSearch);
            })
 ->when($this->search['tenant_name'], function ($query) use ($tenant_nameSearch) {
                $query->where('tenant_name', 'LIKE', $tenant_nameSearch);
            })
 ->when($this->search['annual_rent_amount'], function ($query) use ($annual_rent_amountSearch) {
                $query->where('annual_rent_amount', 'LIKE', $annual_rent_amountSearch);
            })
 ->when($this->search['notes'], function ($query) use ($notesSearch) {
                $query->where('notes', 'LIKE', $notesSearch);
            })

            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Contracts;
        $this->Contracts = collect($Contracts->items());
                Return View('livewire.contracts.contract', [
            'Contracts' => $Contracts,
            'links' => $links
        ]);
    }


     Public function AddContractModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('ContractModalShow');
    }


    Public function store()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required' ,
'property_folder_id' => 'required' ,
'document_contract_number' => 'required' ,
'generated_contract_number' => 'required' ,
'start_date' => 'required' ,
'approval_date' => 'required' ,
'end_date' => 'required' ,
'tenant_name' => 'required' ,
'annual_rent_amount' => 'required' ,
'amount_in_words' => 'required' ,
'lease_duration' => 'required' ,
'usage_type' => 'required' ,
'phone_number' => 'required' ,
'address' => 'required' ,
'notes' => 'required' ,

                 ], [
                'user_id.required' => 'حقل  مطلوب', 
                'property_folder_id.required' => 'حقل  مطلوب', 
                'document_contract_number.required' => 'حقل رقم العقد في المستند مطلوب', 
                'generated_contract_number.required' => 'حقل رقم العقد المنشأ مطلوب', 
                'start_date.required' => 'حقل تاريخ بداية العقد مطلوب', 
                'approval_date.required' => 'حقل تاريخ المصادقة على العقد مطلوب', 
                'end_date.required' => 'حقل تاريخ انتهاء العقد مطلوب', 
                'tenant_name.required' => 'حقل اسم المستأجر مطلوب', 
                'annual_rent_amount.required' => 'حقل مبلغ التأجير للسنة الواحدة مطلوب', 
                'amount_in_words.required' => 'حقل المبلغ كتابةً مطلوب', 
                'lease_duration.required' => 'حقل مدة الإيجار مطلوب', 
                'usage_type.required' => 'حقل نوع الاستغلال مطلوب', 
                'phone_number.required' => 'حقل رقم الهاتف مطلوب', 
                'address.required' => 'حقل العنوان مطلوب', 
                'notes.required' => 'حقل الملاحظات مطلوب',  ]);
                                 
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Contracts::create([
'user_id'=> $this->user_id,
'property_folder_id'=> $this->property_folder_id,
'document_contract_number'=> $this->document_contract_number,
'generated_contract_number'=> $this->generated_contract_number,
'start_date'=> $this->start_date,
'approval_date'=> $this->approval_date,
'end_date'=> $this->end_date,
'tenant_name'=> $this->tenant_name,
'annual_rent_amount'=> $this->annual_rent_amount,
'amount_in_words'=> $this->amount_in_words,
'lease_duration'=> $this->lease_duration,
'usage_type'=> $this->usage_type,
'phone_number'=> $this->phone_number,
'address'=> $this->address,
'notes'=> $this->notes,

]);
        $this->reset();
        $this->dispatchBrowserEvent('success', [
        'message' => 'تم الاضافه بنجاح',
            'title' => 'اضافه'
        ]);
    }

 public function GetContract($ContractId)
    {
        $this->resetValidation();

        $this-> Contract  = Contracts::find($ContractId);
        $this-> ContractId = $this->Contract->id;
             $this->user_id= $this->Contract->user_id;
      $this->property_folder_id= $this->Contract->property_folder_id;
      $this->document_contract_number= $this->Contract->document_contract_number;
      $this->generated_contract_number= $this->Contract->generated_contract_number;
      $this->start_date= $this->Contract->start_date;
      $this->approval_date= $this->Contract->approval_date;
      $this->end_date= $this->Contract->end_date;
      $this->tenant_name= $this->Contract->tenant_name;
      $this->annual_rent_amount= $this->Contract->annual_rent_amount;
      $this->amount_in_words= $this->Contract->amount_in_words;
      $this->lease_duration= $this->Contract->lease_duration;
      $this->usage_type= $this->Contract->usage_type;
      $this->phone_number= $this->Contract->phone_number;
      $this->address= $this->Contract->address;
      $this->notes= $this->Contract->notes;

    }  
          
 public function update()
    {
        $this->resetValidation();
         $this->validate(['user_id' => 'required:contracts' ,
'property_folder_id' => 'required:contracts' ,
'document_contract_number' => 'required:contracts' ,
'generated_contract_number' => 'required:contracts' ,
'start_date' => 'required:contracts' ,
'approval_date' => 'required:contracts' ,
'end_date' => 'required:contracts' ,
'tenant_name' => 'required:contracts' ,
'annual_rent_amount' => 'required:contracts' ,
'amount_in_words' => 'required:contracts' ,
'lease_duration' => 'required:contracts' ,
'usage_type' => 'required:contracts' ,
'phone_number' => 'required:contracts' ,
'address' => 'required:contracts' ,
'notes' => 'required:contracts' ,

                 ], [
                'user_id.required' => 'حقل  مطلوب',
                'property_folder_id.required' => 'حقل  مطلوب',
                'document_contract_number.required' => 'حقل رقم العقد في المستند مطلوب',
                'generated_contract_number.required' => 'حقل رقم العقد المنشأ مطلوب',
                'start_date.required' => 'حقل تاريخ بداية العقد مطلوب',
                'approval_date.required' => 'حقل تاريخ المصادقة على العقد مطلوب',
                'end_date.required' => 'حقل تاريخ انتهاء العقد مطلوب',
                'tenant_name.required' => 'حقل اسم المستأجر مطلوب',
                'annual_rent_amount.required' => 'حقل مبلغ التأجير للسنة الواحدة مطلوب',
                'amount_in_words.required' => 'حقل المبلغ كتابةً مطلوب',
                'lease_duration.required' => 'حقل مدة الإيجار مطلوب',
                'usage_type.required' => 'حقل نوع الاستغلال مطلوب',
                'phone_number.required' => 'حقل رقم الهاتف مطلوب',
                'address.required' => 'حقل العنوان مطلوب',
                'notes.required' => 'حقل الملاحظات مطلوب', ]);
                                 
             $Contracts = Contracts::find($this->ContractId);     $Contracts->update([
'user_id'=> $this->user_id,
'property_folder_id'=> $this->property_folder_id,
'document_contract_number'=> $this->document_contract_number,
'generated_contract_number'=> $this->generated_contract_number,
'start_date'=> $this->start_date,
'approval_date'=> $this->approval_date,
'end_date'=> $this->end_date,
'tenant_name'=> $this->tenant_name,
'annual_rent_amount'=> $this->annual_rent_amount,
'amount_in_words'=> $this->amount_in_words,
'lease_duration'=> $this->lease_duration,
'usage_type'=> $this->usage_type,
'phone_number'=> $this->phone_number,
'address'=> $this->address,
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
    $Contracts = Contracts::find($this->ContractId);

    if ($Contracts) {

        $Contracts->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات بنجاح',
            'title' => 'الحذف'
        ]);
    }
}
}
