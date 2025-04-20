<?php
namespace App\Http\Livewire\Dashboard;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Provinces\Provinces;
class DashboardProperty extends Component
{
 public $ProvincesCount, $PlotsCount ,$RealitiesCount , $RealPropertyCount;
    public $chartData = []; // بيانات المخطط البياني

    public function mount()
    {
        $this->ProvincesCount = Provinces::count();
        $this->RealitiesCount = DB::table('realities')->count(); // عدد السندات
        $this->RealPropertyCount = DB::table('buyer_tenant')->count(); // عدد الأملاك
        $this->PlotsCount = DB::table('Plots')->count(); // عدد القطع
        // جلب بيانات المخطط البياني
        $this->chartData = $this->getChartData();
    }

    public function getChartData()
    {
        // جلب عدد الحركات لكل يوم من جدول السندات
        $realitiesData = DB::table('realities')
            ->select(
                DB::raw('DATE(updated_at) as date'),
                DB::raw('count(*) as total')
            )
            ->groupBy(DB::raw('DATE(updated_at)')) // استخدام DATE(updated_at) في GROUP BY
            ->orderBy('date', 'asc')
            ->get();

        // جلب عدد الحركات لكل يوم من جدول الأملاك
        $realPropertyData = DB::table('buyer_tenant')
            ->select(
                DB::raw('DATE(updated_at) as date'),
                DB::raw('count(*) as total')
            )
            ->groupBy(DB::raw('DATE(updated_at)')) // استخدام DATE(updated_at) في GROUP BY
            ->orderBy('date', 'asc')
            ->get();

        // دمج البيانات من الجدولين
        $mergedData = [];
        foreach ($realitiesData as $data) {
            $mergedData[$data->date]['realities'] = $data->total;
        }
        foreach ($realPropertyData as $data) {
            $mergedData[$data->date]['buyer_tenant'] = $data->total;
        }

        // تحويل البيانات إلى الشكل المطلوب
        $chartData = [];
        foreach ($mergedData as $date => $values) {
            $chartData[] = [
                'date' => $date,
                'realities' => $values['realities'] ?? 0,
                'buyer_tenant' => $values['buyer_tenant'] ?? 0,
            ];
        }

        return $chartData;
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-property', [
            'chartData' => $this->chartData,
        ]);
    }


}
