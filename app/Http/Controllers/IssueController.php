<?php

namespace App\Http\Controllers;

use App\Issues;
use App\Book;
use App\Member;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issue.index',[
            'issues' => Issues::all(),
            'members' => Member::all(),
            'books' => Book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // relation issues
        return view('issue.create',[
            'members' => Member::all(),
            'books' => Book::all(),
            'issues' => Issues::where('is_booked',0)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'issue_date' => 'required|date',
            'return_date' => 'nullable',
            'due_date' => 'nullable',
            'is_booked' => 'nullable',
        ]);

        $issue = new Issues($validatedData);
        $issue->save();

        return redirect()->route('issues');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Issues $issue)
    {
        // merge all tables
        $issue = Issues::find($issue->id);
        $issue->member;
        $issue->book;
        // return json
        return response()->json($issue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Issues $issue)
    {
        // show issue return json
        $issue = Issues::find($issue->id);
        return response()->json($issue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issues $issue)
    {
        $validatedData = $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'issue_date' => 'required|date',
            'return_date' => 'nullable',
            'due_date' => 'nullable',
            'is_booked' => 'nullable',
        ]);

        $issue->update($validatedData);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $issue = Issues::findOrFail($id);
        $issue->delete();
    }
}
