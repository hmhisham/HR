<?php

namespace App\Exports;

use App\Models\Realities\Realities;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;


class RealitiesExport extends DefaultValueBinder implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithCustomValueBinder
{
    protected $selectedIds;

    public function __construct($selectedIds = null)
    {
        $this->selectedIds = $selectedIds;
    }

    public function collection()
    {
        $query = Realities::with([
            'GetProvinces',
            'GetPlots',
            'Getbranc',
            'Getpropertycategor',
            'Getgovernorate',
            'Getdistrict',
            'GetpropertyType'
        ])->select(
            'id',
            'province_id',
            'plot_id',
            'property_number',
            'area_in_meters',
            'area_in_olok',
            'area_in_donum',
            'count',
            'date',
            'volume_number',
            'propertycategory_id',
            'ownership',
            'property_type',
            'governorate',
            'district',
            'mortgage_notes',
            'registered_office',
            'specialized_department',
            'notes'
        );

        if ($this->selectedIds) {
            $query->whereIn('id', $this->selectedIds);
        }

        return $query->get()->map(function ($realitie, $index) {
            // تحويل التاريخ إلى الشهر والسنة باللغة العربية
            $formattedDate = '';
            if ($realitie->date) {
                $date = \Carbon\Carbon::parse($realitie->date);
                $month = $this->getArabicMonthName((int)$date->format('n')); // الحصول على اسم الشهر بالعربي
                $year = $date->format('Y'); // الحصول على السنة
                $formattedDate = "{$month} {$year}";
            }

            return [
                'التسلسل' => $index + 1, // إضافة حقل التسلسل
                'رقم المقاطعة' => $realitie->GetProvinces ? $realitie->GetProvinces->province_number : 'غير محدد',
                'اسم المقاطعة' => $realitie->GetProvinces ? $realitie->GetProvinces->province_name : 'غير محدد',
                'رقم القطعة' => $realitie->GetPlots ? $realitie->GetPlots->plot_number : 'غير محدد',
                'رقم السند العقاري' => $realitie->property_number,
                'المساحة بالمتر' => $realitie->area_in_meters,
                'المساحة بالأولك' => $realitie->area_in_olok,
                'المساحة بالدونم' => $realitie->area_in_donum,
                'العدد' => $realitie->count,
                'التاريخ' => $formattedDate,
                'الجلد' => $realitie->volume_number,
                'نوع العقار' => $realitie->Getpropertycategor ? $realitie->Getpropertycategor->category : 'غير محدد',
                'العائدية' => $realitie->ownership,
                'جنس العقار' => $realitie->GetpropertyType ? $realitie->GetpropertyType->type_name : 'غير محدد',
                'المحافظة' => $realitie->Getgovernorate ? $realitie->Getgovernorate->governorate_name : 'غير محدد',
                'القضاء' => $realitie->Getdistrict ? $realitie->Getdistrict->district_name : 'غير محدد',
                'إشارات التأمينات' => $realitie->mortgage_notes,
                'الدائرة المسجل لديها' => $realitie->registered_office,
                'الشعبة المختصة' => $realitie->Getbranc ? $realitie->Getbranc->branch_name : 'غير محدد',
                'ملاحظات' => $realitie->notes ?? 'لا توجد ملاحظات', // استبدال القيم الفارغة
            ];
        });
    }

    // تحويل التاريخ من الرقم إلى الاسم باللغة العربية
    protected function getArabicMonthName($month)
    {
        $arabicMonths = [
            1 => 'كانون الثاني',
            2 => 'شباط',
            3 => 'اذار',
            4 => 'نيسان',
            5 => 'ايار',
            6 => 'حزيران',
            7 => 'تموز',
            8 => 'اب',
            9 => 'ايلول',
            10 => 'تشرين الاول',
            11 => 'تشرين الثاني',
            12 => 'كانون الاول',
        ];

        return $arabicMonths[$month] ?? '';
    }

    public function headings(): array
    {
        return [
            'التسلسل',
            'رقم المقاطعة',
            'اسم المقاطعة',
            'رقم القطعة',
            'رقم السند العقاري',
            'المساحة بالمتر',
            'المساحة بالأولك',
            'المساحة بالدونم',
            'العدد',
            'التاريخ',
            'الجلد',
            'نوع العقار',
            'العائدية',
            'جنس العقار',
            'المحافظة',
            'القضاء',
            'إشارات التأمينات',
            'الدائرة المسجل لديها',
            'الشعبة المختصة',
            'ملاحظات',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setRightToLeft(true);
        $sheet->getStyle('A1:T1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '205295'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        $lastRow = $sheet->getHighestRow();
        for ($row = 2; $row <= $lastRow; $row++) {
            $fillColor = ($row % 2 === 0) ? 'F8FAFC' : 'D9EAFD';
            $sheet->getStyle("A{$row}:T{$row}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => $fillColor],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
            ]);
        }
    }
}
