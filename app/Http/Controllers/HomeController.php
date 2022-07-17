<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Member;
use App\Issues;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        $members = Member::all();
        $issues = Issues::all();

        // select issue group by book_id, books.title, count is_booked = 0 limit 5 covert to json
        $issues_book = DB::table('issues')
            ->select(DB::raw('books.title, count(is_booked) as is_booked'))
            ->join('books', 'issues.book_id', '=', 'books.id')
            ->where('is_booked', 0)
            ->groupBy('book_id', 'books.title')
            ->limit(5)
            ->get();

        // table issue count count member_id group by member_id, members.fisrt_name last_name limit 5 covert to json
        $issues_member = DB::table('issues')
            ->select(DB::raw('count(member_id) as member_id, members.first_name, members.last_name'))
            ->join('members', 'issues.member_id', '=', 'members.id')
            ->groupBy('member_id', 'members.first_name', 'members.last_name')
            ->limit(5)
            ->get();

        // $issues_member = DB::table('issues')
        //     ->select(DB::raw('members.first_name, members.last_name, count(is_booked) as is_booked'))
        //     ->join('members', 'issues.member_id', '=', 'members.id')
        //     ->where('is_booked', 0)
        //     ->groupBy('member_id')
        //     ->limit(5)
        //     ->get();

        return view('dashboard', [
            'books' => $books,
            'members' => $members,
            'issues' => $issues,
            'issue_book' => json_decode($issues_book, true),
            'issue_member' => json_decode($issues_member, true),
        ]);
    }
}
