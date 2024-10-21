<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BoardingHouseController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view boardinghouses', only: ['index']),
            new Middleware('permission:edit boardinghouses', only: ['edit']),
            new Middleware('permission:create boardinghouses', only: ['create']),
            new Middleware('permission:delete boardinghouses', only: ['destroy']),
        ];

    }

    public function index()
    {
        $boardinghouses = BoardingHouse::latest()->paginate(15);
        return view('boardinghouses.list', [
            'boardinghouses' => $boardinghouses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boardinghouses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'address' => 'required|string',
            'gender' => 'required|in:male only,female only,male and female',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:20480',
            'photos.*' => 'nullable|image|mimes:jpg,png,jpeg|max:20480',
        ]);

        if ($validator->passes()) {
            // Collect basic data
            $data = $request->only(['name', 'address', 'gender']);

            // Handle profile picture
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
            }

            // Create the boarding house record
            $boardingHouse = BoardingHouse::create($data);

            // Handle multiple photos
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath = $photo->store('house_photos', 'public');
                    // Create a new entry in the boarding_house_photos table
                    $boardingHouse->photos()->create(['photo_path' => $photoPath]);
                }
            }

            return redirect()->route('boardinghouses.index')->with('success', 'Boarding house added successfully.');
        } else {
            return redirect()->route('boardinghouses.create')->withInput()->withErrors($validator);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $boardinghouse = BoardingHouse::with(['reviews', 'photos', 'extraInfo'])->findOrFail($id);

        return view('boardinghouses.info', [
            'boardinghouse' => $boardinghouse
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
