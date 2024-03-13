<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /*
     * For displaying main page of career module
     */
    public function index()
    {
        $experiences = Experience::select(
            'id',
            'position',
            'organization',
            'description',
            'start_date',
            'end_date',
            'currently_working',
        )
            ->orderBy('sort', 'ASC')
            ->get();

        return view('admin.career.index', compact('experiences'));
    }

    /*
     * For storing education redord
     */
    public function storeExperience(StoreExperienceRequest $request)
    {
        $validatedData = $request->validated();

        if (empty($validatedData['sort'])) {
            $validatedData['sort'] = 1;
        } elseif ($validatedData['sort'] < 1) {
            $validatedData['sort'] = 1;
        }

        Experience::create($validatedData);

        return back()->with('message', 'Experience record added successfully!');
    }

    /*
     * For showing experience redord (AJAX Request)
     * return json response
     */
    public function showExperience(Experience $experience)
    {
        return response()->json($experience);
    }

    /*
     * Update experience record
     */
    public function updateExperience(UpdateExperienceRequest $request, Experience $experience)
    {
        $validatedData = $request->validated();

        if (!$request->has('currently_working')) {
            $validatedData['currently_working'] = 0;
        }

        if ($validatedData['sort'] < 1) {
            $validatedData['sort'] = 1;
        }

        $experience->update($validatedData);

        return back()->with('message', 'Experience record updated successfully!');
    }

    /*
     * Delete experience record
     */
    public function deleteExperience(Experience $experience)
    {
        $experience->delete();

        return back()->with('message', 'Experience record deleted successfully!');
    }

    public function updateSkills(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'skills' => 'nullable|string',
        ]);

        // User skills update
        $skills = json_decode($request->skills);

        if ($validatedData['skills']) {
            $skillsArray = [];

            foreach ($skills as $skill) {
                array_push($skillsArray, $skill->value);
            }
            $skills = join(', ', $skillsArray);

            $validatedData['skills'] = $skills;
        }

        $user->update($validatedData);

        return back()->with('message', 'Skills saved successfully!');
    }
}
