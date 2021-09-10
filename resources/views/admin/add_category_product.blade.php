@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Category
                        </header>
                        <div class="panel-body">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo"<span class='text-alert'>$message</span>";
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save_category_product')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name category</label>
                                    <input type="text" class="form-control" name="category_product_name" id="exampleInputEmail1" placeholder="Category name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Category description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Display</label>
                                    <select name="category_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hide</option>
                                        <option value="1">Display</option>
                                    </select>
                                </div>

                                <button type="submit" name="add_category_product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection