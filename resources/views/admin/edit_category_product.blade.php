@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Category
                        </header>
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo"<span class='text-alert'>$message</span>";
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $update_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update_category_product/'.$update_value->category_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name category</label>
                                    <input type="text" value="{{$update_value->category_name}}" class="form-control" name="category_product_name" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="category_product_desc" id="exampleInputPassword1" >{{$update_value->category_name}}</textarea>
                                </div>

                                <button type="submit" name="update_category_product" class="btn btn-info">Update</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection