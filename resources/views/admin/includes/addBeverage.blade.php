<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Beverages</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Beverage</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!--display error  or success messages  -->
                        @if(session('success'))
                            <div class="alert alert-success">
                             {{ session('success') }}
                            </div>
                        @endif
                        <!--end of the message   -->

                        <br />
                        <form action="{{ route('insertBeverage') }}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                        
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span></label>
                                <p style="color:rgb(117, 2, 2)">
                                    @error('title'){{ $message }}@enderror
                                </p>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" name="title" id="title" required="required" class="form-control" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span></label>
                                <p style="color:rgb(117, 2, 2)">
                                    @error('content'){{ $message }}@enderror
                                </p>
                                <div class="col-md-6 col-sm-6">
                                    <textarea id="content" name="content" required="required" class="form-control">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
                                <p style="color:rgb(117, 2, 2)">
                                    @error('price'){{ $message }}@enderror
                                </p>
                                <div class="col-md-6 col-sm-6">
                                    <input id="price" class="form-control" type="number" name="price" required="required" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Published</label>
                                <div class="col-md-6 col-sm-6">
                                    <label>
                                        <input type="checkbox" class="flat" name="published" {{ old('published') ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Special</label>
                                <div class="col-md-6 col-sm-6">
                                    <label>
                                        <input type="checkbox" class="flat" name="special" {{ old('special') ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="image" name="image" required="required" class="form-control">
                                </div>
                                <p style="color:rgb(117, 2, 2)">
                                    @error('image'){{ $message }}@enderror
                                </p>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="category">Category <span class="required">*</span></label>
                                
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                <p style="color:rgb(117, 2, 2)">
                                    @error('category_id'){{ $message }}@enderror
                                </p>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>