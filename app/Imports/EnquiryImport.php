<?php

namespace App\Imports;

use App\Models\EnquiryStatus;
use App\Models\Remark;
use App\Models\UserEnquiry;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class EnquiryImport implements ToModel
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Skip empty rows
        if (empty($row[3])) {
            return null;
        }

        // Check if email already exists
        $existingEnquiry = UserEnquiry::where('email', $row[3])->first();
        if ($existingEnquiry) {
            return null;
        }

        // Create enquiry
        $enquiry = UserEnquiry::create([
            'type' => $row[1] ?? null,
            'name' => $row[2] ?? null,
            'email' => $row[3] ?? null,
            'mobile' => $row[4] ?? null,
            'gender' => $row[5] ?? null,
            'education' => $row[6] ?? null,
            'expertise' => $row[7] ?? null,
            'status_id' => $this->getStatusId(trim($row[8] ?? '')),
            'source' => "internal",
            'lead_source' => $row[10] ?? null,
            'created_by' => Auth::id(),
        ]);

        // Save remark if exists
        if (!empty($row[9])) {
            Remark::create([
                "remark" => $row[9],
                'user_id' => Auth::id(),
                'enquiry_id' => $enquiry->id
            ]);
        }

        return $enquiry;
    }

    private function getStatusId($status)
    {
        $followupRemarkModel = EnquiryStatus::where('name', $status)->first();
        return $followupRemarkModel ? $followupRemarkModel->id : 0;
    }
}
