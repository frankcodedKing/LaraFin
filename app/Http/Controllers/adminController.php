<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function adminindex()
    {
        return view("admin.adminindex");
    }

    public function pages()
    {
        return view("admin.pages");
    }

    public function users()
    {
        return view("admin.users");
    }

    public function pendingdeposits()
    {
        return view("admin.pendingdeposits");
    }

    public function approveddeposits()
    {
        return view("admin.approveddeposits");
    }


    public function withdrawalrequests()
    {
        return view("admin.withdrawalrequests");
    }

    public function runninginvestments()
    {
        return view("admin.runninginvestments");
    }

    public function userrefferals()
    {
        return view("admin.refferals");
    }


    public function viewuser()
    {
        return view("admin.viewuser");
    }


    // model-wheredataisstored
    // rowid-tabletostore
    // dataArray-datatobestored-colum,value
    public function savedata($model, $rowid, $dataArray)
    {
        //selects
        if ($rowid == null) {
            $row = $model::all;
            foreach ($dataArray as $key => $value) {
                $row->$key=$value;
            }
            if ($row->save()) {
                return true;
            } else {
                return false;
            }
            if (gettype($rowid)=="integer") {
                $row=$model::where("id", $rowid)->first();

                if ($row!==null) {
                    foreach ($dataArray as $key=> $value) {
                        $row->$key=$value;
                    }
                    if ($row->save()) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return "row not found";
                }
            } else {
                return false;
            }
        }
    }

    //deletefn
    public function deleteRow()
    {
        $row = $model::where("id", $rowid)->first();
        if ($row == null) {
            return"row to delete not found";
        } else {
            if ($row->delete) {
                return true;
            } else {
                return false;
            }
        }
    }
}
