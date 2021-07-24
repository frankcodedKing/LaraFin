<?php

namespace App\Http\Controllers;
use App\Models\Companydetail;
use App\Models\Faq;

use Illuminate\Http\Request;

class adminController extends Controller
{

    // model-wheredataisstored
    // rowid-tabletostore
    // dataArray-datatobestored-colum,value
    public function savedata($mymodel, $rowid, $dataArray)
    {
        $model = $mymodel;
        if ($rowid == null) {
            # code...
            $rowselected = $model::where("id",1)->first();
            if ($rowselected == null) {
                # code...
                $newrow = new $model;
                foreach ($dataArray as $key => $value) {
                    $newrow->$key=$value;
                }
                if ($newrow->save()) {
                    # code...
                    return true;
                                }
                else {
                    return false;
                }
            }
            else {
                # code...
                foreach ($dataArray as $key => $value) {
                    $rowselected->$key=$value;
                }
                if ( $rowselected->save() ) {
                    # code...
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        elseif (gettype($rowid)=="integer") {
            # code...
            $rowselected = $model::where("id",$rowid)->first();
            if ($rowselected == null) {
                # code...
                return false;
            } else {
                # code...
                foreach ($dataArray as $key => $value) {
                    $rowselected->$key=$value;
                }
                if ($rowselected->save()) {
                    # code...
                    return true;
                } else {
                    # code...
                    return false;
                }
            }
        }
        else {
            # code...
            $newentry =  new $model;
            foreach ($dataArray as $key => $value) {
                $newentry->$key=$value;
            }
            if ($newentry->save()) {
                # code...
                return true;
            } else {
                # code...
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



    //
    public function adminindex()
    {
        return view("admin.adminindex");
    }

    public function pages()
    {
        $aboutCompany = Companydetail::where("id", 1)->first();
        $faqs = Faq::all();
        $data = ["companyDetail"=>$aboutCompany, "faqs"=>$faqs];

        return view("admin.pages",$data);
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





    public function savecompanydetails (Request $req){

$companyName =  $req->companyname;
$runningDays =  $req->runningdays;
$companyEmail =  $req->companyemail;
$companyLocation =  $req->companylocation;
$companyContact =  $req->companycontact;

$saveArray = [
    'companyName'=>$companyName,
    'runningDays' =>$runningDays,
    'companyEmail' =>$companyEmail,
     'companyLocation' => $companyLocation,
      'companyPhone'=> $companyContact
    ];

$result = $this->savedata(Companydetail::class, null , $saveArray);

    if ($result) {
        # code...
        return redirect()->route("pages")->with("success", "Update was succesful");
    } else {
        # code...
        return redirect()->route("pages")->with("error", "Failed to update try again!");
    }



    }
}
