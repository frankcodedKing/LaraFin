@extends("adminlayout.adminlayout")
@section("body")

<div class="container">
<!-- DATA TABLE-->
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive table-responsive-data2">

                    <div class="card-header">
                        <strong>USER ACCOUNT DETAILS</strong>

                    </div>


                    <div class="table table-responsive">
                        <table class="table" style="background-color: rgb(54, 54, 92)">
                            <thead>
                                <tr>
                                    <th>


                                            <span class="">ID</span>

                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Balance</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{route('updateuser')}}" method="post">
                                    @csrf
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="">

                                                <span class="">1</span>
                                            </label>
                                        </td>
                                        <td><input type="text" name="name" value="{{ $userDetail? $userDetail->name :'no name'}}">
                                        <input type="text" name="id" value="{{$userDetail->id}}" id="">
                                        </td>
                                        <td>
                                            <span class="desc">
                                                <input type="email" value="{{ $userDetail? $userDetail->email :'no email'}}" name="email">
                                            </span>
                                        </td>

                                        <td><input type="number" name="phone" value="{{ $userDetail? $userDetail->phone :'no phone'}}"></td>
                                        <td>
                                            <span class="desc">
                                                <input type="number" name="balance" value="{{ $userDetail? $userDetail->balance :'erro showing balace'}}"></span>
                                        </td>

                                        <td>
                                            <div class="table-data-feature">

                                                <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>


                                            </div>
                                        </td>
                                    </tr>
                                </form>
                                <tr class="spacer"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                {{-- USERDEPOSITS --}}

                <div class="table-responsive table-responsive-data2">

                    <div class="card-header">
                        <strong>USER DEPOSITS HISTORY</strong>

                    </div>


                    <div class="table table-responsive">
                        <table class="table" style="background-color: rgb(80, 78, 177);color:wheat">
                            <thead>
                                <tr>
                                    <th>


                                            <span class="">ID</span>

                                    </th>
                                    <th>Amount</th>
                                    <th>Date</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($userDeposits)

                                @foreach ( $userDeposits as $Deposit )
                                <tr class="tr-shadow">
                                    <form action="{{route("depositupdate")}}" method="post">
                                        @csrf
                                        <td>
                                            <label class="">

                                                <span class="">1</span>
                                            </label>
                                        </td>
                                        <td><input type="number" name="amount" value="{{ $Deposit? $Deposit->amount :'error showing amount'}}">
                                        <input type="text" name="id" disabled hidden value="{{$Deposit->userid}}">
                                        </td>
                                        <td>
                                            <span class="desc"> <input type="date" name="depositdate" value="{{ $Deposit? $Deposit->depositDate :'error showing amount'}}"></span>
                                        </td>



                                        <td>
                                            <div class="table-data-feature">

                                                <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                    </form>
                                            <a href="{{route('deletedeposit',$Deposit->userid)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button></a>

                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach

                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>



                {{-- adddeposit --}}

   <div class="table-responsive table-responsive-data2">

                    <div class="card-header">
                        <strong>ADD DEPOSITS</strong>

                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>


                                        <span class="">ID</span>

                                </th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Method</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route("adddeposit")}}" method="post">
                                @csrf
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="">

                                            <span class="">1</span>
                                        </label>
                                    </td>
                                    <td><input type="number" name="depositamount" id="" placeholder="Amount" style="padding: 5px;"></td>
                                    <td>
                                        <span class="desc"><input type="date" name="depositdate" id="" style="padding: 5px;"></span>
                                    </td>
                                    <td>
                                        <span class="desc"><input type="string" name="method" id="" style="padding: 5px;"></span>
                                        <input type="text" value="{{$userDetail->id}}"  name="id"  disabled hidden>
                                    </td>


                                    <td>
                                        <div class="table-data-feature">

                                            <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="add">
                                                <i class="zmdi zmdi-plus"></i>
                                            </button>


                                        </div>
                                    </td>
                            </form>
                            </tr>
                            <tr class="spacer"></tr>

                        </tbody>
                    </table>
                </div>

                {{-- USERWITHDRAWALS --}}


      {{-- USERDEPOSITS --}}

      <div class="table-responsive table-responsive-data2">

        <div class="card-header">
            <strong>USER WITHDRAWALS HISTORY</strong>

        </div>


<div class="table table-responsive">
    <table class="table" style="background-color: rgb(131, 44, 58)">
        <thead>
            <tr>
                <th>


                        <span class="">ID</span>

                </th>
                <th>Name</th>
                <th>withdrawal date</th>
                <th>amount</th>
                <th>method</th>
                <th>account</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($userWithdrawals)
                @foreach ( $userWithdrawals as $withdrawal)
                <form action="{{route("editwithdrawal")}}" method="post">
                    <tr class="tr-shadow">
                    <td>
                        <label class="">

                            <span class=""> {{$loop->index + 1}}</span>
                            <input type="text" disabled hidden name="id"  value="{{$withdrawal->id}}" id="">
                        </label>
                    </td>
                    <td><input type="text" name="name" value="{{ $withdrawal? $withdrawal->name :'error showing name'}}" id=""></td>
                    <td>
                        <span class="desc"><input type="date" name="withdrawaldate" id="" value="{{ $withdrawal? $withdrawal->withdrawaltDate :'error showing date'}}"></span>
                    </td>

                    <td><input type="number" name="amount" id="" value="{{ $withdrawal? $withdrawal->amount :'error showing amount'}}"></td>
                    <td>
                        <span class="desc"><input type="text" name="method" value="{{ $withdrawal? $withdrawal->method :'error showing method'}}"></span>
                    </td>
                    <td><input type="text" name="methodaccount" value="{{ $withdrawal? $withdrawal->methodAccount :'error showing account'}}"></td>
                    <td>
                        <div class="table-data-feature">

                            <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <a href="{{route("deletewithdrawal", $withdrawal->id)}}">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </a>

                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
                </form>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
    </div>



    <div class="table-responsive table-responsive-data2">

        <div class="card-header">
            <strong>ADD Withdrawal</strong>

        </div>
        <div class="table table-responsive">
            <table class="table" style="background-color:rgb(184, 63, 83) ">
                <thead>
                    <tr>
                        <th>


                                <span class="">ID</span>

                        </th>
                        <th>Amount</th>
                        <th>method (e.g bitcoin)</th>
                        <th>method Account</th>
                        <th>Date</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow">
                        <form action="{{route("addwithdrawal")}}" method="post">
                            @csrf
                            <td>
                                <label class="">

                                    <span class="">1</span>
                                </label>
                            </td>
                            <td><input type="number" name="withdrawalamount" id="" placeholder="Amount" style="padding: 5px;"></td>

                            <td><input type="text" name="method" id="" placeholder="method example bitcoin, paypal, perfect mo ney" style="padding: 5px;"></td>
                            <td><input type="text" name="account" id="" placeholder="e.g perfect money id, btc address" style="padding: 5px;"></td>
                            <td>
                                <span class="desc"><input type="date" name="withdrawaldate" id="" style="padding: 5px;"></span>
                            </td>
                            <td><input type="text" name="name" value placeholder="name">
                            <input type="text" name="userid" value="{{$userDetail->id}}" disabled hidden id=""></td>



                            <td>
                                <div class="table-data-feature">

                                    <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="add">
                                        <i class="zmdi zmdi-minus"></i>
                                    </button>


                                </div>
                            </td>
                        </form>
                    </tr>
                    <tr class="spacer"></tr>

                </tbody>
            </table>
        </div>
    </div>
 {{-- DEPOSITSTOP --}}

       {{-- RUNNINGINVESTENT --}}

       <div class="table-responsive table-responsive-data2">

        <div class="card-header">
            <strong>USER RUNNING INVESTMENT</strong>

        </div>


        <div class="table table-responsive">
            <table class="table" style="background-color: yellowgreen">
                <thead>
                    <tr>
                        <th>


                                <span class="">ID</span>

                        </th>
                        <th>Investment date</th>
                        <th>profit percent</th>
                        <th>maturituy date</th>
                        <th>invested amount</th>
                        <th>expected profit</th>
                        <th>total amount</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($userInvestments)
                    @foreach ($userInvestments as $investments)
                    <form action="{{route("editinvestment")}}" method="POST">
                        @csrf
                        <tr class="tr-shadow">
                            <td><label class="">
                                    <span class="">{{$loop->index + 1}}</span>
                                </label>
                            </td>
                            <td>
                                <input type="text" name="id" value="{{$investments->id}}" disabled hidden>
                                <input type="date" name="investmentdate" value="{{$investments? $investments->investmentdate: "date not set"}}" id="">
                            </td>

                            <td><input type="number" name="investmentpercent" value="{{$investments? $investments->investmentpercent:"percent not set"}}" placeholder="investment percent" name="" id=""></td>
                            <td>
                                <input type="date" name="investmentmaturitydate" value="{{$investments? $investments->investmentmaturitydate:"maturity date not set"}}" placeholder="maturity date" name="" id="">
                            </td>
                            <td><input name="investmentamount" value="{{$investments? $investments->investmentamount:"invested amount not set"}}" type="number" placeholder="invested amount" name="" id=""></td>
                            <td><input name="investmentprofit" value="{{$investments? $investments->investmentprofit:"profit not set"}}" type="number" placeholder="expected profit" name="" id=""></td>
                            <td><input name="investmenttotalProfit"  value="{{$investments? $investments->investmenttotalProfit:"total turnover not set"}}" type="number" placeholder="total amount expected" name="" id=""></td>

                            <td>
                                <div class="table-data-feature">

                                    <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <a href="{{route('deleteinvestment',$investments->id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete investment">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    </form>
                    <tr class="spacer"></tr>
                    @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>



            </div>
        </div>
    </div>
</section>
</div>
<!-- END DATA TABLE-->

@endsection
