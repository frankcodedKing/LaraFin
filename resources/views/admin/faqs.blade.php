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
                        <strong>FREQUENTLY-ASKED-QUESTIONS</strong>

                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>


                                        <span class="">ID</span>

                                </th>
                                <th>QUESTION</th>

                                <th>ANSWER</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($faqs)
                                @foreach ($faqs as $faq )
                                <tr class="tr-shadow">
                                    <form action="" method="post">
                                        <td>
                                            <label class="">

                                                <span class="">1</span>
                                            </label>
                                            <input type="text" name="id" value="{{$faq->id}}">
                                        </td>
                                        <td><textarea name="question" value=""  id="" cols="30" rows="5">
                                            {{$faq->question}}
                                        </textarea></td>


                                        <td class="desc"><textarea name="answer" values="" id="" cols="30" rows="5">
                                            {{$faq->answer}}                                    </textarea>
                                        </td>

                                        <td>
                                            <div class="table-data-feature">

                                                <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="save changes">
                                                    <i class="zmdi zmdi-border-color"></i>
                                                </button>
                                                <a href="{{route("deletefaqs",$faq->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </a>

                                            </div>
                                        </td>
                                    </form>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
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
