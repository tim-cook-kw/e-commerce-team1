<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\User;

class UserDataTableController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [];
        foreach ($users as $index => $list) {
            $row = [];
            $row[] = ++$index;
            $row[] = $list->userProfile->first_name;
            $row[] = $list->userProfile->last_name;
            $row[] = $list->email;
            $row[] = $list->userProfile->address;
            $row[] = $list->userProfile->phone_number;
            $row[] = $list->created_at;
            $row[] = '<div class="text-center"><div class="btn-group">
               <button type="button" onclick="editForm(' . $list->id . ')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
               <button type="button" onclick="deleteData(' . $list->id . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></div>';
            $data[] = $row;
        }

        $output = ['data' => $data];
        return response()->json($output);
    }
}
