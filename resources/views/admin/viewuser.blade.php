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


                    <table class="table">
                        <thead>
                            <tr>
                                <th>


                                        <span class="">ID</span>

                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Deposit</th>
                                <th>Balance</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-shadow">
                                <td>
                                    <label class="">

                                        <span class="">1</span>
                                    </label>
                                </td>
                                <td>Lori Lynch</td>
                                <td>
                                    <span class="desc">lori@example.com</span>
                                </td>

                                <td>01234567890</td>
                                <td>
                                    <span class="desc">$67476</span>
                                </td>
                                <td>$679.00</td>
                                <td>
                                    <div class="table-data-feature">

                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>
                        </tbody>
                    </table>
                </div>


                {{-- USERDEPOSITS --}}

                <div class="table-responsive table-responsive-data2">

                    <div class="card-header">
                        <strong>USER DEPOSITS HISTORY</strong>

                    </div>


                    <table class="table">
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
                            <tr class="tr-shadow">
                                <td>
                                    <label class="">

                                        <span class="">1</span>
                                    </label>
                                </td>
                                <td>$984</td>
                                <td>
                                    <span class="desc">12232</span>
                                </td>


                                <td>
                                    <div class="table-data-feature">

                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                            <tr class="spacer"></tr>

                        </tbody>
                    </table>
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

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-shadow">
                                <td>
                                    <label class="">

                                        <span class="">1</span>
                                    </label>
                                </td>
                                <td><input type="number" name="depositamt" id="" placeholder="Amount" style="padding: 5px;"></td>
                                <td>
                                    <span class="desc"><input type="date" name="date" id="" style="padding: 5px;"></span>
                                </td>


                                <td>
                                    <div class="table-data-feature">

                                        <button class="item" data-toggle="tooltip" data-placement="top" title="add">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>


                                    </div>
                                </td>
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


        <table class="table">
            <thead>
                <tr>
                    <th>


                            <span class="">ID</span>

                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Deposit</th>
                    <th>Balance</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-shadow">
                    <td>
                        <label class="">

                            <span class="">1</span>
                        </label>
                    </td>
                    <td>Lori Lynch</td>
                    <td>
                        <span class="desc">lori@example.com</span>
                    </td>

                    <td>01234567890</td>
                    <td>
                        <span class="desc">$67476</span>
                    </td>
                    <td>$679.00</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="view">
                                <i class="zmdi zmdi-account"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>
 {{-- DEPOSITSTOP --}}

       {{-- RUNNINGINVESTENT --}}

       <div class="table-responsive table-responsive-data2">

        <div class="card-header">
            <strong>USER RUNNING INVESTMENT</strong>

        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>


                            <span class="">ID</span>

                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Deposit</th>
                    <th>Balance</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-shadow">
                    <td>
                        <label class="">

                            <span class="">1</span>
                        </label>
                    </td>
                    <td>Lori Lynch</td>
                    <td>
                        <span class="desc">lori@example.com</span>
                    </td>

                    <td>01234567890</td>
                    <td>
                        <span class="desc">$67476</span>
                    </td>
                    <td>$679.00</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="view">
                                <i class="zmdi zmdi-account"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>

    {{-- RUNNINGINV --}}

      {{-- USERREFERRALS --}}

      <div class="table-responsive table-responsive-data2">

        <div class="card-header">
            <strong>USER DEPOSITS</strong>

        </div>


        <table class="table">
            <thead>
                <tr>
                    <th>


                            <span class="">ID</span>

                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Deposit</th>
                    <th>Balance</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr-shadow">
                    <td>
                        <label class="">

                            <span class="">1</span>
                        </label>
                    </td>
                    <td>Lori Lynch</td>
                    <td>
                        <span class="desc">lori@example.com</span>
                    </td>

                    <td>01234567890</td>
                    <td>
                        <span class="desc">$67476</span>
                    </td>
                    <td>$679.00</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="view">
                                <i class="zmdi zmdi-account"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>

    {{-- ENDUSERREF --}}


            </div>
        </div>
    </div>
</section>
</div>
<!-- END DATA TABLE-->

@endsection
