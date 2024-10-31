<?php

namespace App\Http\Livewire\PrivateEmployeeFiles;

use File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\FileDownloads\FileDownloads;

class PrivateEmployeeFiles extends Component
{
    use WithFileUploads;

    public $PrivateFiles = [];
    public $fileChoose, $fileName, $fileExt, $Size, $fileChooseSize, $fileSize, $fileCreationTime;
    public $filePreview;

    protected $listeners = [
        'mount' => 'mount'
    ];

    public function hydrate()
    {
        //
    }

    public function mount()
    {
        $Files = File::files(public_path('storage/PrivateEmployeeFiles'));
        $PrivateFiles = [];
        foreach ($Files as $File) {
            $baseFileName = pathinfo($File, PATHINFO_BASENAME);
            $fileName = pathinfo($File, PATHINFO_FILENAME);
            $fileExt = strtoupper(pathinfo($File, PATHINFO_EXTENSION));

            $base = log($File->getSize(), 1024);
            $suffixes = array('بايت', 'كيلوبايت', 'ميكابايت', 'كيكابايت', 'تيرابايت');
            $fileSize = round(pow(1024, $base - floor($base)), 2) . ' ' . $suffixes[floor($base)];
//dd(Storage::path($baseFileName));
//dd(url($File['dirname']));
$file_path = public_path('storage/PrivateEmployeeFiles/'.$baseFileName);
$fileURL = $file_path;
            //$fileURL = Storage::getDriver();
            //$fileURL = url('public/storage/PrivateEmployeeFiles/'.$baseFileName);

            $fileCreationTime = date('Y-m-d H:i:s', filectime(realpath($File)));
            //$modificationTime = filemtime(realpath($File));

            $FileDownloads = FileDownloads::where('file_name', pathinfo($File)['basename'])->first();
            if($FileDownloads){
                $DownloadCount = $FileDownloads->download_count;
            }else{
                $DownloadCount = 0;
            }
            $PrivateFiles[] = array(
                $baseFileName,
                $fileName,
                $fileExt,
                $fileSize,
                $fileURL,
                $fileCreationTime,
                $DownloadCount
            );
        }

        $this->PrivateFiles = $PrivateFiles;
    }

    public function render()
    {
        return view('livewire.private-employee-files.private-employee-files');
    }

    public function updatedFileChoose()
    {
        $this->fileName = $this->fileChoose->getClientOriginalName();
        $this->fileChooseSize = $this->fileChoose->getSize();
        $base = log($this->fileChooseSize, 1024);
        $this->Size = round(pow(1024, $base - floor($base)), 2);
        $suffixes = array('بايت', 'كيلوبايت', 'ميكابايت', 'كيكابايت', 'تيرابايت');
        $this->fileSize = round(pow(1024, $base - floor($base)), 2) . ' ' . $suffixes[floor($base)];

        $this->resetValidation();
        $this->validate([
            'fileChoose' => 'mimes:pdf', // 500KB Max
        ],[
            'fileChoose.max' => 'يجب ألا يزيد حجم الصورة عن 500 كيلو بايت.',
            'fileChoose.mimes' => 'يجب اختيار ملفات من نوع PDF'
        ]);
    }

    public function uploadFile()
    {
        $this->resetValidation();
        $this->validate([
            'fileChoose' => 'mimes:pdf', // 500KB Max
        ],[
            'fileChoose.max' => 'يجب ألا يزيد حجم الصورة عن 500 كيلو بايت.',
            'fileChoose.mimes' => 'يجب اختيار ملفات من نوع PDF'
        ]);

        $fileChoose = str_replace(' ', '-', $this->fileChoose->getClientOriginalName());
        Storage::disk('PrivateFiles')->put($fileChoose, file_get_contents($this->fileChoose->getRealpath()));
        //$this->fileChoose->storeAs('destination/folder/in/disk', $this->fileChoose->getClientOriginalName() ,'PrivateFiles');

        FileDownloads::create([
            'file_name' => $fileChoose
        ]);

        $this->reset();

        $this->dispatchBrowserEvent('success', [
            'message' => 'تم رفع الملف بنجاح',
            'title' => 'ملفات خاصة',
        ]);

        $this->emit('mount');
    }

    public function removeFileChoose()
    {
        if(file_exists($this->fileChoose->getRealPath())){
            unlink($this->fileChoose->getRealPath());
            $this->dispatchBrowserEvent('dismissModal');
            $this->reset('fileChoose');
        }else{
            $this->dispatchBrowserEvent('error', [
                'message' => 'الملف غير موجود.',
                'title' => 'ملفات خاصة',
            ]);
        }
    }

    public function FilePreview($fileName)
    {
        if(file_exists(public_path('storage/PrivateEmployeeFiles/'. $fileName)))
        {
            $this->filePreview = $fileName;

            $fileSize = File::size(public_path('storage/PrivateEmployeeFiles/'. $fileName));

            $base = log($fileSize, 1024);
            $suffixes = array('بايت', 'كيلوبايت', 'ميكابايت', 'كيكابايت', 'تيرابايت');
            $this->fileSize = round(pow(1024, $base - floor($base)), 2) . ' ' . $suffixes[floor($base)];
        }
    }

    public function FileDownloads($fileName)
    {
        // تحديث عدد مرات التحميل
        $fileDownload = FileDownloads::where('file_name', $fileName)->first();
        $fileDownload->increment('download_count');
        $this->emit('mount');

        // تحميل الملف
        $headers = array(
            'Content-Type: application/pdf',
          );
        return response()->download(public_path('storage/PrivateEmployeeFiles/'. $fileName), $fileDownload->file_name, $headers);
        //return response()->download(public_path('storage/PrivateEmployeeFiles/'. $fileName));
    }

    public function FileDelete($fileName)
    {
        if(file_exists(public_path('storage/PrivateEmployeeFiles/'. $fileName))){
            if(unlink(public_path('storage/PrivateEmployeeFiles/'. $fileName)))
            {
                $file = FileDownloads::where('file_name', $fileName)->first();
                $file->delete();

                $this->dispatchBrowserEvent('success', [
                    'message' => 'تم حذف الملف بنجاح.',
                    'title' => 'ملفات خاصة',
                ]);
            }else{
                $this->dispatchBrowserEvent('error', [
                    'message' => 'خطأ : لم يحذف الملف',
                    'title' => 'ملفات خاصة',
                ]);
            }

        }else{
            $this->dispatchBrowserEvent('error', [
                'message' => 'الملف غير موجود.',
                'title' => 'ملفات خاصة',
            ]);
        }

        $this->emit('mount');
    }
}
