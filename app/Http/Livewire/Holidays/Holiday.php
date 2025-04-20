<?php

namespace App\Http\Livewire\Holidays;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Workers\Workers;
use App\Models\Holidays\Holidays;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Holiday extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';

  public $Holidays = [];
  public $HolidaySearch, $Holiday, $HolidayId;
  public $user_id, $computer_number, $order_number, $order_date, $holiday_type, $holiday_purpose, $days_count, $separation_date, $resumption_date, $cut_off_holiday, $file_path, $notes;
  use WithPagination, WithFileUploads;
  public function mount()
  {
    $this->workers = Workers::all();
    $this->file_path = 'uploads/your-stored-file.jpg';
  }

  public $search = '';
  public $workers = [];
  public $worker,   $department, $full_name;
  public $selectedWorker = null;


  protected $listeners = [
    'SelectWorker',
  ];

  public function hydrate()
  {
    $this->emit('select2');
  }



  public function SelectWorker($workerID)
  {

    $worker = Workers::find($workerID);


    if ($worker) {
      $this->worker = $workerID;
      $this->computer_number = $worker->computer_number;
      $this->department = $worker->department;
    } else {
      $this->worker = null;
      $this->computer_number = null;
      $this->department = null;
    }
  }

  public function render()
  {
    $HolidaySearch = '%' . $this->HolidaySearch . '%';
    $Holidays = Holidays::join('workers', 'holidays.computer_number', '=', 'workers.computer_number')
      ->where(function ($query) use ($HolidaySearch) {
        $query->where('Holidays.computer_number', 'LIKE', $HolidaySearch)
          ->orWhere('workers.full_name', 'LIKE', $HolidaySearch);
      })
      ->orderBy('Holidays.id', 'ASC')
      ->select('Holidays.*')
      ->paginate(10);

    $links = $Holidays;
    $this->Holidays = collect($Holidays->items());

    return view('livewire.holidays.holiday', [
      'links' => $links
    ]);
  }


  public function AddHolidayModalShow()
  {
    // $this->reset();
    $this->resetValidation();
    $this->dispatchBrowserEvent('HolidayModalShow');
  }


  public function store()
  {
    $this->resetValidation();
    $this->validate([

      'computer_number' => 'required',
      'order_number' => 'required',
      'order_date' => 'required',
      'holiday_type' => 'required',
      'holiday_purpose' => 'required',
      'days_count' => 'required',
      'separation_date' => 'required',
      'resumption_date' => 'required',
      'cut_off_holiday' => 'required',
      'file_path' => 'required',
      'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',


    ], [

      'computer_number.required' => 'حقل الاسم مطلوب',
      'order_number.required' => 'حقل الاسم مطلوب',
      'order_date.required' => 'حقل الاسم مطلوب',
      'holiday_type.required' => 'حقل الاسم مطلوب',
      'holiday_purpose.required' => 'حقل الاسم مطلوب',
      'days_count.required' => 'حقل الاسم مطلوب',
      'separation_date.required' => 'حقل الاسم مطلوب',
      'resumption_date.required' => 'حقل الاسم مطلوب',
      'cut_off_holiday.required' => 'حقل الاسم مطلوب',
      'file_path.required' => 'حقل الاسم مطلوب',

    ]);
    if ($this->file_path instanceof \Livewire\TemporaryUploadedFile) {
      $file_path = $this->file_path->store('uploads', 'public');
    }



    Holidays::create([
      'user_id' => Auth::id(),
      'computer_number' => $this->computer_number,
      'order_number' => $this->order_number,
      'order_date' => $this->order_date,
      'holiday_type' => $this->holiday_type,
      'holiday_purpose' => $this->holiday_purpose,
      'days_count' => $this->days_count,
      'separation_date' => $this->separation_date,
      'resumption_date' => $this->resumption_date,
      'cut_off_holiday' => $this->cut_off_holiday,
      'file_path' =>  $file_path,
      'notes' => $this->notes,

    ]);
    $this->reset(['department', 'computer_number', 'order_number', 'order_date', 'holiday_type', 'holiday_purpose', 'days_count', 'separation_date', 'resumption_date', 'cut_off_holiday', 'file_path', 'notes']);
    $this->dispatchBrowserEvent('success', [
      'message' => 'تم الاضافه بنجاح',
      'title' => 'اضافه'
    ]);
  }

  public function GetHoliday($HolidayId)
  {
    $this->resetValidation();

    $this->Holiday  = Holidays::find($HolidayId);

    $this->HolidayId = $this->Holiday->id;
    $this->user_id = $this->Holiday->user_id;
    $this->computer_number = $this->Holiday->computer_number;
    $this->order_number = $this->Holiday->order_number;
    $this->order_date = $this->Holiday->order_date;
    $this->holiday_type = $this->Holiday->holiday_type;
    $this->holiday_purpose = $this->Holiday->holiday_purpose;
    $this->days_count = $this->Holiday->days_count;
    $this->separation_date = $this->Holiday->separation_date;
    $this->resumption_date = $this->Holiday->resumption_date;
    $this->cut_off_holiday = $this->Holiday->cut_off_holiday;
    $this->file_path = $this->Holiday->file_path;
    $this->notes = $this->Holiday->notes;

    $worker = $this->Holiday->worker;
    if ($worker) {
      $this->full_name = $worker->full_name;
      $this->department = $worker->department;
    } else {
      $this->full_name = 'N/A';
      $this->department = 'N/A';
    }
  }

  public function update()
  {
    $this->resetValidation();
    $this->validate([

      'computer_number' => 'required:holidays',
      'order_number' => 'required:holidays',
      'order_date' => 'required:holidays',
      'holiday_type' => 'required:holidays',
      'holiday_purpose' => 'required:holidays',
      'days_count' => 'required:holidays',
      'separation_date' => 'required:holidays',
      'resumption_date' => 'required:holidays',
      'cut_off_holiday' => 'required:holidays',
      'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',


    ], [

      'computer_number.required' => 'حقل الاسم مطلوب',
      'order_number.required' => 'حقل الاسم مطلوب',
      'order_date.required' => 'حقل الاسم مطلوب',
      'holiday_type.required' => 'حقل الاسم مطلوب',
      'holiday_purpose.required' => 'حقل الاسم مطلوب',
      'days_count.required' => 'حقل الاسم مطلوب',
      'separation_date.required' => 'حقل الاسم مطلوب',
      'resumption_date.required' => 'حقل الاسم مطلوب',
      'cut_off_holiday.required' => 'حقل الاسم مطلوب',
      'file_path.required' => 'حقل الاسم مطلوب',

    ]);

    $Holidays = Holidays::find($this->HolidayId);
    if ($this->file_path instanceof \Livewire\TemporaryUploadedFile) {
      $file_path = $this->file_path->store('uploads', 'public');
    } else {
      $file_path = $this->file_path;
    }
    $Holidays->update([
      'user_id' => Auth::id(),
      'computer_number' => $this->computer_number,
      'order_number' => $this->order_number,
      'order_date' => $this->order_date,
      'holiday_type' => $this->holiday_type,
      'holiday_purpose' => $this->holiday_purpose,
      'days_count' => $this->days_count,
      'separation_date' => $this->separation_date,
      'resumption_date' => $this->resumption_date,
      'cut_off_holiday' => $this->cut_off_holiday,
      'file_path' =>  $file_path,
      'notes' => $this->notes,

    ]);
    $this->reset(['department', 'computer_number', 'order_number', 'order_date', 'holiday_type', 'holiday_purpose', 'days_count', 'separation_date', 'resumption_date', 'cut_off_holiday', 'file_path', 'notes']);
    $this->dispatchBrowserEvent('success', [
      'message' => 'تم التعديل بنجاح',
      'title' => 'تعديل'
    ]);
  }

  public function destroy()
  {
    $Holidays = Holidays::find($this->HolidayId);

    if ($Holidays) {

      if ($Holidays->file_path) {
        $filePath = 'public/' . $Holidays->file_path;
        if (Storage::exists($Holidays)) {
          Storage::delete($Holidays);
        }
      }

      $Holidays->delete();
      $this->reset(['department', 'computer_number', 'order_number', 'order_date', 'holiday_type', 'holiday_purpose', 'days_count', 'separation_date', 'resumption_date', 'cut_off_holiday', 'file_path', 'notes']);
      $this->dispatchBrowserEvent('success', [
        'message' => 'تم حذف البيانات بنجاح',
        'title' => 'الحذف'
      ]);
    }
  }
}
