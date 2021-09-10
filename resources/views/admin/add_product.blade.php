@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Product
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
                                <form role="form" action="{{URL::to('/save_product')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name product</label>
                                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="brand name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product price</label>
                                    <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="brand name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="brand description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Product contents"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product image</label>
                                    <input type="file" class="form-control" name="product_images" id="exampleInputEmail1" placeholder="Product image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Display</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hide</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Category</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key=>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Brand</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key=>$brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" name="add_brand_product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection