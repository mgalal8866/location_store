<div>

        <style>
            .li-mt {
                display: block !important;
            }
            .options-dropdown {
            min-width: 180px;
            /* left: 50% !important; */
            right: auto !important;
            text-align: left;
            /* transform: translate(-50%, 0); */
            }

            .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            text-align: left;
            list-style: none;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0,0,0,.15);
                border-top-color: rgba(0, 0, 0, 0.15);
                border-right-color: rgba(0, 0, 0, 0.15);
                border-bottom-color: rgba(0, 0, 0, 0.15);
                border-left-color: rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            }

            .btn-select-option {
                font-size: 12px;
                margin: 0;
                padding: 3px 6px;
                }

            /* .dropdown-menu > li > a {
                display: block;
                padding: 3px 20px;
                clear: both;
                font-weight: 400;
                line-height: 1.42857143;
                color: #333;
                white-space: nowrap;
                }
                .options-dropdown li a {
                    font-weight: 600;
                    padding: 8px;
                    color: #555;
                } */


                .dropdown-menu > li > a {
                    /* text-align: right !important; */
                    display: block;
                    padding: 3px 20px;
                    clear: both;
                    font-weight: 400;
                    line-height: 1.42857143;
                    color: #777;
                    white-space: nowrap;
                }
                button, a {
                    outline: none !important;
                }
        </style>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <div class="card-header with-border">
                        <h3 class="card-title">إضافة عنصر شريط التمرير</h3>
                    </div><!-- /.card-header -->

                    <!-- form start -->
                    <form action="" enctype="multipart/form-data"accept-charset="utf-8">

                        <div class="card-body">

                            <div class="form-group">
                                <label>نوع السلايدر</label>
                                <select wire:model="statetype" class="form-control">
                                    <option value="" selected>Select Type</option>
                                    <option value="product">Product</option>
                                    <option value="store">STORE</option>
                                    <option value="url">URL</option>
                                    <option value="image">Image</option>
                                </select>
                            </div>
                            @if($statetype == 'url')
                                <div class="form-group">
                                    <label class="control-label">{{ __('url') }}</label>
                                    <input type="text" wire:model="event" class="form-control" name="title" placeholder="Enter Url" value="">
                                </div>
                            @endif
                            @if($statetype == 'product')
                                <div class="form-group">
                                    <label class="control-label">{{ __('product') }}</label>
                                    <input type="text" wire:model="event" class="form-control" name="title" placeholder="Enter Product" value="">
                                </div>
                            @endif
                            @if($statetype == 'store')
                                <div class="form-group">
                                    <label class="control-label">{{ __('store') }}</label>
                                    <input type="text" wire:model="event" class="form-control" name="title" placeholder="Select Store" value="">
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="control-label">صورة (1920x1080)</label>
                                <div class="display-block">
                                    <a class="btn btn-success btn-sm btn-file-upload">
                                        اختر صورة <input type="file" name="file" size="40"
                                            accept=".png, .jpg, .jpeg, .gif" required=""
                                           wire:model='image'">
                                           {{-- onchange="show_preview_image(this); --}}
                                    </a>
                                </div>
                                {{-- <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                    id="img_preview_file" class="img-file-upload-preview"> --}}
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button  wire:click.prevent='add' class="btn btn-primary pull-right">{{ __('add') }} </button>
                        </div>
                        <!-- /.card-footer -->
                    </form><!-- form end -->
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">عناصر السلايدر</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper"
                                        class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <table
                                            class="table table-bordered table-striped cs_datatable_lang dataTable no-footer"
                                            role="grid" aria-describedby="DataTables_Table_0_info"
                                            id="DataTables_Table_0">
                                                <thead>
                                                    <tr role="row">
                                                        <th style="width: 38px;" width="20">الرقم التعريفي</th>
                                                        <th style="width: 258px;">صورة</th>
                                                        <th style="width: 45.2667px;">{{ __('type') }}</th>
                                                        <th style="width: 40.4333px;">{{ __('') }}</th>
                                                        <th style="width: 76.3px;">{{ __('tran.action') }}</th>
                                                    </tr>
                                                </thead>
                                        <tbody>
                                         @forelse ($slider as $slide )
                                           <tr role="row">
                                                    <td class="sorting_1">{{ $slide->id }}</td>
                                                    <td><img src="{{ $slide->image }}"alt="" style="width: 200px;"></td>
                                                    <td><span class="badge badge-success ">{{ $slide->type }} </span></td>
                                                    <td>
                                                        @if($slide->type == 'product')
                                                          {{ ($slide->product->name??'') }}
                                                        @endif
                                                        @if($slide->type == 'url')
                                                         {{ ($slide->event) }}
                                                        @endif
                                                        @if($slide->type == 'store')
                                                         {{ ($slide->branch->stores->name??'') }}
                                                        @endif
                                                        @if($slide->type == 'image')
                                                        Image Only
                                                       @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn bg-purple dropdown-toggle btn-select-option"
                                                                type="button" data-toggle="dropdown">حدد اختيارا <span
                                                                    class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu options-dropdown">
                                                                <li>
                                                                    <a href="#"><i
                                                                            class="fa fa-edit option-icon"></i>تعديل</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" wire:click.prevent='deleteslider({{$slide->id }})' ><i class="fa fa-trash option-icon"></i>حذف</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty

                                             @endforelse
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>


</div>
