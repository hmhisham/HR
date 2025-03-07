<?php

namespace App\Exports;

use App\Models\Emaillists\Emaillists;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class EmailListsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Emaillists::select('id', 'user_id', 'department', 'email', 'notes', 'created_at')->get();
    }

    public function headings(): array
    {
        return ["ID", "رقم المستخدم", "القسم", "البريد الإلكتروني", "ملاحظات", "تاريخ الإنشاء"];
    }
}
