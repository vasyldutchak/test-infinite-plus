<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyId = Company::where('name', 'Infinite')->first()->id;
        $projectId = Project::where('name', 'Laravel')->first()->id;

        Employee::factory()->count(5)->create([
            'company_id' => $companyId,
            'project_id' => $projectId
        ]);

        $projectId = Project::where('name', 'Symfony')->first()->id;

        Employee::factory()->count(5)->create([
            'company_id' => $companyId,
            'project_id' => $projectId
        ]);
    }
}
