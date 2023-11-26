@extends('admin.layouts.master')

@section('css_page')
    <link href="{{ asset('management/assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Dịch vụ {{$type}}</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Chỉnh sửa máy chủ {{$name}}</h4>
            </div>
            <div class="card-body">
                <form class="form-add-service-pack form-json" method="POST" data-type="{{$type}}"
                      action="{{ route('admin.service_pack.update') }}"
                      data-table="Service_Packs"
                >
                    <input type="hidden" name="service_pack_id" value="{{ $service_pack->id }}">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="api_service">API của dịch vụ</label>
                            <select class="form-control" id="api_service" name="api_service" autocomplete="off"
                                    required>
                                <option></option>
                                <option
                                    value="subgiare" {{ $service_pack->api_service == 'subgiare' ? 'selected' : '' }}>
                                    subgiare.vn
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="server_service">Máy chủ dịch vụ</label>
                            <select class="form-control" id="server_service" name="server_service" autocomplete="off"
                                    required>
                                <option></option>
                                @for ($i = 1; $i <= 20; $i++)
                                    <option
                                        value="sv{{ $i }}" {{ $service_pack->server_service == "sv$i" ? "selected" : "" }}>
                                        Server: {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div id="show_service">
                            @if ($service_pack->api_service === 'subgiare')
                                @if ($service_pack->type_server === 'facebook')
                                    <div class="form-group">
                                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="code_server" id="code_server" class="form-control">
                                                <option>Chọn loại dịch vụ</option>
                                                <option value="like-post-sale" {{ $service_pack->code_server == 'like-post' ? 'selected' : '' }}>Like bài viết (sale)</option>
                                                <option value="like-post-speed" {{ $service_pack->code_server == 'like-post-speed' ? 'selected' : '' }}>Like bài viết (speed)</option>
                                                <option value="like-comment" {{ $service_pack->code_server == 'like-comment' ? 'selected' : '' }}>Like bình luận</option>
                                                <option value="comment-sale" {{ $service_pack->code_server == 'comment-sale' ? 'selected' : '' }}>Bình luận (sale)</option>
                                                <option value="comment-speed" {{ $service_pack->code_server == 'comment-speed' ? 'selected' : '' }}>Bình luận (speed)</option>
                                                <option value="sub-vip" {{ $service_pack->code_server == 'sub-vip' ? 'selected' : '' }}>Sub/follow (vip)</option>
                                                <option value="sub-sale" {{ $service_pack->code_server == 'sub-sale' ? 'selected' : '' }}>Sub/follow (sale)</option>
                                                <option value="like-page-speed" {{ $service_pack->code_server == 'like-page-speed' ? 'selected' : '' }}>Like page (speed)</option>
                                                <option value="like-page-sale" {{ $service_pack->code_server == 'like-page-sale' ? 'selected' : '' }}>Like page (sale)</option>
                                                <option value="eye-live" {{ $service_pack->code_server == 'eye-live' ? 'selected' : '' }}>Mắt live</option>
                                                <option value="view-video" {{ $service_pack->code_server == 'view-video' ? 'selected' : '' }}>View video</option>
                                                <option value="share-profile" {{ $service_pack->code_server == 'share-profile' ? 'selected' : '' }}>Share (profile)</option>
                                                <option value="member-group" {{ $service_pack->code_server == 'member-group' ? 'selected' : '' }}>Thành viên nhóm</option>
                                                <option value="view-story" {{ $service_pack->code_server == 'view-story' ? 'selected' : '' }}>View story</option>
                                            </select>
                                        </div>
                                    </div>
                                @elseif ($service_pack->type_server === 'instagram')
                                    <div class="form-group">
                                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="code_server" id="code_server" class="form-control">
                                                <option>Chọn loại dịch vụ</option>
                                                <option value="like-instagram" {{ $service_pack->code_server == 'like-instagram' ? 'selected' : '' }}>Like instagram</option>
                                                <option value="follow-instagram" {{ $service_pack->code_server == 'follow-instagram' ? 'selected' : '' }}>Follow instagram</option>
                                            </select>
                                        </div>
                                    </div>
                                @elseif ($service_pack->type_server  === 'tiktok')
                                    <div class="form-group">
                                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="code_server" id="code_server" class="form-control">
                                                <option>Chọn loại dịch vụ</option>
                                                <option value="like-tiktok" {{ $service_pack->code_server == 'like-tiktok' ? 'selected' : '' }}>Like thả tim</option>
                                                <option value="comment-tiktok" {{ $service_pack->code_server == 'comment-tiktok' ? 'selected' : '' }}>Tăng bình luận</option>
                                                <option value="share-tiktok" {{ $service_pack->code_server == 'share-tiktok' ? 'selected' : '' }}>Tăng chia sẻ</option>
                                                <option value="sub-tiktok" {{ $service_pack->code_server == 'sub-tiktok' ? 'selected' : '' }}>Tăng sub/follow</option>
                                                <option value="view-tiktok" {{ $service_pack->code_server == 'view-tiktok' ? 'selected' : '' }}>Tăng view video</option>
                                                <option value="eye-live-tiktok" {{ $service_pack->code_server == 'eye-live-tiktok' ? 'selected' : '' }}>Tăng mắt live</option>
                                            </select>
                                        </div>
                                    </div>
                                @elseif ($service_pack->type_server === 'twitter')
                                    <div class="form-group">
                                        <label class="form-label" for="code_server">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="code_server" id="code_server" class="form-control">
                                                <option>Chọn loại dịch vụ</option>
                                                <option value="like-twitter" {{ $service_pack->code_server == 'like-twitter' ? 'selected' : '' }}>Tăng like</option>
                                                <option value="sub-twitter" {{ $service_pack->code_server == 'sub-twitter' ? 'selected' : '' }}>Tăng sub/follow</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Tên dịch vụ</label>
                            <input id="name" type="text" class="form-control" name="name"
                                   value="{{$service_pack->name}}" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="price_stock">Giá dịch vụ</label>
                            <input type="number" min="0" class="form-control" name="price_stock"
                                   value="{{$service_pack->price_stock}}"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="min_order">Min order</label>
                            <input type="number" min="0" class="form-control" name="min_order"
                                   value="{{$service_pack->min_order}}"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="max_order">Max order</label>
                            <input type="number" min="0" class="form-control" name="max_order"
                                   value="{{$service_pack->max_order}}"
                                   autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Thông báo máy chủ</label>
                            <input type="hidden" class="value_note" value="{{$service_pack->note}}">
                            <input type="text" class="form-control" id="note" name="note" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="status_server">Trạng thái</label>
                            <div class="form-control-wrap">
                                <select name="status_server" id="status_server" class="form-control">\
                                    <option value="on" {{ $service_pack->status_server == 'on' ? 'selected' : '' }}>ON</option>
                                    <option value="off" {{ $service_pack->status_server == 'off' ? 'selected' : '' }}>OFF</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Chỉnh sửa dịch vụ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Danh sách dịch vụ {{$name}} - SUBGIARE</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable-services_wrapper"
                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable no-footer"
                                       id="datatable-service-packs" role="grid">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Loại</th>
                                        <th>Máy chủ</th>
                                        <th>Giá</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_page')
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#code_server").select2({
                placeholder: "Chọn loại dịch vụ",
                allowClear: !0
            });

            $("#api_service").select2({
                placeholder: "Chọn API của dịch vụ",
                allowClear: !0
            });

            $("#server_service").select2({
                placeholder: "Chọn máy chủ dịch vụ",
                allowClear: !0
            });

            ckEditor('note');
        });
    </script>
    <script src="{{ asset('admin/pages/service-manage.js')}}"></script>
    <script>

    </script>
@endsection
