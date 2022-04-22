<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Member;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index () 
    {
        return Member::all();
    }

    public function store(Request $request)
    {
        try {
            $member = new Member();
            $member->name = $request->name;
            $member->balance = $request->balance;
            $member->transportation = $request->transportation;

            if($member->save()) {
                return response()->json(['status' => 'success', 'messsage' => 'Member created successfully']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'messsage' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->name = $request->name;
            $member->balance = $request->balance;
            $member->transportation = $request->transportation;

            if($member->save()) {
                return response()->json(['status' => 'success', 'messsage' => 'Member updated successfully']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'messsage' => $e->getMessage()]);
        }
    } 

    public function destroy($id)
    {
        try {
            $member = Member::findOrFail($id);

            if($member->delete()) {
                return response()->json(['status' => 'success', 'messsage' => 'Member deleted successfully']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'messsage' => $e->getMessage()]);
        }
    }
}
