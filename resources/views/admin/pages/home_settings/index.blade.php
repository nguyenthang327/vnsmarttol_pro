@extends('admin.layouts.master')

@section('css_page')
    <link rel="stylesheet" href="{{ asset('management/assets/plugins/select2/select2.min.css') }}" />
@endsection

@section('content')
    <div class="main-content">
        <div class="page-header">
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="fa fa-home m-r-5"></i>Admin</a>
                    <a class="breadcrumb-item" href="javascript:void(0)">Liên hệ và hỗ trợ</a>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1"
                           aria-selected="true">
                            <i class="fas fa-bullhorn"></i>
                            Liên hệ & Hỗ trợ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2"
                           aria-selected="false">
                            <i class="fas fa-user-tag" aria-hidden="true"></i>
                            Câu hỏi thường gặp
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_3" role="tab" aria-selected="true">
                            <i class="fa fa-question" aria-hidden="true"></i>
                            Video hỗ trợ
                        </a>
                    </li>
                </ul>

                <div class="tab-content m-t-15">
                    <div class="tab-pane fade show active" id="tab_1" role="tabpanel">
                        <form class="form-json" method="POST" action="{{ route('admin.home_settings.contact.index') }}"
                              data-table="Contacts">
                            <div class="form-group">
                                <label>Link Icon (Link ảnh logo có thể search trên google)</label>
                                <input class="form-control" name="image" type="url" maxlength="200">
                                <div class="alert alert-warning mt-2">
                                    Website hỗ trợ get link ảnh:
                                    <a href="{{ config('constants.domain_upload_image') }}" target="_blank">Tại Đây</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề ( vd: Fanpage Support)</label>
                                <input class="form-control" name="content" required maxlength="200">
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn (vd: link fb admin hoặc link cần tới)</label>
                                <input class="form-control" name="link" type="url" required maxlength="200">
                            </div>
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Hoàn tất</button>
                            </div>
                        </form>
                        <hr/>
                        <h5 class="text-success mb-3">Danh sách Thông tin liên hệ</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="datatable-contacts"></table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab_2" role="tabpanel">
                        <form class="form-json" method="POST" action="{{ route('admin.home_settings.question.index') }}" data-table="Questions">
                            <div class="form-group">
                                <label>Câu hỏi</label>
                                <input class="form-control" name="question" required maxlength="200">
                            </div>

                            <div class="form-group">
                                <label>Trả lời</label>
                                <textarea class="form-control" name="answer" required rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success text-bold">Hoàn tất</button>
                            </div>
                        </form>
                        <hr/>
                        <h5 class="text-success mb-3">Danh sách Hỏi & Đáp</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="datatable-questions"></table>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_3" role="tabpanel">
                        <form class="form-setting-single" method="POST">
                            <div class="form-group">
                                <label>Link video Hướng dẫn sử dụng</label>
                                <input class="form-control" name="video_intro" required maxlength="200"
                                       value="{{ old('video_intro') ?? $videoIntro->video_intro }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success text-bold">Hoàn tất</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Modal-->
    <div class="modal fade" id="modalEditContact" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form class="form-json" method="POST" action="{{ route('admin.home_settings.contact.index') }}" data-table="Contacts">
                    <input type="hidden" name="id"/>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Link Icon</label>
                            <input class="form-control" name="image" type="url" required>

                            <div class="alert alert-warning mt-2">
                                Website hỗ trợ get link ảnh: <a href="{{ config('constants.domain_upload_image') }}" target="_blank">Tại Đây</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="content" required maxlength="200">
                        </div>

                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <input class="form-control" name="link" required maxlength="200">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Hoàn tất</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->

    <!--begin::Modal-->
    <div class="modal fade" id="modalEditQuestion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form class="form-json" method="POST" action="{{ route('admin.home_settings.question.index') }}" data-table="Questions">
                    <input type="hidden" name="id"/>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Câu hỏi</label>
                            <input class="form-control" name="question" required maxlength="200">
                        </div>

                        <div class="form-group">
                            <label>Trả lời</label>
                            <textarea class="form-control" name="answer" required rows="5"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Hoàn tất</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->

@endsection

@section('js_page')
    <script src="{{ asset('management/assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/datatable-home-settings.js') }}"></script
@endsection
