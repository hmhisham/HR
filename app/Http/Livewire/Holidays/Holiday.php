<?php

namespace App\Http\Livewire\Holidays;

use Livewire\Component;
use Livewire\WithFileUploads;

use Livewire\WithPagination;
use App\Models\Holidays\Holidays;

class Holiday extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $Holidays = [];
    public $HolidaySearch, $Holiday, $HolidayId;
    public $calculator_number, $order_number, $order_date, $holiday_type, $holiday_purpose, $days_count, $separation_date, $resumption_date, $cut_off_holiday, $file_path, $notes;
    use WithPagination, WithFileUploads;
    public function mount()
    {
        $this->file_path = 'uploads/your-stored-file.jpg';
    }



    public function render()
    {
        $HolidaySearch = '%' . $this->HolidaySearch . '%';
        $Holidays = Holidays::where('calculator_number', 'LIKE', $HolidaySearch)
            ->orWhere('order_number', 'LIKE', $HolidaySearch)
            ->orWhere('order_date', 'LIKE', $HolidaySearch)
            ->orWhere('holiday_type', 'LIKE', $HolidaySearch)
            ->orWhere('holiday_purpose', 'LIKE', $HolidaySearch)
            ->orWhere('days_count', 'LIKE', $HolidaySearch)
            ->orWhere('separation_date', 'LIKE', $HolidaySearch)
            ->orWhere('resumption_date', 'LIKE', $HolidaySearch)
            ->orWhere('cut_off_holiday', 'LIKE', $HolidaySearch)
            ->orWhere('file_path', 'LIKE', $HolidaySearch)
            ->orWhere('notes', 'LIKE', $HolidaySearch)


            ->orderBy('id', 'ASC')
            ->paginate(10);
        $links = $Holidays;
        $this->Holidays = collect($Holidays->items());
        return view('livewire.holidays.holiday', [
            'links' => $links
        ]);
    }

    public function AddHolidayModalShow()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('HolidayModalShow');
    }


    public function store()
    {
        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required',
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
            'notes' => 'required',

        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'order_number.required' => 'حقل الاسم مطلوب',
            'order_date.required' => 'حقل الاسم مطلوب',
            'holiday_type.required' => 'حقل الاسم مطلوب',
            'holiday_purpose.required' => 'حقل الاسم مطلوب',
            'days_count.required' => 'حقل الاسم مطلوب',
            'separation_date.required' => 'حقل الاسم مطلوب',
            'resumption_date.required' => 'حقل الاسم مطلوب',
            'cut_off_holiday.required' => 'حقل الاسم مطلوب',
            'file_path.required' => 'حقل الاسم مطلوب',
            'notes.required' => 'حقل الاسم مطلوب',
        ]);
        if ($this->file_path instanceof \Livewire\TemporaryUploadedFile) {
            $file_path = $this->file_path->store('uploads', 'public');
        }
        //$fullName = implode(' ', [$this->FirstName, $this->SecondName, $this->ThirdName]);


        Holidays::create([
            'calculator_number' => $this->calculator_number,
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
        $this->reset();
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
        $this->calculator_number = $this->Holiday->calculator_number;
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
    }

    public function update()
    {
        $this->resetValidation();
        $this->validate([
            'calculator_number' => 'required:holidays',
            'order_number' => 'required:holidays',
            'order_date' => 'required:holidays',
            'holiday_type' => 'required:holidays',
            'holiday_purpose' => 'required:holidays',
            'days_count' => 'required:holidays',
            'separation_date' => 'required:holidays',
            'resumption_date' => 'required:holidays',
            'cut_off_holiday' => 'required:holidays',
            'file_path' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'notes' => 'required:holidays',

        ], [
            'calculator_number.required' => 'حقل الاسم مطلوب',
            'order_number.required' => 'حقل الاسم مطلوب',
            'order_date.required' => 'حقل الاسم مطلوب',
            'holiday_type.required' => 'حقل الاسم مطلوب',
            'holiday_purpose.required' => 'حقل الاسم مطلوب',
            'days_count.required' => 'حقل الاسم مطلوب',
            'separation_date.required' => 'حقل الاسم مطلوب',
            'resumption_date.required' => 'حقل الاسم مطلوب',
            'cut_off_holiday.required' => 'حقل الاسم مطلوب',
            'file_path.required' => 'حقل الاسم مطلوب',
            'notes.required' => 'حقل الاسم مطلوب',
        ]);

        $Holidays = Holidays::find($this->HolidayId);
        if ($this->file_path instanceof \Livewire\TemporaryUploadedFile) {
            $file_path = $this->file_path->store('uploads', 'public');
        } else {
            $file_path = $this->file_path;
        }
        $Holidays->update([
            'calculator_number' => $this->calculator_number,
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
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم التعديل بنجاح',
            'title' => 'تعديل'
        ]);
    }

    public function destroy()
    {
        $Holidays = Holidays::find($this->HolidayId);
        $Holidays->delete();
        $this->reset();
        $this->dispatchBrowserEvent('success', [
            'message' => 'تم حذف البيانات  بنجاح',
            'title' => 'الحذف '
        ]);
    }
}
