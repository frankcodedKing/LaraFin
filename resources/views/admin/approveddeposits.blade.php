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
                        <strong>APPROVED DEPOSITS</strong>

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
                        <tbody> @if ($approvedDeposit)
                            @foreach ($approvedDeposit as $deposit)
                            <tr class="tr-shadow">
                                <td>
                                    <label class="">

                                        <span class="">$loop->index</span>
                                    </label>
                                </td>
                                <td>$deposit->name</td>
                                <td>
                                    <span class="desc">$deposit->email</span>
                                </td>

                                <td>$deposit->method</td>
                                <form action="" method="">
                                <td>$deposit->method</td>
                                <td>$deposit->method</td>

                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" type="submit" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>


                                    </div>
                                </td>
                            </form>
                            </tr>
                            <tr class="spacer"></tr>

                            @endforeach
                            {{ $approvedDeposit->onEachSide(6)->links() }}
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- END DATA TABLE-->

@endsection
