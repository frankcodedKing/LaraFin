<?php

namespace App\Http\Controllers;
use App\Models\Companydetail;
use App\Models\Faq;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Investment;
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
    public function deleteRow($model, $rowid)
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
        $users = User::paginate(15);
        $data =["users"=> $users];
        return view("admin.users", $data);

    }

    public function pendingdeposits()
    {
        $pendingDeposit = Deposit::where("status", 0)->paginate(20);
        $data = ["pendingDeposit" => $pendingDeposit];
        return view("admin.pendingdeposits",$data);
    }

    public function approveddeposits()
    {
        $approvedDeposit = Deposit::where("status", 1)->paginate(20);
        $data = ["approvedDeposit" => $approvedDeposit];

        return view("admin.approveddeposits", $data);
    }


    public function pendingwithdrawals()
    {
        return view("admin.pendingwithdrawals");
    }

    public function approvedwithdrawals()
    {
        return view("admin.approvedwithdrawals");
    }


    public function runninginvestments()
    {
        return view("admin.runninginvestments");
    }

    public function userrefferals()
    {
        return view("admin.refferals");
    }


    public function viewuser(Request $req)
    {
        $userid = $req->id;

        $userDetail = User::where("id", $userid)->first();
        $userWithdrawals= Withdrawal::where("userid", $userid)->get();
        $userInvestments= Investment::where("userid", $userid)->get();
        $userDeposits= Deposit::where("userid", $userid)->get();
        $data =["userDetail"=>$userDetail, "userWithdrawals"=>$userWithdrawals, "userDeposits"=> $userDeposits, "userInvestments"=>$userInvestments];

        return view("admin.viewuser", $data);
    }


    public function viewfaqs()
    {
        return view("admin.faqs");
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
    /** Save company about **/

    public function savecompanyabout (Request $req){
        $aboutTitle = $req->about_title;
        $aboutText = $req->about_text;

        $saveArray = [
            'aboutTitle'=>$aboutTitle,
            'aboutText' =>$aboutText,

            ];


            $result = $this->savedata(Companydetail::class, null , $saveArray);
    if ($result) {
        # code...
        return redirect()->route("pages")->with("success", "Update was succesful! About company updated");
    } else {
        # code...
        return redirect()->route("pages")->with("error", "Failed to update try About company again!");
    }


    }
    /**save faqs */
    public function savecompanyfaq (Request $req){
        $question = $req->question;
        $answer = $req->answer;
        $saveArray =[
            "question" => $question,
            "answer" =>$answer
        ];

        $result = $this->savedata(Faq::class, "new" , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("success", "Update was succesful! Faq created");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to create Faqs");
        }
    }

    // delet faqs
    public function deletecompanyfaq (Request $req){
        $id = $req->id;
        $result = $this->deleteRow(Faq::class, $id);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("warning", "Faq deleted successfuly");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to delete Faqs");
        }


    }

    //edit faqs
    public function editcompanyfaq (Request $req){
        $question = $req->question;
        $answer = $req->answer;
        $id = $req->id;
        $saveArray =[
            "question" => $question,
            "answer" =>$answer
        ];

        $result = $this->savedata(Faq::class, $id , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("success", "Update was succesful! Faq created");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to create Faqs");
        }
    }


    //user admin control
    public function adminuserdelete (Request $req){
        $id = $req->id;
        $deuse= User::where("id", $id)->first();
        if ($deuse->delete()) {
            # code...
            return redirect()->route("users")->with("warning","user deleted succesfuly");
        } else {
            # code...
            return redirect()->route("users")->with("error","deleting user failed");
        }


    }
    public function adminunblock (Request $req){
        $id = $req->id;
        $deuse= User::where("id", $id)->first();
        $deuse->blocked =0;
        if ($deuse->save()) {
            # code...
            return redirect()->route("users")->with("success", "user unblocked successfuly");

        } else {
            # code...
            return redirect()->route("users")->with("error", "failed to unblock user");
        }


    }
    public function adminblock (Request $req){
        $id = $req->id;
        $deuse= User::where("id", $id)->first();
        $deuse->blocked =1;
        if ($deuse->save()) {
            # code...
            return redirect()->route("users")->with("success", "user blocked successfuly");

        } else {
            # code...
            return redirect()->route("users")->with("error", "failed to block user");
        }


    }

    public function updateuser (Request $req) {
        $id =$req->id;
        $name =$req->name;
        $email =$req->email;
        $phone =$req->phone;
        $balance =$req->balance;
        $saveArray = ["name"=>$name, "email"=>$email,"phone" =>$phone,"balance"=>$balance];
        $result = $this->savedata(User::class, $id , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "update was succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to update");
        }



    }
    public function depositupdate (Request $req) {
        $id =$req->id;
        $depositdate = $req-> depositdate;
        $amount =$req->amount;

        $saveArray = ["amount"=>$amount, "depositdate"=>$depositdate];
        $result = $this->savedata(Deposit::class, $id , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "deposit update was succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to update deposit");
        }

    }
    public function deletedeposit (Request $req) {
        $id =$req->id;
        $result = deleteRow(Deposit::class, $id);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "deposit deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to delete deposit");
        }

    }
    public function adddeposit (Request $req) {
        $depositamount =$req->depositamount;
        $depositdate =$req->depositdate;
        $method =$req->method;
        $id =$req->id;

        $saveArray = ["amount"=>$depositamount, "depositdate"=>$depositdate, "method"=>$method, "userId"=>$id];
        $result = $this->savedata(Deposit::class, "new" , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "deposit added succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to add deposit");
        }



    }
    public function editwithdrawal (Request $req) {
        $id =$req->id;
        $name =$req->name;
        $withdrawaldate =$req->withdrawaldate;
        $amount =$req->amount;
        $method =$req->method;
        $methodaccount =$req->methodaccount;

        $saveArray = [
            "withdrawaltdate"=>$withdrawaldate,
         "amount"=>$amount,
         "methodAccount"=>$methodaccount,
          "method"=>$method,
           "name"=>$name
        ];
        $result = $this->savedata(Withdrawal::class, $id , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "withdrawal edited succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to edit withdrawal");
        }


    }
    public function deletewithdrawal (Request $req) {
        $id =$req->id;
        $result = deleteRow(Withdrawal::class, $id);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "withdrawal deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to delete withdrawal");
        }

    }
    public function addwithdrawal (Request $req) {
        $id =$req->id;
        $withdrawalamount =$req->withdrawalamount;
        $method =$req->method;
        $account =$req->account;
        $withdrawaldate =$req->withdrawaldate;
        $name=$req->name;
        $userId= $req->userid;

        $saveArray = [
            "withdrawaltdate"=>$withdrawaldate,
         "amount"=>$withdrawalamount,
         "methodaccount"=>$account,
          "method"=>$method,
           "name"=>$name,
           "userid"=>$userid,
        ];
        $result = $this->savedata(Withdrawal::class, "new" , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "deposit added succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to add deposit");
        }

    }
    public function editinvestment (Request $req) {
        $id =$req->id;
        $investmentdate =$req->investmentdate;
        $investmentpercent =$req->investmentpercent;
        $investmentmaturitydate =$req->investmentmaturitydate;
        $investmentamount =$req->investmentamount;
        $investmentprofit =$req->investmentprofit;
        $investmenttotalProfit =$req->investmenttotalProfit;

        $saveArray = [
            "investmentpercent"=>$investmentpercent,
         "investmentdate"=>$investmentdate,
         "investmentmaturitydate"=>$investmentmaturitydate,
          "investmentamount"=>$investmentamount,
           "investmenttotalProfit"=>$investmenttotalProfit,
           "investmentprofit"=>$investmentprofit,

        ];
        $result = $this->savedata(Investment::class, $id , $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "Investment edited succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to edit investment");
        }



    }
    public function deleteinvestment (Request $req) {
        $id =$req->id;
        $result = deleteRow(Investment::class, $id);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "Investment deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to delete investment");
        }

    }
}

