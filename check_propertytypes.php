<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "Checking PropertyTypes data...\n";
    
    // Check if table exists and has data
    $count = App\Models\Propertytypes\Propertytypes::count();
    echo "Property Types Count: " . $count . "\n";
    
    if ($count > 0) {
        echo "Sample data:\n";
        $data = App\Models\Propertytypes\Propertytypes::select('id', 'type_name')->take(5)->get();
        foreach ($data as $item) {
            echo "ID: " . $item->id . " - Name: " . $item->type_name . "\n";
        }
    } else {
        echo "No data found in propertytypes table.\n";
        
        // Let's try to create some sample data
        echo "Creating sample data...\n";
        App\Models\Propertytypes\Propertytypes::create(['type_name' => 'سكني']);
        App\Models\Propertytypes\Propertytypes::create(['type_name' => 'تجاري']);
        App\Models\Propertytypes\Propertytypes::create(['type_name' => 'صناعي']);
        App\Models\Propertytypes\Propertytypes::create(['type_name' => 'زراعي']);
        
        echo "Sample data created successfully!\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}