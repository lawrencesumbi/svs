<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\Student;
use App\Models\ViolationSeverity;
use App\Models\ViolationStatus;

class ViolationController extends Controller
{
    // Get all violations
    public function getViolations()
    {
        $violations = Violation::with(['student', 'violationSeverity', 'violationStatus'])->get();

        return response()->json(['violations' => $violations]);
    }

    // Add a new violation
    public function addViolation(Request $request)
    {
        // Validate the request data
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'violation_name' => ['required', 'string', 'max:255'],
            'violation_description' => ['required', 'string'],
            'violation_severity_id' => ['required', 'exists:violation_severities,id'],
            'violation_sanction' => ['required', 'string', 'max:255'],
            'violation_status_id' => ['required', 'exists:violation_statuses,id'],
        ]);

        // Create a new violation
        $violation = Violation::create([
            'student_id' => $request->student_id,
            'violation_name' => $request->violation_name,
            'violation_description' => $request->violation_description,
            'violation_severity_id' => $request->violation_severity_id,
            'violation_sanction' => $request->violation_sanction,
            'violation_status_id' => $request->violation_status_id,
        ]);

        return response()->json(['message' => 'Violation successfully added!', 'violation' => $violation]);
    }

    // Edit an existing violation
    public function editViolation(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'violation_name' => ['required', 'string', 'max:255'],
            'violation_description' => ['required', 'string'],
            'violation_severity_id' => ['required', 'exists:violation_severities,id'],
            'violation_sanction' => ['required', 'string', 'max:255'],
            'violation_status_id' => ['required', 'exists:violation_statuses,id'],
        ]);

        // Find the violation by ID
        $violation = Violation::find($id);

        if (!$violation) {
            return response()->json(['message' => 'Violation not found!'], 404);
        }

        // Update the violation
        $violation->update([
            'student_id' => $request->student_id,
            'violation_name' => $request->violation_name,
            'violation_description' => $request->violation_description,
            'violation_severity_id' => $request->violation_severity_id,
            'violation_sanction' => $request->violation_sanction,
            'violation_status_id' => $request->violation_status_id,
        ]);

        return response()->json(['message' => 'Violation successfully updated!', 'violation' => $violation]);
    }

    // Delete a violation
    public function deleteViolation($id)
    {
        $violation = Violation::find($id);

        if (!$violation) {
            return response()->json(['message' => 'Violation not found!'], 404);
        }

        // Delete the violation
        $violation->delete();

        return response()->json(['message' => 'Violation successfully deleted!']);
    }
}
