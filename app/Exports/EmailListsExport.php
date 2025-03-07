<?php

namespace App\Exports;

use App\Models\Emaillists\Emaillists;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmailListsExport implements FromCollection, WithHeadings
{
    protected $selectedIds;

    public function __construct($selectedIds = [])
    {
        $this->selectedIds = $selectedIds;
    }
    public function collection()
    {
        if (empty($this->selectedIds)) {
            // إذا لم يتم تحديد صفوف، قم بتصدير جميع الصفوف
            return Emaillists::select('id', 'user_id', 'department', 'email', 'notes', 'created_at')->get();
        }

        // إذا تم تحديد صفوف، قم بتصديرها فقط
        return Emaillists::whereIn('id', $this->selectedIds)
            ->select('id', 'user_id', 'department', 'email', 'notes', 'created_at')
            ->get();
    }
    public function headings(): array
    {
        return ["ID", "رقم المستخدم", "القسم", "البريد الإلكتروني", "ملاحظات", "تاريخ الإنشاء"];
    }
}
