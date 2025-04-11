<?php

namespace App\Imports;

use App\Models\Employees\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EmployeesImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, WithBatchInserts, WithChunkReading
{
    use Importable, SkipsErrors;

    private $rowCount = 0;

    /**
     * Column mapping for Arabic and English column names
     *
     * @var array
     */
    private $columnMapping = [
        // English => Database field
        'computer_number' => 'computer_number',
        'job_number' => 'job_number',
        'full_name' => 'full_name',
        'mother_name' => 'mother_name',
        'education' => 'education',
        'specialization' => 'specialization',
        'job_title' => 'job_title',
        'job_grade' => 'job_grade',
        'job_type' => 'job_type',
        'last_promotion_date' => 'last_promotion_date',
        'job_title_change_order_number' => 'job_title_change_order_number',
        'job_title_change_order_date' => 'job_title_change_order_date',
        'nominal_salary' => 'nominal_salary',
        'last_allowance_date' => 'last_allowance_date',
        'allowance_order_number' => 'allowance_order_number',
        'allowance_order_date' => 'allowance_order_date',
        'service_continuity' => 'service_continuity',
        'service_continuity_stop_date' => 'service_continuity_stop_date',
        'service_continuity_stop_order_number' => 'service_continuity_stop_order_number',
        'service_continuity_stop_order_date' => 'service_continuity_stop_order_date',
        'department' => 'department',
        'division' => 'division',
        'service_days' => 'service_days',
        'service_months' => 'service_months',
        'service_years' => 'service_years',
        'position_status' => 'position_status',
        'position' => 'position',
        'position_assignment_order_number' => 'position_assignment_order_number',
        'position_assignment_order_date' => 'position_assignment_order_date',
        'position_start_date' => 'position_start_date',
        'employment_status' => 'employment_status',
        'appointment_letter_number' => 'appointment_letter_number',
        'appointment_date' => 'appointment_date',
        'commencement_letter_number' => 'commencement_letter_number',
        'commencement_letter_date' => 'commencement_letter_date',
        'actual_commencement_date' => 'actual_commencement_date',
        'additional_service_type' => 'additional_service_type',
        'additional_service_order_number' => 'additional_service_order_number',
        'additional_service_order_date' => 'additional_service_order_date',
        'additional_service_days' => 'additional_service_days',
        'additional_service_months' => 'additional_service_months',
        'additional_service_years' => 'additional_service_years',
        'transferred_to_ministry' => 'transferred_to_ministry',
        'transferred_from' => 'transferred_from',
        'transfer_order_number' => 'transfer_order_number',
        'transfer_order_date' => 'transfer_order_date',
        'transfer_commencement_order_number' => 'transfer_commencement_order_number',
        'transfer_commencement_order_date' => 'transfer_commencement_order_date',
        'transfer_commencement_date' => 'transfer_commencement_date',
        'gender' => 'gender',
        'marital_status' => 'marital_status',
        'children_count' => 'children_count',
        'spouse_name' => 'spouse_name',
        'spouse_job' => 'spouse_job',
        'spouse_workplace' => 'spouse_workplace',
        'phone_number' => 'phone_number',
        'address' => 'address',
        'birth_date' => 'birth_date',
        'birth_place' => 'birth_place',
        'blood_type' => 'blood_type',
        'nationality' => 'nationality',
        'religion' => 'religion',
        'housing_card_number' => 'housing_card_number',
        'office_name' => 'office_name',
        'organization_date' => 'organization_date',
        'ration_card_number' => 'ration_card_number',
        'ration_center_name' => 'ration_center_name',
        'ration_center_number' => 'ration_center_number',
        'national_id_number' => 'national_id_number',
        'national_id_date' => 'national_id_date',

        // Arabic => Database field (with spaces)
        'رقم الحاسبة' => 'computer_number',
        'الرقم الوظيفي' => 'job_number',
        'الاسم الكامل' => 'full_name',
        'اسم الام' => 'mother_name',
        'التحصيل الدراسي' => 'education',
        'الاختصاص' => 'specialization',
        'العنوان الوظيفي' => 'job_title',
        'الدرجة الوظيفية' => 'job_grade',
        'نوع الوظيفة' => 'job_type',
        'تاريخ اخر ترفيع' => 'last_promotion_date',
        'رقم امر تغيير العنوان' => 'job_title_change_order_number',
        'تاريخ امر تغيير العنوان' => 'job_title_change_order_date',
        'الراتب الاسمي' => 'nominal_salary',
        'تاريخ اخر علاوة' => 'last_allowance_date',
        'رقم امر العلاوة' => 'allowance_order_number',
        'تاريخ امر العلاوة' => 'allowance_order_date',
        'استمرارية الخدمة' => 'service_continuity',
        'تاريخ انقطاع الخدمة' => 'service_continuity_stop_date',
        'رقم امر انقطاع الخدمة' => 'service_continuity_stop_order_number',

        // Arabic => Database field (with underscores)
        'رقم_الحاسبة' => 'computer_number',
        'الرقم_الوظيفي' => 'job_number',
        'الاسم_الكامل' => 'full_name',
        'اسم_الام' => 'mother_name',
        'التحصيل_الدراسي' => 'education',
        'الاختصاص' => 'specialization',
        'العنوان_الوظيفي' => 'job_title',
        'الدرجة_الوظيفية' => 'job_grade',
        'نوع_الوظيفة' => 'job_type',
        'تاريخ_اخر_ترفيع' => 'last_promotion_date',
        'رقم_امر_تغيير_العنوان' => 'job_title_change_order_number',
        'تاريخ_امر_تغيير_العنوان' => 'job_title_change_order_date',
        'الراتب_الاسمي' => 'nominal_salary',
        'تاريخ_اخر_علاوة' => 'last_allowance_date',
        'رقم_امر_العلاوة' => 'allowance_order_number',
        'تاريخ_امر_العلاوة' => 'allowance_order_date',
        'استمرارية_الخدمة' => 'service_continuity',
        'تاريخ_انقطاع_الخدمة' => 'service_continuity_stop_date',
        'رقم_امر_انقطاع_الخدمة' => 'service_continuity_stop_order_number',
        'تاريخ_امر_انقطاع_الخدمة' => 'service_continuity_stop_order_date',
        'القسم' => 'department',
        'الشعبة' => 'division',
        'ايام_الخدمة' => 'service_days',
        'اشهر_الخدمة' => 'service_months',
        'سنوات_الخدمة' => 'service_years',
        'حالة_المنصب' => 'position_status',
        'المنصب' => 'position',
        'رقم_امر_تكليف_المنصب' => 'position_assignment_order_number',
        'تاريخ_امر_تكليف_المنصب' => 'position_assignment_order_date',
        'تاريخ_بدء_المنصب' => 'position_start_date',
        'حالة_التوظيف' => 'employment_status',
        'رقم_كتاب_التعيين' => 'appointment_letter_number',
        'تاريخ_التعيين' => 'appointment_date',
        'رقم_كتاب_المباشرة' => 'commencement_letter_number',
        'تاريخ_كتاب_المباشرة' => 'commencement_letter_date',
        'تاريخ_المباشرة_الفعلي' => 'actual_commencement_date',
        'نوع_الخدمة_الاضافية' => 'additional_service_type',
        'رقم_امر_الخدمة_الاضافية' => 'additional_service_order_number',
        'تاريخ_امر_الخدمة_الاضافية' => 'additional_service_order_date',
        'ايام_الخدمة_الاضافية' => 'additional_service_days',
        'اشهر_الخدمة_الاضافية' => 'additional_service_months',
        'سنوات_الخدمة_الاضافية' => 'additional_service_years',
        'منقول_الى_الوزارة' => 'transferred_to_ministry',
        'منقول_من' => 'transferred_from',
        'رقم_امر_النقل' => 'transfer_order_number',
        'تاريخ_امر_النقل' => 'transfer_order_date',
        'رقم_امر_مباشرة_النقل' => 'transfer_commencement_order_number',
        'تاريخ_امر_مباشرة_النقل' => 'transfer_commencement_order_date',
        'تاريخ_مباشرة_النقل' => 'transfer_commencement_date',
        'الجنس' => 'gender',
        'الحالة_الاجتماعية' => 'marital_status',
        'عدد_الاطفال' => 'children_count',
        'اسم_الزوج_او_الزوجة' => 'spouse_name',
        'وظيفة_الزوج_او_الزوجة' => 'spouse_job',
        'مكان_عمل_الزوج_او_الزوجة' => 'spouse_workplace',
        'رقم_الهاتف' => 'phone_number',
        'العنوان' => 'address',
        'تاريخ_الميلاد' => 'birth_date',
        'محل_الولادة' => 'birth_place',
        'فصيلة_الدم' => 'blood_type',
        'الجنسية' => 'nationality',
        'الديانة' => 'religion',
        'رقم_البطاقة_السكنية' => 'housing_card_number',
        'اسم_المكتب' => 'office_name',
        'تاريخ_التنظيم' => 'organization_date',
        'رقم_البطاقة_التموينية' => 'ration_card_number',
        'اسم_مركز_التموين' => 'ration_center_name',
        'رقم_مركز_التموين' => 'ration_center_number',
        'رقم_الهوية_الوطنية' => 'national_id_number',
        'تاريخ_الهوية_الوطنية' => 'national_id_date',
    ];

    /**
     * Get the database field name from the column name
     *
     * @param string $columnName
     * @return string|null
     */
    private function getFieldName($columnName)
    {
        // First check if the column name exists directly in the mapping
        if (isset($this->columnMapping[$columnName])) {
            return $this->columnMapping[$columnName];
        }

        // Normalize column name by removing spaces and converting to lowercase
        $normalizedName = Str::slug(Str::lower($columnName), '_');

        // Check if the normalized name exists in our mapping
        if (isset($this->columnMapping[$normalizedName])) {
            return $this->columnMapping[$normalizedName];
        }

        // Try with spaces replaced by underscores (for Arabic column names)
        $underscoreName = str_replace(' ', '_', $columnName);
        if (isset($this->columnMapping[$underscoreName])) {
            return $this->columnMapping[$underscoreName];
        }

        // If not found, return the original column name
        return $columnName;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            if (!is_array($row)) {
                throw new \Exception('البيانات المستوردة غير صالحة: يجب أن تكون مصفوفة');
            }

            $this->rowCount++;

            // Transform date fields
            $dateFields = [
                // Handle date fields and allow null values
                function($value) {
                    if ($value === null || $value === '' || $value === '----' || $value === '0000-00-00') {
                        return null;
                    }
                    try {
                        return Carbon::parse($value)->format('Y-m-d');
                    } catch (\Exception $e) {
                        return null;
                    }
                },
                'last_promotion_date',
                'job_title_change_order_date',
                'last_allowance_date',
                'allowance_order_date',
                'service_continuity_stop_date',
                'service_continuity_stop_order_date',
                'position_assignment_order_date',
                'position_start_date',
                'appointment_date',
                'commencement_letter_date',
                'actual_commencement_date',
                'additional_service_order_date',
                'transfer_order_date',
                'transfer_commencement_order_date',
                'transfer_commencement_date',
                'birth_date',
                'organization_date',
                'national_id_date',
                'organization_date',
                'national_id_date',
            ];

            // $this->rowCount++;
            $data = [];

            // Map of field names to their corresponding database fields
            $fieldMap = [
                'computer_number' => 'computer_number',
                'job_number' => 'job_number',
                'full_name' => 'full_name',
                'mother_name' => 'mother_name',
                'education' => 'education',
                'specialization' => 'specialization',
                'job_title' => 'job_title',
                'job_grade' => 'job_grade',
                'job_type' => 'job_type',
                'last_promotion_date' => 'last_promotion_date',
                'job_title_change_order_number' => 'job_title_change_order_number',
                'job_title_change_order_date' => 'job_title_change_order_date',
                'nominal_salary' => 'nominal_salary',
                'last_allowance_date' => 'last_allowance_date',
                'allowance_order_number' => 'allowance_order_number',
                'allowance_order_date' => 'allowance_order_date',
                'service_continuity' => 'service_continuity',
                'service_continuity_stop_date' => 'service_continuity_stop_date',
                'service_continuity_stop_order_number' => 'service_continuity_stop_order_number',
                'service_continuity_stop_order_date' => 'service_continuity_stop_order_date',
                'department' => 'department',
                'division' => 'division',
                'service_days' => 'service_days',
                'service_months' => 'service_months',
                'service_years' => 'service_years',
                'position_status' => 'position_status',
                'position' => 'position',
                'position_assignment_order_number' => 'position_assignment_order_number',
                'position_assignment_order_date' => 'position_assignment_order_date',
                'position_start_date' => 'position_start_date',
                'employment_status' => 'employment_status',
                'appointment_letter_number' => 'appointment_letter_number',
                'appointment_date' => 'appointment_date',
                'commencement_letter_number' => 'commencement_letter_number',
                'commencement_letter_date' => 'commencement_letter_date',
                'actual_commencement_date' => 'actual_commencement_date',
                'additional_service_type' => 'additional_service_type',
                'additional_service_order_number' => 'additional_service_order_number',
                'additional_service_order_date' => 'additional_service_order_date',
                'additional_service_days' => 'additional_service_days',
                'additional_service_months' => 'additional_service_months',
                'additional_service_years' => 'additional_service_years',
                'transferred_to_ministry' => 'transferred_to_ministry',
                'transferred_from' => 'transferred_from',
                'transfer_order_number' => 'transfer_order_number',
                'transfer_order_date' => 'transfer_order_date',
                'transfer_commencement_order_number' => 'transfer_commencement_order_number',
                'transfer_commencement_order_date' => 'transfer_commencement_order_date',
                'transfer_commencement_date' => 'transfer_commencement_date',
                'gender' => 'gender',
                'marital_status' => 'marital_status',
                'children_count' => 'children_count',
                'spouse_name' => 'spouse_name',
                'spouse_job' => 'spouse_job',
                'spouse_workplace' => 'spouse_workplace',
                'phone_number' => 'phone_number',
                'address' => 'address',
                'birth_date' => 'birth_date',
                'birth_place' => 'birth_place',
                'blood_type' => 'blood_type',
                'nationality' => 'nationality',
                'religion' => 'religion',
                'housing_card_number' => 'housing_card_number',
                'office_name' => 'office_name',
                'organization_date' => 'organization_date',
                'ration_card_number' => 'ration_card_number',
                'ration_center_name' => 'ration_center_name',
                'ration_center_number' => 'ration_center_number',
                'national_id_number' => 'national_id_number',
                'national_id_date' => 'national_id_date',
            ];

            // Default values for numeric fields
            $numericDefaults = [
                'nominal_salary' => 0,
                'service_days' => 0,
                'service_months' => 0,
                'service_years' => 0,
                'additional_service_days' => 0,
                'additional_service_months' => 0,
                'additional_service_years' => 0,
                'children_count' => 0,
            ];

            // Default values for boolean fields
            $booleanDefaults = [
                'service_continuity' => true,
                'transferred_to_ministry' => false,
            ];

            // Values that should be considered as true for boolean fields
            $trueValues = ['yes', 'نعم', '1', 'true', 'صح', 'y', 'ي', 'صحيح', 'مستمر'];

            // Process each field in the database
            foreach ($fieldMap as $dbField) {
                $value = null;

                // Try to find the field in the row using both English and Arabic column names
                foreach ($row as $columnName => $columnValue) {
                    $normalizedColumnName = Str::slug(Str::lower($columnName), '_');
                    $mappedField = $this->getFieldName($normalizedColumnName);

                    if ($mappedField === $dbField) {
                        $value = $columnValue;
                        break;
                    }
                }

                // Apply transformations for date fields
                if (strpos($dbField, '_date') !== false) {
                    // Special handling for organization_date
                    if ($dbField === 'organization_date' && empty($value)) {
                        $data[$dbField] = now();
                    } else {
                        $data[$dbField] = $this->transformDate($value);
                    }
                }
                // Apply default values for numeric fields
                elseif (isset($numericDefaults[$dbField])) {
                    $data[$dbField] = $value !== null ? (is_numeric($value) ? $value : 0) : $numericDefaults[$dbField];
                }
                // Apply default values for boolean fields
                elseif (isset($booleanDefaults[$dbField])) {
                    $data[$dbField] = $value !== null ? (bool)$value : $booleanDefaults[$dbField];
                }
                // For integer fields that must be integers
                elseif (in_array($dbField, [
                    'computer_number',
                    'job_number',
                    'service_days',
                    'service_months',
                    'service_years',
                    'additional_service_days',
                    'additional_service_months',
                    'additional_service_years',
                    'children_count'
                ])) {
                    // Clean the value from any non-numeric characters
                    if ($value !== null) {
                        // Remove any non-numeric characters except decimal point
                        $cleanValue = preg_replace('/[^0-9.]/', '', (string)$value);
                        // Convert to integer
                        $data[$dbField] = $cleanValue !== '' ? (int)$cleanValue : 0;
                    } else {
                        $data[$dbField] = 0;
                    }
                }
                // For decimal fields
                elseif ($dbField === 'nominal_salary') {
                    $data[$dbField] = $value !== null ? (float)$value : 0;
                }
                // For boolean fields
                elseif (in_array($dbField, [
                    'service_continuity',
                    'transferred_to_ministry'
                ])) {
                    $data[$dbField] = $value !== null ? (bool)$value : false;
                }
                // For string fields that must be strings
                elseif (in_array($dbField, [
                    'full_name',
                    'mother_name',
                    'education',
                    'specialization',
                    'job_title',
                    'job_grade',
                    'job_type',
                    'job_title_change_order_number',
                    'allowance_order_number',
                    'service_continuity_stop_order_number',
                    'department',
                    'division',
                    'position_status',
                    'position',
                    'position_assignment_order_number',
                    'employment_status',
                    'appointment_letter_number',
                    'commencement_letter_number',
                    'additional_service_type',
                    'additional_service_order_number',
                    'transferred_from',
                    'transfer_order_number',
                    'transfer_commencement_order_number',
                    'gender',
                    'marital_status',
                    'spouse_name',
                    'spouse_job',
                    'spouse_workplace',
                    'phone_number',
                    'address',
                    'birth_place',
                    'blood_type',
                    'nationality',
                    'religion',
                    'housing_card_number',
                    'office_name',
                    'ration_card_number',
                    'ration_center_name',
                    'ration_center_number',
                    'national_id_number'
                ])) {
                    // Special handling for full_name field which is required
                    if ($dbField === 'full_name') {
                        // If full_name is empty or null, try to find it in other columns
                        if (empty($value)) {
                            // Try to find a column that might contain the full name
                            foreach ($row as $colName => $colValue) {
                                if (stripos($colName, 'name') !== false || stripos($colName, 'اسم') !== false) {
                                    if (!empty($colValue) && $colValue !== $value) {
                                        $value = $colValue;
                                        break;
                                    }
                                }
                            }
                        }
                        // Ensure full_name is never empty
                        $data[$dbField] = !empty($value) ? (string)$value : 'بدون اسم';
                    } else {
                        $data[$dbField] = $value !== null ? (string)$value : '';
                    }
                }
                // For all other fields - convert to string by default to avoid validation errors
                else {
                    $data[$dbField] = $value !== null ? (string)$value : null;
                }
            }

            $employee = new \App\Models\Employees\Employee($data);
            $employee->save();
            return $employee;
        } catch (\Exception $e) {
            \Log::error('Error importing employee row ' . $this->rowCount . ': ' . $e->getMessage());
            \Log::error('Row data: ' . json_encode($row));
            throw $e;
        }
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        // We need to validate both Arabic and English column names
        // Using 'nullable' instead of 'numeric' for more flexibility with Excel imports
        return [
            // English column names
            'computer_number' => 'nullable',
            'job_number' => 'nullable',
            'full_name' => 'nullable|string', // Changed from required to nullable
            'service_days' => 'nullable',
            'service_months' => 'nullable',
            'service_years' => 'nullable',
            'additional_service_days' => 'nullable',
            'additional_service_months' => 'nullable',
            'additional_service_years' => 'nullable',
            'children_count' => 'nullable',
            'nominal_salary' => 'nullable',

            // Arabic column names with spaces
            'رقم الحاسبة' => 'nullable',
            'الرقم الوظيفي' => 'nullable',
            'الاسم الكامل' => 'nullable|string', // Changed from required to nullable
            'ايام الخدمة' => 'nullable',
            'اشهر الخدمة' => 'nullable',
            'سنوات الخدمة' => 'nullable',
            'ايام الخدمة الاضافية' => 'nullable',
            'اشهر الخدمة الاضافية' => 'nullable',
            'سنوات الخدمة الاضافية' => 'nullable',
            'عدد الاطفال' => 'nullable',
            'الراتب الاسمي' => 'nullable',

            // Arabic column names with underscores
            'رقم_الحاسبة' => 'nullable',
            'الرقم_الوظيفي' => 'nullable',
            'الاسم_الكامل' => 'nullable|string', // Changed from required to nullable
            'ايام_الخدمة' => 'nullable',
            'اشهر_الخدمة' => 'nullable',
            'سنوات_الخدمة' => 'nullable',
            'ايام_الخدمة_الاضافية' => 'nullable',
            'اشهر_الخدمة_الاضافية' => 'nullable',
            'سنوات_الخدمة_الاضافية' => 'nullable',
            'عدد_الاطفال' => 'nullable',
            'الراتب_الاسمي' => 'nullable',
        ];
    }

    /**
     * Custom validation messages
     *
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            // English messages
            'computer_number.numeric' => 'Computer number must be a number',
            'job_number.numeric' => 'Job number must be a number',
            'full_name.required' => 'Full name is required',
            'service_days.numeric' => 'Service days must be a number',
            'service_months.numeric' => 'Service months must be a number',
            'service_years.numeric' => 'Service years must be a number',
            'additional_service_days.numeric' => 'Additional service days must be a number',
            'additional_service_months.numeric' => 'Additional service months must be a number',
            'additional_service_years.numeric' => 'Additional service years must be a number',
            'children_count.numeric' => 'Children count must be a number',
            'nominal_salary.numeric' => 'Nominal salary must be a number',

            // Arabic messages
            'رقم_الحاسبة.numeric' => 'يجب أن يكون رقم الحاسبة رقمًا',
            'الرقم_الوظيفي.numeric' => 'يجب أن يكون الرقم الوظيفي رقمًا',
            'الاسم_الكامل.required' => 'الاسم الكامل مطلوب',
            'ايام_الخدمة.numeric' => 'يجب أن تكون أيام الخدمة رقمًا',
            'اشهر_الخدمة.numeric' => 'يجب أن تكون أشهر الخدمة رقمًا',
            'سنوات_الخدمة.numeric' => 'يجب أن تكون سنوات الخدمة رقمًا',
            'ايام_الخدمة_الاضافية.numeric' => 'يجب أن تكون أيام الخدمة الإضافية رقمًا',
            'اشهر_الخدمة_الاضافية.numeric' => 'يجب أن تكون أشهر الخدمة الإضافية رقمًا',
            'سنوات_الخدمة_الاضافية.numeric' => 'يجب أن تكون سنوات الخدمة الإضافية رقمًا',
            'عدد_الاطفال.numeric' => 'يجب أن يكون عدد الأطفال رقمًا',
            'الراتب_الاسمي.numeric' => 'يجب أن يكون الراتب الاسمي رقمًا',
        ];
    }

    /**
     * @return int
     */
    public function batchSize(): int
    {
        return 1000;
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 1000;
    }

    /**
     * Transform a date value into a Carbon object.
     *
     * @param mixed $value
     * @return \Carbon\Carbon|null
     */
    private function transformDate($value)
    {
        // Handle special values that should be treated as null
        if ($value === '?' || $value === '----' || $value === '---' || $value === '--' || $value === '-') {
            return null;
        }

        if (empty($value)) {
            // Set default date for organization_date field
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
            if (
                isset($trace[1]['function']) && $trace[1]['function'] === 'model' &&
                isset($trace[1]['args']) &&
                is_array($trace[1]['args']) &&
                isset($trace[1]['args'][0])
            ) {
                // If we're processing organization_date field, return current date
                $dbField = array_search('organization_date', array_column($trace[1]['args'][0], 'dbField'));
                if ($dbField !== false) {
                    return now();
                }
            }
            return null;
        }

        // If value is already a Carbon instance, return it
        if ($value instanceof Carbon) {
            return $value;
        }

        // Clean the value if it's a string
        if (is_string($value)) {
            // Remove any non-standard characters that might cause parsing issues
            $value = trim($value);

            // Return null for obviously invalid dates
            if ($value == '' || $value == '-' || $value == '0000-00-00' || $value == '0000-00-00 00:00:00' || strpos($value, '-0001') !== false) {
                return null;
            }
        }

        // Try to parse as Excel date
        try {
            if (is_numeric($value)) {
                // Check if the numeric value is within a reasonable range
                if ($value > 0 && $value < 2958466) { // Excel's date range (1900-01-01 to 9999-12-31)
                    return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((float)$value));
                }
                return null;
            }
        } catch (\Exception $e) {
            // Continue to other formats if Excel date parsing fails
        }

        // Try common date formats including Arabic/Middle Eastern formats
        $formats = [
            'Y-m-d',
            'd/m/Y',
            'm/d/Y',
            'd-m-Y',
            'Y/m/d',
            'd.m.Y',
            'Y/n/j',
            'j/n/Y',
            'j-n-Y',
            'Y-n-j',  // Formats without leading zeros
            'Y/m/d H:i:s',
            'd/m/Y H:i:s',
            'Y-m-d H:i:s', // With time
            // Additional Arabic/Middle Eastern formats
            'j F Y',     // Day Month Year in Arabic
            'F j, Y',    // Month Day, Year in Arabic
            'j M Y',     // Day Month Year abbreviated
            'Y F j',     // Year Month Day in Arabic
            'Y/m/d',     // Hijri date format
            'j/n/Y',     // Day/Month/Year without leading zeros
            'd-m-Y H:i'  // Day-Month-Year with time
        ];

        // Clean and validate the value before processing
        if (is_string($value)) {
            $value = trim(preg_replace('/[\x{0600}-\x{06FF}]/u', '', $value)); // Remove Arabic characters
            $value = preg_replace('/[^0-9\/\-.: ]/', '', $value); // Keep only valid date characters

            // Return null for empty or invalid values after cleaning
            if (empty($value) || $value == '-' || $value == '.' || strlen($value) < 6 || $value == '?' || strpos($value, '----') !== false) {
                return null;
            }
        }

        foreach ($formats as $format) {
            try {
                $date = Carbon::createFromFormat($format, $value);
                // Validate the year is within a reasonable range
                if ($date->year > 1900 && $date->year < 2100) {
                    return $date;
                }
                return null;
            } catch (\Exception $e) {
                // Try next format
            }
        }

        // If all parsing attempts fail, return null
        return null;
        try {
            $timestamp = strtotime($value);
            if ($timestamp !== false) {
                return Carbon::createFromTimestamp($timestamp);
            }
        } catch (\Exception $e) {
            // Continue if strtotime fails
        }

        // If all parsing attempts fail, return null
        return null;
    }

    /**
     * Get the row count
     *
     * @return int
     */
    public function getRowCount(): int
    {
        return $this->rowCount;
    }
}
