<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    // Get and show all listings
    public function index()
    {
        // request()
        // 2 ways
        //first one
        // dd(request());
        // dd(request()->tag);
        //second way
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4),
            // 'listings' => Listing::latest()->filter(request(['tag','search']))->simplepaginate(4),

        ]);
    }
    // Show listings
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    // create form view
    public function create()
    {
        return view('listings.create');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'author' => 'required',
    //         'stock' => 'required'
    //     ]);

    // store listing data
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('logo'));

        $formFilds = $request->validate([
            'title' => 'required',
            // if you want to add more then one
            'company' => ['required', Rule::unique('listings', 'company')],
            //'listing' = our DB table that we are using
            //follow by 'company' - the field we are using
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFilds['logo'] = $request->file('logo')->store('logos', 'public');
        }
        // now if one of those fildes faild, it will show an error
        // if good completed we will redirect it to the home page
        Listing::create($formFilds);
        return redirect('/')->with('message', 'Listing created Successfuly');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }
    // update Listing Date
    public function update(Request $request, Listing $listing)
    {


        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
} // end of the class
