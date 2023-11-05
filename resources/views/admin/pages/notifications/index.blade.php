@extends('admin.layouts.master')

@section('css_page')
    <style>
        .tet-bg-footer,
        .tet-icon-footer {
            display: none;
        }
    </style>


    <style type="text/css">
        .nav-wrap,
        .menu_header {
            background-color: #ffffff;
        }
    </style>
@endsection

@section('content')
@endsection
<!-- Content Wrapper START -->


<div class="main-content" data-select2-id="10">
    <div class="page-header">

        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="https://vnsmarttol.com/qladmin/notifications#" class="breadcrumb-item"><i
                        class="fa fa-home m-r-5"></i>Admin</a>
                <a class="breadcrumb-item" href="javascript:void(0)">Thông báo</a>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"
                       href="https://vnsmarttol.com/qladmin/notifications#tab_1"
                       role="tab" aria-controls="tab_1" aria-selected="true">
                        <i class="fas fa-bullhorn"></i>
                        Thông báo Web
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="https://vnsmarttol.com/qladmin/notifications#tab_2"
                       role="tab" aria-controls="tab_2" aria-selected="false">
                        <i class="fas fa-user-tag" aria-hidden="true"></i>
                        Thông báo người dùng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="https://vnsmarttol.com/qladmin/notifications#tab_3"
                       role="tab" aria-selected="false">
                        <i class="fab fa-telegram"></i>
                        Thông báo Telegram
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="https://vnsmarttol.com/qladmin/notifications#tab_4"
                       role="tab" aria-selected="false">
                        <i class="fas fa-user-tag" aria-hidden="true"></i>
                        Thông báo người dùng mới
                    </a>
                </li>
            </ul>

            <div class="tab-content m-t-15" data-select2-id="9">
                <div class="tab-pane fade active show" id="tab_1" role="tabpanel">
                    <div class="form-group mb-0">
                        <div class="d-flex align-items-center">
                            <div class="switch m-r-10">
                                <input type="checkbox" id="show_last_notify" name="show_last_notify">
                                <label for="show_last_notify"></label>
                            </div>
                            <label>Hiển thị popup thông báo mới nhất</label>
                        </div>

                        <div>Nếu bạn bật tuỳ chọn này, khi người dùng truy cập trang chủ thì thông báo mới nhất tại
                            trang
                            này sẽ hiện ra
                        </div>

                        <hr>
                    </div>

                    <!--begin::Form-->
                    <form class="form-json" method="POST" action="https://vnsmarttol.com/qladmin/notifications/"
                          data-table="Notification">
                        <div class="form-group">
                            <label>Link Ảnh (tuỳ chọn)</label>
                            <input class="form-control" name="image" type="url" maxlength="240">

                            <div class="alert alert-warning mt-2">
                                Website hỗ trợ get link ảnh: <a href="https://linkanh.xyz/" target="_blank">Tại Đây</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ghim</label>
                            <select name="is_pin" class="form-control">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="is_visible" class="form-control">
                                <option value="1">Có</option>
                                <option value="0">Không</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nội dung thông báo</label>

                            <div class="alert alert-primary">
                                <i class="fa-regular fa-circle-question mr-1"></i>
                                Nếu bạn muốn chèn iframe (video youtube...) căn giữa, hãy chọn chế độ "Mã HTML" và bọc
                                nội dung
                                iframe trong thẻ &lt;center&gt;&lt;Nội dung ở đây&gt;&lt;/center&gt;<br>
                                Ví dụ
                                <span class="text-success">&lt;center&gt;&lt;iframe width=".." height=".." ...
                          &gt;&lt;/iframe&gt;&lt;/center&gt;</span>
                            </div>

                            <textarea class="form-control" name="content" id="notify_content" rows="5"
                                      style="visibility: hidden; display: none;"></textarea>
                            <div id="cke_notify_content"
                                 class="cke_1 cke cke_reset cke_chrome cke_editor_notify_content cke_ltr cke_browser_webkit"
                                 dir="ltr" lang="vi" role="application"
                                 aria-labelledby="cke_notify_content_arialbl"><span
                                    id="cke_notify_content_arialbl" class="cke_voice_label">Bộ soạn thảo văn bản có định dạng,
                          notify_content</span>
                                <div class="cke_inner cke_reset" role="presentation"><span id="cke_1_top"
                                                                                           class="cke_top cke_reset_all"
                                                                                           role="presentation"
                                                                                           style="height: auto; user-select: none;"><span
                                            id="cke_17" class="cke_voice_label">Thanh
                              công cụ</span><span id="cke_1_toolbox" class="cke_toolbox" role="group"
                                                  aria-labelledby="cke_17" onmousedown="return false;"><span id="cke_22"
                                                                                                             class="cke_toolbar"
                                                                                                             aria-labelledby="cke_22_label"
                                                                                                             role="toolbar"><span
                                                    id="cke_22_label"
                                                    class="cke_voice_label">Tài liệu</span><span
                                                    class="cke_toolbar_start"></span><span
                                                    class="cke_toolgroup" role="presentation"><a id="cke_23"
                                                                                                 class="cke_button cke_button__source cke_button_off"
                                                                                                 href="javascript:void(&#39;Mã HTML&#39;)"
                                                                                                 title="Mã HTML"
                                                                                                 tabindex="-1"
                                                                                                 hidefocus="true"
                                                                                                 role="button"
                                                                                                 aria-labelledby="cke_23_label"
                                                                                                 aria-describedby="cke_23_description"
                                                                                                 aria-haspopup="false"
                                                                                                 aria-disabled="false"
                                                                                                 onkeydown="return CKEDITOR.tools.callFunction(3,event);"
                                                                                                 onfocus="return CKEDITOR.tools.callFunction(4,event);"
                                                                                                 onclick="CKEDITOR.tools.callFunction(5,this);return false;"><span
                                                            class="cke_button_icon cke_button__source_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1848px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_23_label"
                                                            class="cke_button_label cke_button__source_label"
                                                            aria-hidden="false">Mã HTML</span><span
                                                            id="cke_23_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator" role="separator"></span><a
                                                        id="cke_24"
                                                        class="cke_button cke_button__newpage cke_button_off"
                                                        href="javascript:void(&#39;Trang mới&#39;)" title="Trang mới"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_24_label"
                                                        aria-describedby="cke_24_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(6,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(7,event);"
                                                        onclick="CKEDITOR.tools.callFunction(8,this);return false;"><span
                                                            class="cke_button_icon cke_button__newpage_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1464px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_24_label"
                                                            class="cke_button_label cke_button__newpage_label"
                                                            aria-hidden="false">Trang mới</span><span
                                                            id="cke_24_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_25"
                                                        class="cke_button cke_button__preview cke_button_off"
                                                        href="javascript:void(&#39;Xem trước&#39;)" title="Xem trước"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_25_label"
                                                        aria-describedby="cke_25_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(9,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(10,event);"
                                                        onclick="CKEDITOR.tools.callFunction(11,this);return false;"><span
                                                            class="cke_button_icon cke_button__preview_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1656px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_25_label"
                                                            class="cke_button_label cke_button__preview_label"
                                                            aria-hidden="false">Xem trước</span><span
                                                            id="cke_25_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span id="cke_26"
                                                                                                class="cke_toolbar"
                                                                                                aria-labelledby="cke_26_label"
                                                                                                role="toolbar"><span
                                                    id="cke_26_label"
                                                    class="cke_voice_label">Clipboard/Undo</span><span
                                                    class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                           role="presentation"><a
                                                        id="cke_27"
                                                        class="cke_button cke_button__cut cke_button_disabled "
                                                        href="javascript:void(&#39;Cắt&#39;)" title="Cắt (Ctrl+X)"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_27_label"
                                                        aria-describedby="cke_27_description" aria-haspopup="false"
                                                        aria-disabled="true"
                                                        onkeydown="return CKEDITOR.tools.callFunction(12,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(13,event);"
                                                        onclick="CKEDITOR.tools.callFunction(14,this);return false;"><span
                                                            class="cke_button_icon cke_button__cut_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -312px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_27_label"
                                                            class="cke_button_label cke_button__cut_label"
                                                            aria-hidden="false">Cắt</span><span id="cke_27_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false">&nbsp;Phím tắt Ctrl+X</span></a><a
                                                        id="cke_28"
                                                        class="cke_button cke_button__copy cke_button_disabled "
                                                        href="javascript:void(&#39;Sao chép&#39;)"
                                                        title="Sao chép (Ctrl+C)" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_28_label"
                                                        aria-describedby="cke_28_description" aria-haspopup="false"
                                                        aria-disabled="true"
                                                        onkeydown="return CKEDITOR.tools.callFunction(15,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(16,event);"
                                                        onclick="CKEDITOR.tools.callFunction(17,this);return false;"><span
                                                            class="cke_button_icon cke_button__copy_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -264px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_28_label"
                                                            class="cke_button_label cke_button__copy_label"
                                                            aria-hidden="false">Sao chép</span><span
                                                            id="cke_28_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+C</span></a><a
                                                        id="cke_29" class="cke_button cke_button__paste cke_button_off"
                                                        href="javascript:void(&#39;Dán&#39;)" title="Dán (Ctrl+V)"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_29_label"
                                                        aria-describedby="cke_29_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(18,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(19,event);"
                                                        onclick="CKEDITOR.tools.callFunction(20,this);return false;"><span
                                                            class="cke_button_icon cke_button__paste_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -360px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_29_label"
                                                            class="cke_button_label cke_button__paste_label"
                                                            aria-hidden="false">Dán</span><span id="cke_29_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false">&nbsp;Phím tắt Ctrl+V</span></a><a
                                                        id="cke_30"
                                                        class="cke_button cke_button__pastetext cke_button_off"
                                                        href="javascript:void(&#39;Dán theo định dạng văn bản thuần&#39;)"
                                                        title="Dán theo định dạng văn bản thuần (Ctrl+Shift+V)"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_30_label"
                                                        aria-describedby="cke_30_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(21,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(22,event);"
                                                        onclick="CKEDITOR.tools.callFunction(23,this);return false;"><span
                                                            class="cke_button_icon cke_button__pastetext_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1560px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_30_label"
                                                            class="cke_button_label cke_button__pastetext_label"
                                                            aria-hidden="false">Dán theo định dạng văn bản thuần</span><span
                                                            id="cke_30_description" class="cke_button_label"
                                                            aria-hidden="false">&nbsp;Phím
                                      tắt Ctrl+Shift+V</span></a><span class="cke_toolbar_separator"
                                                                       role="separator"></span><a id="cke_31"
                                                                                                  class="cke_button cke_button__undo cke_button_disabled "
                                                                                                  href="javascript:void(&#39;Khôi phục thao tác&#39;)"
                                                                                                  title="Khôi phục thao tác (Ctrl+Z)"
                                                                                                  tabindex="-1"
                                                                                                  hidefocus="true"
                                                                                                  role="button"
                                                                                                  aria-labelledby="cke_31_label"
                                                                                                  aria-describedby="cke_31_description"
                                                                                                  aria-haspopup="false"
                                                                                                  aria-disabled="true"
                                                                                                  onkeydown="return CKEDITOR.tools.callFunction(24,event);"
                                                                                                  onfocus="return CKEDITOR.tools.callFunction(25,event);"
                                                                                                  onclick="CKEDITOR.tools.callFunction(26,this);return false;"><span
                                                            class="cke_button_icon cke_button__undo_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -2016px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_31_label"
                                                            class="cke_button_label cke_button__undo_label"
                                                            aria-hidden="false">Khôi phục thao tác</span><span
                                                            id="cke_31_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+Z</span></a><a
                                                        id="cke_32"
                                                        class="cke_button cke_button__redo cke_button_disabled "
                                                        href="javascript:void(&#39;Làm lại thao tác&#39;)"
                                                        title="Làm lại thao tác (Ctrl+Y)"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_32_label"
                                                        aria-describedby="cke_32_description" aria-haspopup="false"
                                                        aria-disabled="true"
                                                        onkeydown="return CKEDITOR.tools.callFunction(27,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(28,event);"
                                                        onclick="CKEDITOR.tools.callFunction(29,this);return false;"><span
                                                            class="cke_button_icon cke_button__redo_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1968px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_32_label"
                                                            class="cke_button_label cke_button__redo_label"
                                                            aria-hidden="false">Làm lại thao tác</span><span
                                                            id="cke_32_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt
                                      Ctrl+Y</span></a></span><span class="cke_toolbar_end"></span></span><span
                                                id="cke_33" class="cke_toolbar" aria-labelledby="cke_33_label"
                                                role="toolbar"><span
                                                    id="cke_33_label" class="cke_voice_label">Chỉnh sửa</span><span
                                                    class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                           role="presentation"><a
                                                        id="cke_34" class="cke_button cke_button__find cke_button_off"
                                                        href="javascript:void(&#39;Tìm kiếm&#39;)" title="Tìm kiếm"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_34_label"
                                                        aria-describedby="cke_34_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(30,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(31,event);"
                                                        onclick="CKEDITOR.tools.callFunction(32,this);return false;"><span
                                                            class="cke_button_icon cke_button__find_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -576px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_34_label"
                                                            class="cke_button_label cke_button__find_label"
                                                            aria-hidden="false">Tìm kiếm</span><span
                                                            id="cke_34_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_35"
                                                        class="cke_button cke_button__replace cke_button_off"
                                                        href="javascript:void(&#39;Thay thế&#39;)" title="Thay thế"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_35_label"
                                                        aria-describedby="cke_35_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(33,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(34,event);"
                                                        onclick="CKEDITOR.tools.callFunction(35,this);return false;"><span
                                                            class="cke_button_icon cke_button__replace_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -600px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_35_label"
                                                            class="cke_button_label cke_button__replace_label"
                                                            aria-hidden="false">Thay thế</span><span
                                                            id="cke_35_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator" role="separator"></span><a
                                                        id="cke_36"
                                                        class="cke_button cke_button__selectall cke_button_off"
                                                        href="javascript:void(&#39;Chọn tất cả&#39;)"
                                                        title="Chọn tất cả" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_36_label"
                                                        aria-describedby="cke_36_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(36,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(37,event);"
                                                        onclick="CKEDITOR.tools.callFunction(38,this);return false;"><span
                                                            class="cke_button_icon cke_button__selectall_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1752px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_36_label"
                                                            class="cke_button_label cke_button__selectall_label"
                                                            aria-hidden="false">Chọn tất cả</span><span
                                                            id="cke_36_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span
                                                class="cke_toolbar_break"></span><span
                                                id="cke_37" class="cke_toolbar" aria-labelledby="cke_37_label"
                                                role="toolbar"><span
                                                    id="cke_37_label" class="cke_voice_label">Kiểu cơ bản</span><span
                                                    class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                           role="presentation"><a
                                                        id="cke_38" class="cke_button cke_button__bold cke_button_off"
                                                        href="javascript:void(&#39;Đậm&#39;)" title="Đậm (Ctrl+B)"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_38_label"
                                                        aria-describedby="cke_38_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(39,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(40,event);"
                                                        onclick="CKEDITOR.tools.callFunction(41,this);return false;"><span
                                                            class="cke_button_icon cke_button__bold_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -24px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_38_label"
                                                            class="cke_button_label cke_button__bold_label"
                                                            aria-hidden="false">Đậm</span><span id="cke_38_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false">&nbsp;Phím tắt Ctrl+B</span></a><a
                                                        id="cke_39" class="cke_button cke_button__italic cke_button_off"
                                                        href="javascript:void(&#39;Nghiêng&#39;)"
                                                        title="Nghiêng (Ctrl+I)" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_39_label"
                                                        aria-describedby="cke_39_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(42,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(43,event);"
                                                        onclick="CKEDITOR.tools.callFunction(44,this);return false;"><span
                                                            class="cke_button_icon cke_button__italic_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -48px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_39_label"
                                                            class="cke_button_label cke_button__italic_label"
                                                            aria-hidden="false">Nghiêng</span><span
                                                            id="cke_39_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+I</span></a><a
                                                        id="cke_40"
                                                        class="cke_button cke_button__underline cke_button_off"
                                                        href="javascript:void(&#39;Gạch chân&#39;)"
                                                        title="Gạch chân (Ctrl+U)" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_40_label"
                                                        aria-describedby="cke_40_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(45,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(46,event);"
                                                        onclick="CKEDITOR.tools.callFunction(47,this);return false;"><span
                                                            class="cke_button_icon cke_button__underline_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -144px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_40_label"
                                                            class="cke_button_label cke_button__underline_label"
                                                            aria-hidden="false">Gạch chân</span><span
                                                            id="cke_40_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+U</span></a><a
                                                        id="cke_41" class="cke_button cke_button__strike cke_button_off"
                                                        href="javascript:void(&#39;Gạch xuyên ngang&#39;)"
                                                        title="Gạch xuyên ngang"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_41_label"
                                                        aria-describedby="cke_41_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(48,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(49,event);"
                                                        onclick="CKEDITOR.tools.callFunction(50,this);return false;"><span
                                                            class="cke_button_icon cke_button__strike_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -72px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_41_label"
                                                            class="cke_button_label cke_button__strike_label"
                                                            aria-hidden="false">Gạch xuyên ngang</span><span
                                                            id="cke_41_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_42"
                                                        class="cke_button cke_button__subscript cke_button_off"
                                                        href="javascript:void(&#39;Chỉ số dưới&#39;)"
                                                        title="Chỉ số dưới" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_42_label"
                                                        aria-describedby="cke_42_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(51,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(52,event);"
                                                        onclick="CKEDITOR.tools.callFunction(53,this);return false;"><span
                                                            class="cke_button_icon cke_button__subscript_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -96px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_42_label"
                                                            class="cke_button_label cke_button__subscript_label"
                                                            aria-hidden="false">Chỉ số dưới</span><span
                                                            id="cke_42_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_43"
                                                        class="cke_button cke_button__superscript cke_button_off"
                                                        href="javascript:void(&#39;Chỉ số trên&#39;)"
                                                        title="Chỉ số trên" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_43_label"
                                                        aria-describedby="cke_43_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(54,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(55,event);"
                                                        onclick="CKEDITOR.tools.callFunction(56,this);return false;"><span
                                                            class="cke_button_icon cke_button__superscript_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -120px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_43_label"
                                                            class="cke_button_label cke_button__superscript_label"
                                                            aria-hidden="false">Chỉ số trên</span><span
                                                            id="cke_43_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator" role="separator"></span><a
                                                        id="cke_44"
                                                        class="cke_button cke_button__copyformatting cke_button_off"
                                                        href="javascript:void(&#39;Sao chép định dạng&#39;)"
                                                        title="Sao chép định dạng (Ctrl+Shift+C)" tabindex="-1"
                                                        hidefocus="true"
                                                        role="button" aria-labelledby="cke_44_label"
                                                        aria-describedby="cke_44_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(57,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(58,event);"
                                                        onclick="CKEDITOR.tools.callFunction(59,this);return false;"><span
                                                            class="cke_button_icon cke_button__copyformatting_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -480px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_44_label"
                                                            class="cke_button_label cke_button__copyformatting_label"
                                                            aria-hidden="false">Sao chép định dạng</span><span
                                                            id="cke_44_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt
                                      Ctrl+Shift+C</span></a><a id="cke_45"
                                                                class="cke_button cke_button__removeformat cke_button_off"
                                                                href="javascript:void(&#39;Xoá định dạng&#39;)"
                                                                title="Xoá định dạng" tabindex="-1"
                                                                hidefocus="true" role="button"
                                                                aria-labelledby="cke_45_label"
                                                                aria-describedby="cke_45_description"
                                                                aria-haspopup="false" aria-disabled="false"
                                                                onkeydown="return CKEDITOR.tools.callFunction(60,event);"
                                                                onfocus="return CKEDITOR.tools.callFunction(61,event);"
                                                                onclick="CKEDITOR.tools.callFunction(62,this);return false;"><span
                                                            class="cke_button_icon cke_button__removeformat_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1704px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_45_label"
                                                            class="cke_button_label cke_button__removeformat_label"
                                                            aria-hidden="false">Xoá định dạng</span><span
                                                            id="cke_45_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span id="cke_46"
                                                                                                class="cke_toolbar"
                                                                                                aria-labelledby="cke_46_label"
                                                                                                role="toolbar"><span
                                                    id="cke_46_label"
                                                    class="cke_voice_label">Đoạn</span><span
                                                    class="cke_toolbar_start"></span><span
                                                    class="cke_toolgroup" role="presentation"><a id="cke_47"
                                                                                                 class="cke_button cke_button__numberedlist cke_button_off"
                                                                                                 href="javascript:void(&#39;Chèn/Xoá Danh sách có thứ tự&#39;)"
                                                                                                 title="Chèn/Xoá Danh sách có thứ tự"
                                                                                                 tabindex="-1"
                                                                                                 hidefocus="true"
                                                                                                 role="button"
                                                                                                 aria-labelledby="cke_47_label"
                                                                                                 aria-describedby="cke_47_description"
                                                                                                 aria-haspopup="false"
                                                                                                 aria-disabled="false"
                                                                                                 onkeydown="return CKEDITOR.tools.callFunction(63,event);"
                                                                                                 onfocus="return CKEDITOR.tools.callFunction(64,event);"
                                                                                                 onclick="CKEDITOR.tools.callFunction(65,this);return false;"><span
                                                            class="cke_button_icon cke_button__numberedlist_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1392px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_47_label"
                                                            class="cke_button_label cke_button__numberedlist_label"
                                                            aria-hidden="false">Chèn/Xoá Danh sách có thứ tự</span><span
                                                            id="cke_47_description" class="cke_button_label"
                                                            aria-hidden="false"></span></a><a
                                                        id="cke_48"
                                                        class="cke_button cke_button__bulletedlist cke_button_off"
                                                        href="javascript:void(&#39;Chèn/Xoá Danh sách không thứ tự&#39;)"
                                                        title="Chèn/Xoá Danh sách không thứ tự" tabindex="-1"
                                                        hidefocus="true" role="button"
                                                        aria-labelledby="cke_48_label"
                                                        aria-describedby="cke_48_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(66,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(67,event);"
                                                        onclick="CKEDITOR.tools.callFunction(68,this);return false;"><span
                                                            class="cke_button_icon cke_button__bulletedlist_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1344px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_48_label"
                                                            class="cke_button_label cke_button__bulletedlist_label"
                                                            aria-hidden="false">Chèn/Xoá Danh sách không thứ tự</span><span
                                                            id="cke_48_description" class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator"
                                                        role="separator"></span><a id="cke_49"
                                                                                   class="cke_button cke_button__outdent cke_button_disabled "
                                                                                   href="javascript:void(&#39;Dịch ra ngoài&#39;)"
                                                                                   title="Dịch ra ngoài" tabindex="-1"
                                                                                   hidefocus="true" role="button"
                                                                                   aria-labelledby="cke_49_label"
                                                                                   aria-describedby="cke_49_description"
                                                                                   aria-haspopup="false"
                                                                                   aria-disabled="true"
                                                                                   onkeydown="return CKEDITOR.tools.callFunction(69,event);"
                                                                                   onfocus="return CKEDITOR.tools.callFunction(70,event);"
                                                                                   onclick="CKEDITOR.tools.callFunction(71,this);return false;"><span
                                                            class="cke_button_icon cke_button__outdent_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1056px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_49_label"
                                                            class="cke_button_label cke_button__outdent_label"
                                                            aria-hidden="false">Dịch ra ngoài</span><span
                                                            id="cke_49_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_50"
                                                        class="cke_button cke_button__indent cke_button_off"
                                                        href="javascript:void(&#39;Dịch vào trong&#39;)"
                                                        title="Dịch vào trong"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_50_label"
                                                        aria-describedby="cke_50_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(72,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(73,event);"
                                                        onclick="CKEDITOR.tools.callFunction(74,this);return false;"><span
                                                            class="cke_button_icon cke_button__indent_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1008px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_50_label"
                                                            class="cke_button_label cke_button__indent_label"
                                                            aria-hidden="false">Dịch vào trong</span><span
                                                            id="cke_50_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator" role="separator"></span><a
                                                        id="cke_51"
                                                        class="cke_button cke_button__blockquote cke_button_off"
                                                        href="javascript:void(&#39;Khối trích dẫn&#39;)"
                                                        title="Khối trích dẫn"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_51_label"
                                                        aria-describedby="cke_51_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(75,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(76,event);"
                                                        onclick="CKEDITOR.tools.callFunction(77,this);return false;"><span
                                                            class="cke_button_icon cke_button__blockquote_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -216px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_51_label"
                                                            class="cke_button_label cke_button__blockquote_label"
                                                            aria-hidden="false">Khối trích dẫn</span><span
                                                            id="cke_51_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator" role="separator"></span><a
                                                        id="cke_52"
                                                        class="cke_button cke_button__justifyleft cke_button_off"
                                                        href="javascript:void(&#39;Canh trái&#39;)" title="Canh trái"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_52_label"
                                                        aria-describedby="cke_52_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(78,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(79,event);"
                                                        onclick="CKEDITOR.tools.callFunction(80,this);return false;"><span
                                                            class="cke_button_icon cke_button__justifyleft_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1152px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_52_label"
                                                            class="cke_button_label cke_button__justifyleft_label"
                                                            aria-hidden="false">Canh trái</span><span
                                                            id="cke_52_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_53"
                                                        class="cke_button cke_button__justifycenter cke_button_off"
                                                        href="javascript:void(&#39;Giữa&#39;)" title="Giữa"
                                                        tabindex="-1" hidefocus="true"
                                                        role="button" aria-labelledby="cke_53_label"
                                                        aria-describedby="cke_53_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(81,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(82,event);"
                                                        onclick="CKEDITOR.tools.callFunction(83,this);return false;"><span
                                                            class="cke_button_icon cke_button__justifycenter_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1128px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_53_label"
                                                            class="cke_button_label cke_button__justifycenter_label"
                                                            aria-hidden="false">Giữa</span><span id="cke_53_description"
                                                                                                 class="cke_button_label"
                                                                                                 aria-hidden="false"></span></a><a
                                                        id="cke_54"
                                                        class="cke_button cke_button__justifyright cke_button_off"
                                                        href="javascript:void(&#39;Canh phải&#39;)" title="Canh phải"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_54_label"
                                                        aria-describedby="cke_54_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(84,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(85,event);"
                                                        onclick="CKEDITOR.tools.callFunction(86,this);return false;"><span
                                                            class="cke_button_icon cke_button__justifyright_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1176px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_54_label"
                                                            class="cke_button_label cke_button__justifyright_label"
                                                            aria-hidden="false">Canh phải</span><span
                                                            id="cke_54_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_55"
                                                        class="cke_button cke_button__justifyblock cke_button_off"
                                                        href="javascript:void(&#39;Sắp chữ&#39;)" title="Sắp chữ"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_55_label"
                                                        aria-describedby="cke_55_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(87,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(88,event);"
                                                        onclick="CKEDITOR.tools.callFunction(89,this);return false;"><span
                                                            class="cke_button_icon cke_button__justifyblock_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1104px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_55_label"
                                                            class="cke_button_label cke_button__justifyblock_label"
                                                            aria-hidden="false">Sắp chữ</span><span
                                                            id="cke_55_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a><span
                                                        class="cke_toolbar_separator" role="separator"></span><a
                                                        id="cke_56"
                                                        class="cke_button cke_button__bidiltr cke_button_off"
                                                        href="javascript:void(&#39;Văn bản hướng từ trái sang phải&#39;)"
                                                        title="Văn bản hướng từ trái sang phải" tabindex="-1"
                                                        hidefocus="true" role="button"
                                                        aria-labelledby="cke_56_label"
                                                        aria-describedby="cke_56_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(90,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(91,event);"
                                                        onclick="CKEDITOR.tools.callFunction(92,this);return false;"><span
                                                            class="cke_button_icon cke_button__bidiltr_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -168px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_56_label"
                                                            class="cke_button_label cke_button__bidiltr_label"
                                                            aria-hidden="false">Văn bản hướng từ trái sang phải</span><span
                                                            id="cke_56_description" class="cke_button_label"
                                                            aria-hidden="false"></span></a><a
                                                        id="cke_57"
                                                        class="cke_button cke_button__bidirtl cke_button_off"
                                                        href="javascript:void(&#39;Văn bản hướng từ phải sang trái&#39;)"
                                                        title="Văn bản hướng từ phải sang trái" tabindex="-1"
                                                        hidefocus="true" role="button"
                                                        aria-labelledby="cke_57_label"
                                                        aria-describedby="cke_57_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(93,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(94,event);"
                                                        onclick="CKEDITOR.tools.callFunction(95,this);return false;"><span
                                                            class="cke_button_icon cke_button__bidirtl_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -192px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_57_label"
                                                            class="cke_button_label cke_button__bidirtl_label"
                                                            aria-hidden="false">Văn bản hướng từ phải sang trái</span><span
                                                            id="cke_57_description" class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span id="cke_58"
                                                                                                class="cke_toolbar"
                                                                                                aria-labelledby="cke_58_label"
                                                                                                role="toolbar"><span
                                                    id="cke_58_label"
                                                    class="cke_voice_label">Liên kết</span><span
                                                    class="cke_toolbar_start"></span><span
                                                    class="cke_toolgroup" role="presentation"><a id="cke_59"
                                                                                                 class="cke_button cke_button__link cke_button_off"
                                                                                                 href="javascript:void(&#39;Chèn/Sửa liên kết&#39;)"
                                                                                                 title="Chèn/Sửa liên kết (Ctrl+K)"
                                                                                                 tabindex="-1"
                                                                                                 hidefocus="true"
                                                                                                 role="button"
                                                                                                 aria-labelledby="cke_59_label"
                                                                                                 aria-describedby="cke_59_description"
                                                                                                 aria-haspopup="false"
                                                                                                 aria-disabled="false"
                                                                                                 onkeydown="return CKEDITOR.tools.callFunction(96,event);"
                                                                                                 onfocus="return CKEDITOR.tools.callFunction(97,event);"
                                                                                                 onclick="CKEDITOR.tools.callFunction(98,this);return false;"><span
                                                            class="cke_button_icon cke_button__link_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1272px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_59_label"
                                                            class="cke_button_label cke_button__link_label"
                                                            aria-hidden="false">Chèn/Sửa liên kết</span><span
                                                            id="cke_59_description"
                                                            class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+K</span></a><a
                                                        id="cke_60"
                                                        class="cke_button cke_button__unlink cke_button_disabled "
                                                        href="javascript:void(&#39;Xoá liên kết&#39;)"
                                                        title="Xoá liên kết" tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_60_label"
                                                        aria-describedby="cke_60_description" aria-haspopup="false"
                                                        aria-disabled="true"
                                                        onkeydown="return CKEDITOR.tools.callFunction(99,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(100,event);"
                                                        onclick="CKEDITOR.tools.callFunction(101,this);return false;"><span
                                                            class="cke_button_icon cke_button__unlink_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1296px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_60_label"
                                                            class="cke_button_label cke_button__unlink_label"
                                                            aria-hidden="false">Xoá liên kết</span><span
                                                            id="cke_60_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_61"
                                                        class="cke_button cke_button__anchor cke_button_off"
                                                        href="javascript:void(&#39;Chèn/Sửa điểm neo&#39;)"
                                                        title="Chèn/Sửa điểm neo"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_61_label"
                                                        aria-describedby="cke_61_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(102,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(103,event);"
                                                        onclick="CKEDITOR.tools.callFunction(104,this);return false;"><span
                                                            class="cke_button_icon cke_button__anchor_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1248px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_61_label"
                                                            class="cke_button_label cke_button__anchor_label"
                                                            aria-hidden="false">Chèn/Sửa điểm neo</span><span
                                                            id="cke_61_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span id="cke_62"
                                                                                                class="cke_toolbar cke_toolbar_last"
                                                                                                aria-labelledby="cke_62_label"
                                                                                                role="toolbar"><span
                                                    id="cke_62_label" class="cke_voice_label">Chèn</span><span
                                                    class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                           role="presentation"><a
                                                        id="cke_63" class="cke_button cke_button__image cke_button_off"
                                                        href="javascript:void(&#39;Hình ảnh&#39;)" title="Hình ảnh"
                                                        tabindex="-1"
                                                        hidefocus="true" role="button" aria-labelledby="cke_63_label"
                                                        aria-describedby="cke_63_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(105,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(106,event);"
                                                        onclick="CKEDITOR.tools.callFunction(107,this);return false;"><span
                                                            class="cke_button_icon cke_button__image_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -960px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_63_label"
                                                            class="cke_button_label cke_button__image_label"
                                                            aria-hidden="false">Hình ảnh</span><span
                                                            id="cke_63_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_64"
                                                        class="cke_button cke_button__table cke_button_off"
                                                        href="javascript:void(&#39;Bảng&#39;)" title="Bảng"
                                                        tabindex="-1" hidefocus="true"
                                                        role="button" aria-labelledby="cke_64_label"
                                                        aria-describedby="cke_64_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(108,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(109,event);"
                                                        onclick="CKEDITOR.tools.callFunction(110,this);return false;"><span
                                                            class="cke_button_icon cke_button__table_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1920px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_64_label"
                                                            class="cke_button_label cke_button__table_label"
                                                            aria-hidden="false">Bảng</span><span id="cke_64_description"
                                                                                                 class="cke_button_label"
                                                                                                 aria-hidden="false"></span></a><a
                                                        id="cke_65"
                                                        class="cke_button cke_button__horizontalrule cke_button_off"
                                                        href="javascript:void(&#39;Chèn đường phân cách ngang&#39;)"
                                                        title="Chèn đường phân cách ngang" tabindex="-1"
                                                        hidefocus="true" role="button"
                                                        aria-labelledby="cke_65_label"
                                                        aria-describedby="cke_65_description"
                                                        aria-haspopup="false" aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(111,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(112,event);"
                                                        onclick="CKEDITOR.tools.callFunction(113,this);return false;"><span
                                                            class="cke_button_icon cke_button__horizontalrule_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -912px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_65_label"
                                                            class="cke_button_label cke_button__horizontalrule_label"
                                                            aria-hidden="false">Chèn đường phân cách ngang</span><span
                                                            id="cke_65_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_66"
                                                        class="cke_button cke_button__specialchar cke_button_off"
                                                        href="javascript:void(&#39;Chèn ký tự đặc biệt&#39;)"
                                                        title="Chèn ký tự đặc biệt"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_66_label"
                                                        aria-describedby="cke_66_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(114,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(115,event);"
                                                        onclick="CKEDITOR.tools.callFunction(116,this);return false;"><span
                                                            class="cke_button_icon cke_button__specialchar_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1872px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_66_label"
                                                            class="cke_button_label cke_button__specialchar_label"
                                                            aria-hidden="false">Chèn ký tự đặc biệt</span><span
                                                            id="cke_66_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_67"
                                                        class="cke_button cke_button__pagebreak cke_button_off"
                                                        href="javascript:void(&#39;Chèn ngắt trang&#39;)"
                                                        title="Chèn ngắt trang"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_67_label"
                                                        aria-describedby="cke_67_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(117,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(118,event);"
                                                        onclick="CKEDITOR.tools.callFunction(119,this);return false;"><span
                                                            class="cke_button_icon cke_button__pagebreak_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1512px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_67_label"
                                                            class="cke_button_label cke_button__pagebreak_label"
                                                            aria-hidden="false">Chèn ngắt trang</span><span
                                                            id="cke_67_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span
                                                class="cke_toolbar_break"></span><span
                                                id="cke_68" class="cke_toolbar" aria-labelledby="cke_68_label"
                                                role="toolbar"><span
                                                    id="cke_68_label" class="cke_voice_label">Kiểu</span><span
                                                    class="cke_toolbar_start"></span><span id="cke_18"
                                                                                           class="cke_combo cke_combo__styles cke_combo_off"
                                                                                           role="presentation"><span
                                                        id="cke_18_label" class="cke_combo_label">Kiểu</span><a
                                                        class="cke_combo_button"
                                                        title="Phong cách định dạng" tabindex="-1"
                                                        href="javascript:void(&#39;Phong cách định dạng&#39;)"
                                                        hidefocus="true"
                                                        role="button" aria-labelledby="cke_18_label"
                                                        aria-haspopup="listbox"
                                                        onkeydown="return CKEDITOR.tools.callFunction(121,event,this);"
                                                        onfocus="return CKEDITOR.tools.callFunction(122,event);"
                                                        onclick="CKEDITOR.tools.callFunction(120,this);return false;"
                                                        aria-expanded="false"><span id="cke_18_text"
                                                                                    class="cke_combo_text cke_combo_inlinelabel">Kiểu</span><span
                                                            class="cke_combo_open"><span
                                                                class="cke_combo_arrow"></span></span></a></span><span
                                                    id="cke_19"
                                                    class="cke_combo cke_combo__format cke_combo_off"
                                                    role="presentation"><span
                                                        id="cke_19_label" class="cke_combo_label">Định dạng</span><a
                                                        class="cke_combo_button" title="Định dạng" tabindex="-1"
                                                        href="javascript:void(&#39;Định dạng&#39;)" hidefocus="true"
                                                        role="button"
                                                        aria-labelledby="cke_19_label" aria-haspopup="listbox"
                                                        onkeydown="return CKEDITOR.tools.callFunction(124,event,this);"
                                                        onfocus="return CKEDITOR.tools.callFunction(125,event);"
                                                        onclick="CKEDITOR.tools.callFunction(123,this);return false;"
                                                        aria-expanded="false"><span id="cke_19_text"
                                                                                    class="cke_combo_text cke_combo_inlinelabel">Định dạng</span><span
                                                            class="cke_combo_open"><span
                                                                class="cke_combo_arrow"></span></span></a></span><span
                                                    id="cke_20"
                                                    class="cke_combo cke_combo__font cke_combo_off" role="presentation"><span
                                                        id="cke_20_label" class="cke_combo_label">Phông</span><a
                                                        class="cke_combo_button"
                                                        title="Phông" tabindex="-1"
                                                        href="javascript:void(&#39;Phông&#39;)" hidefocus="true"
                                                        role="button" aria-labelledby="cke_20_label"
                                                        aria-haspopup="listbox"
                                                        onkeydown="return CKEDITOR.tools.callFunction(127,event,this);"
                                                        onfocus="return CKEDITOR.tools.callFunction(128,event);"
                                                        onclick="CKEDITOR.tools.callFunction(126,this);return false;"
                                                        aria-expanded="false"><span id="cke_20_text"
                                                                                    class="cke_combo_text cke_combo_inlinelabel">Phông</span><span
                                                            class="cke_combo_open"><span
                                                                class="cke_combo_arrow"></span></span></a></span><span
                                                    id="cke_21"
                                                    class="cke_combo cke_combo__fontsize cke_combo_off"
                                                    role="presentation"><span
                                                        id="cke_21_label" class="cke_combo_label">Cỡ chữ</span><a
                                                        class="cke_combo_button"
                                                        title="Cỡ chữ" tabindex="-1"
                                                        href="javascript:void(&#39;Cỡ chữ&#39;)"
                                                        hidefocus="true" role="button" aria-labelledby="cke_21_label"
                                                        aria-haspopup="listbox"
                                                        onkeydown="return CKEDITOR.tools.callFunction(130,event,this);"
                                                        onfocus="return CKEDITOR.tools.callFunction(131,event);"
                                                        onclick="CKEDITOR.tools.callFunction(129,this);return false;"
                                                        aria-expanded="false"><span id="cke_21_text"
                                                                                    class="cke_combo_text cke_combo_inlinelabel">Cỡ chữ</span><span
                                                            class="cke_combo_open"><span
                                                                class="cke_combo_arrow"></span></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span id="cke_69"
                                                                                                class="cke_toolbar"
                                                                                                aria-labelledby="cke_69_label"
                                                                                                role="toolbar"><span
                                                    id="cke_69_label"
                                                    class="cke_voice_label">Màu sắc</span><span
                                                    class="cke_toolbar_start"></span><span
                                                    class="cke_toolgroup" role="presentation"><a id="cke_70"
                                                                                                 class="cke_button cke_button__textcolor cke_button_expandable cke_button_off"
                                                                                                 href="javascript:void(&#39;Màu chữ&#39;)"
                                                                                                 title="Màu chữ"
                                                                                                 tabindex="-1"
                                                                                                 hidefocus="true"
                                                                                                 role="button"
                                                                                                 aria-labelledby="cke_70_label"
                                                                                                 aria-describedby="cke_70_description"
                                                                                                 aria-haspopup="listbox"
                                                                                                 aria-disabled="false"
                                                                                                 onkeydown="return CKEDITOR.tools.callFunction(132,event);"
                                                                                                 onfocus="return CKEDITOR.tools.callFunction(133,event);"
                                                                                                 onclick="CKEDITOR.tools.callFunction(134,this);return false;"
                                                                                                 aria-expanded="false"><span
                                                            class="cke_button_icon cke_button__textcolor_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -408px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_70_label"
                                                            class="cke_button_label cke_button__textcolor_label"
                                                            aria-hidden="false">Màu chữ</span><span
                                                            id="cke_70_description"
                                                            class="cke_button_label" aria-hidden="false"></span><span
                                                            class="cke_button_arrow"></span></a><a id="cke_71"
                                                                                                   class="cke_button cke_button__bgcolor cke_button_expandable cke_button_off"
                                                                                                   href="javascript:void(&#39;Màu nền&#39;)"
                                                                                                   title="Màu nền"
                                                                                                   tabindex="-1"
                                                                                                   hidefocus="true"
                                                                                                   role="button"
                                                                                                   aria-labelledby="cke_71_label"
                                                                                                   aria-describedby="cke_71_description"
                                                                                                   aria-haspopup="listbox"
                                                                                                   aria-disabled="false"
                                                                                                   onkeydown="return CKEDITOR.tools.callFunction(135,event);"
                                                                                                   onfocus="return CKEDITOR.tools.callFunction(136,event);"
                                                                                                   onclick="CKEDITOR.tools.callFunction(137,this);return false;"
                                                                                                   aria-expanded="false"><span
                                                            class="cke_button_icon cke_button__bgcolor_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -384px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_71_label"
                                                            class="cke_button_label cke_button__bgcolor_label"
                                                            aria-hidden="false">Màu nền</span><span
                                                            id="cke_71_description"
                                                            class="cke_button_label" aria-hidden="false"></span><span
                                                            class="cke_button_arrow"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span><span id="cke_72"
                                                                                                class="cke_toolbar"
                                                                                                aria-labelledby="cke_72_label"
                                                                                                role="toolbar"><span
                                                    id="cke_72_label"
                                                    class="cke_voice_label">Công cụ</span><span
                                                    class="cke_toolbar_start"></span><span
                                                    class="cke_toolgroup" role="presentation"><a id="cke_73"
                                                                                                 class="cke_button cke_button__maximize cke_button_off"
                                                                                                 href="javascript:void(&#39;Phóng to tối đa&#39;)"
                                                                                                 title="Phóng to tối đa"
                                                                                                 tabindex="-1"
                                                                                                 hidefocus="true"
                                                                                                 role="button"
                                                                                                 aria-labelledby="cke_73_label"
                                                                                                 aria-describedby="cke_73_description"
                                                                                                 aria-haspopup="false"
                                                                                                 aria-disabled="false"
                                                                                                 onkeydown="return CKEDITOR.tools.callFunction(138,event);"
                                                                                                 onfocus="return CKEDITOR.tools.callFunction(139,event);"
                                                                                                 onclick="CKEDITOR.tools.callFunction(140,this);return false;"><span
                                                            class="cke_button_icon cke_button__maximize_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1416px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_73_label"
                                                            class="cke_button_label cke_button__maximize_label"
                                                            aria-hidden="false">Phóng to tối đa</span><span
                                                            id="cke_73_description"
                                                            class="cke_button_label" aria-hidden="false"></span></a><a
                                                        id="cke_74"
                                                        class="cke_button cke_button__showblocks cke_button_off"
                                                        href="javascript:void(&#39;Hiển thị các khối&#39;)"
                                                        title="Hiển thị các khối"
                                                        tabindex="-1" hidefocus="true" role="button"
                                                        aria-labelledby="cke_74_label"
                                                        aria-describedby="cke_74_description" aria-haspopup="false"
                                                        aria-disabled="false"
                                                        onkeydown="return CKEDITOR.tools.callFunction(141,event);"
                                                        onfocus="return CKEDITOR.tools.callFunction(142,event);"
                                                        onclick="CKEDITOR.tools.callFunction(143,this);return false;"><span
                                                            class="cke_button_icon cke_button__showblocks_icon"
                                                            style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1800px;background-size:auto;">&nbsp;</span><span
                                                            id="cke_74_label"
                                                            class="cke_button_label cke_button__showblocks_label"
                                                            aria-hidden="false">Hiển thị các khối</span><span
                                                            id="cke_74_description"
                                                            class="cke_button_label"
                                                            aria-hidden="false"></span></a></span><span
                                                    class="cke_toolbar_end"></span></span></span></span>
                                    <div id="cke_1_contents" class="cke_contents cke_reset" role="presentation"
                                         style="height: 200px;">
                                        <iframe
                                            src="./VNSMARTTOL.COM _ Hệ thống Seeding hàng đầu Việt Nam_files/saved_resource.html"
                                            frameborder="0" class="cke_wysiwyg_frame cke_reset"
                                            style="width: 100%; height: 100%;"
                                            title="Bộ soạn thảo văn bản có định dạng, notify_content" tabindex="0"
                                            allowtransparency="true"></iframe>
                                    </div>
                                    <span id="cke_1_bottom"
                                          class="cke_bottom cke_reset_all" role="presentation"
                                          style="user-select: none;"><span
                                            id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr"
                                            title="Kéo rê để thay đổi kích cỡ"
                                            onmousedown="CKEDITOR.tools.callFunction(2, event)">◢</span><span
                                            id="cke_1_path_label"
                                            class="cke_voice_label">Nhãn thành phần</span><span id="cke_1_path"
                                                                                                class="cke_path"
                                                                                                role="group"
                                                                                                aria-labelledby="cke_1_path_label"><span
                                                class="cke_path_empty">&nbsp;</span></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Hoàn tất</button>
                        </div>
                    </form>
                    <!--end::Form-->

                    <hr>

                    <div class="table-responsive">
                        <div id="datatable-notifications_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="datatable-notifications_length"><label>Xem
                                            <select
                                                name="datatable-notifications_length"
                                                aria-controls="datatable-notifications"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> mục</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable-notifications_filter" class="dataTables_filter"><label>Tìm:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="datatable-notifications"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable no-footer"
                                           id="datatable-notifications" role="grid"
                                           aria-describedby="datatable-notifications_info"
                                           style="width: 1495px;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_desc" tabindex="0"
                                                aria-controls="datatable-notifications"
                                                rowspan="1" colspan="1" style="width: 46px;" aria-sort="descending"
                                                aria-label="STT: activate to sort column ascending">STT
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-notifications"
                                                rowspan="1"
                                                colspan="1" style="width: 322px;"
                                                aria-label="Hình ảnh: activate to sort column ascending">Hình ảnh
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-notifications"
                                                rowspan="1"
                                                colspan="1" style="width: 376px;"
                                                aria-label="Nội dung: activate to sort column ascending">Nội dung
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-notifications"
                                                rowspan="1"
                                                colspan="1" style="width: 77px;"
                                                aria-label="Hiển thị: activate to sort column ascending">Hiển thị
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-notifications"
                                                rowspan="1"
                                                colspan="1" style="width: 57px;"
                                                aria-label="Ghim: activate to sort column ascending">
                                                Ghim
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-notifications"
                                                rowspan="1"
                                                colspan="1" style="width: 200px;"
                                                aria-label="Thời gian: activate to sort column ascending">Thời gian
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 111px;"
                                                aria-label="Hành Động">Hành Động
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><span
                                                    class="text-success text-bold id-2316">2316</span></td>
                                            <td><img class="table-image"
                                                     src="./VNSMARTTOL.COM _ Hệ thống Seeding hàng đầu Việt Nam_files/1639407050317_2RgcADA9Va.jpeg"
                                                     alt=""></td>
                                            <td>
                                                <div class="notify_content custom-scroll">
                                                    <p><span style="color:#e74c3c"><strong>Chào mừng bạn tới website số 1 VN.<br>Cung
                                          cấp các giải pháp markerting digital</strong></span></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input custom-sw"
                                                           data-key="is_visible"
                                                           data-id="2316" checked="" id="is_visible_sw_2316">
                                                    <label class="custom-control-label"
                                                           for="is_visible_sw_2316"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input custom-sw"
                                                           data-key="is_pin"
                                                           data-id="2316" id="is_pin_sw_2316">
                                                    <label class="custom-control-label" for="is_pin_sw_2316"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-success">19:39:56 15/05/2023</button>
                                            </td>
                                            <td>
                                                <button data-id="2316" class="btn btn-icon btn-edit-notify" title=""
                                                        data-original-title="Sửa">
                                                    <i class="fas fa-edit text-success"></i>
                                                </button>
                                                <button data-id="2316" class="btn btn-icon btn-delete-notify" title=""
                                                        data-original-title="Xóa">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div id="datatable-notifications_processing" class="dataTables_processing card"
                                         style="display: none;">Đang xử lý...
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="datatable-notifications_info" role="status"
                                         aria-live="polite">Đang xem 1 đến 1 trong tổng số 1 mục
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="datatable-notifications_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="datatable-notifications_previous"><a
                                                    href="https://vnsmarttol.com/qladmin/notifications#"
                                                    aria-controls="datatable-notifications" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Trước</a></li>
                                            <li class="paginate_button page-item active"><a
                                                    href="https://vnsmarttol.com/qladmin/notifications#"
                                                    aria-controls="datatable-notifications" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item next disabled"
                                                id="datatable-notifications_next"><a
                                                    href="https://vnsmarttol.com/qladmin/notifications#"
                                                    aria-controls="datatable-notifications" data-dt-idx="2" tabindex="0"
                                                    class="page-link">Tiếp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab_2" role="tabpanel" data-select2-id="tab_2">
                    <form class="form-json" method="POST" action="https://vnsmarttol.com/qladmin/user_notifications/"
                          data-table="UserNotification" data-validator="checkNotifyBeforeSubmit" data-select2-id="8">
                        <div class="row" data-select2-id="7">
                            <div class="col-sm-6 col-lg-6" data-select2-id="6">
                                <div class="form-group select-full-width" data-select2-id="5">
                                    <label>Người nhận</label>
                                    <select name="user_id" class="form-control custom-select2 select2-hidden-accessible"
                                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="3"></option>
                                        <option value="0" data-select2-id="16">Toàn Hệ Thống</option>

                                        <optgroup label="Theo loại" data-select2-id="17">
                                            <option value="-50" data-select2-id="18">Khách hàng mới</option>
                                            <option value="-51" data-select2-id="19">Admin web đại lý</option>
                                        </optgroup>

                                        <optgroup label="Theo cấp độ" data-select2-id="20">

                                            <option value="-30" data-select2-id="21">Thành Viên</option>

                                            <option value="-29" data-select2-id="22">Cộng tác viên</option>

                                            <option value="-28" data-select2-id="23">Đại lý</option>

                                            <option value="-27" data-select2-id="24">Nhà phân phối</option>

                                        </optgroup>

                                        <optgroup label="Theo loại Telegram" data-select2-id="25">
                                            <option value="-10" data-select2-id="26">Chưa liên kết Telegram</option>
                                            <option value="-11" data-select2-id="27">Đã liên kết Telegram</option>
                                        </optgroup>

                                        <optgroup label="Theo user" data-select2-id="28">

                                            <option value="679093" data-select2-id="29">temisvn - 376,842 VNĐ</option>

                                            <option value="733850" data-select2-id="30">admin_test - 13,481 VNĐ</option>

                                        </optgroup>
                                    </select><span
                                        class="select2 select2-container select2-container--default select2-container--below"
                                        dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span
                                                class="select2-selection select2-selection--single" role="combobox"
                                                aria-haspopup="true"
                                                aria-expanded="false" tabindex="0"
                                                aria-labelledby="select2-user_id-14-container"><span
                                                    class="select2-selection__rendered"
                                                    id="select2-user_id-14-container" role="textbox"
                                                    aria-readonly="true"><span class="select2-selection__placeholder">Chọn tài
                                    khoản</span></span><span class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span
                                            class="dropdown-wrapper"
                                            aria-hidden="true"></span></span>

                                    <div id="error_user_0" style="display: none" class="text-danger mt-1">Vui lòng kiểm
                                        tra kỹ nội
                                        dung trước khi lưu.
                                        Nếu tạo sai nội dung thì không thể xoá hàng loạt mà chỉ có thể xoá riêng lẻ cho
                                        từng người
                                        dùng
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Loại thông báo</label>
                                    <select class="form-control" name="type">
                                        <option value="notify_popup">Thông báo (Có hiện nổi bật)</option>
                                        <option value="notify">Thông báo (Không hiện nổi bật)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nội dung thông báo</label>
                            <textarea class="form-control" name="content" required="" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="mb-3 alert alert-primary">
                                Thời gian tạo thông báo "Toàn hệ thống" sẽ hơi lâu chút vì cần tạo bản ghi cho từng user
                            </div>

                            <button class="btn btn-success text-bold">Hoàn tất</button>
                        </div>

                    </form>

                    <hr>

                    <h5 class="text-success mb-3">Danh sách thông báo</h5>

                    <div class="mb-3 alert alert-primary">
                        Một số thông báo sẽ được tạo tự động như: Nạp tiền, hoàn tiền...
                        Bạn có thể sửa lại thông báo đó trong bảng bên dưới
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable-user-notifications"></table>
                    </div>
                </div>

                <div class="tab-pane" id="tab_3" role="tabpanel">
                    <h6><span class="text-danger mb-4">Tổng số tài khoản Telegram đã kết nối: 0</span></h6>

                    <form class="form-json" action="https://vnsmarttol.com/qladmin/notifications/send_telegram">
                        <div class="form-group">
                            <label>Link Ảnh (tuỳ chọn)</label>
                            <input class="form-control" name="image" type="url">

                            <div class="alert alert-warning mt-2">
                                Website hỗ trợ get link ảnh: <a href="https://linkanh.xyz/" target="_blank">Tại Đây</a>

                                Lưu ý: Nếu bạn đính kèm ảnh, vui lòng gửi link ảnh cho Bot
                                <a href="https://telegram.me/webpagebot" target="_blank">Bot Telegram</a>
                                trước để tránh bị lỗi khi gửi ảnh tới user telegram
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nội dung thông báo</label>
                            <textarea class="form-control" name="content" rows="5" required=""></textarea>
                        </div>

                        <button class="btn btn-success">Hoàn tất</button>
                    </form>

                </div>

                <div class="tab-pane" id="tab_4" role="tabpanel">
                    <form class="form-json" method="POST"
                          action="https://vnsmarttol.com/qladmin/notifications/notify_new_user"
                          data-table="UserNotification">

                        <div class="form-group">
                            <label>Nội dung thông báo</label>
                            <textarea class="form-control" name="notify_new_user" rows="5"></textarea>
                        </div>

                        <div class="alert alert-primary">
                            Khi người dùng đăng ký tài khoản xong, hệ thống sẽ tạo một thông báo popup cho người dùng
                            với nội
                            dung bạn nhập ở trên
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
<div class="modal fade" id="modalEditNotify" tabindex="-1" role="dialog" aria-hidden="true"
     style="opacity: 1; overflow: visible;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form class="form-json" method="POST" action="https://vnsmarttol.com/qladmin/notifications/"
                  data-table="Notification">
                <input type="hidden" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Link Ảnh (tuỳ chọn)</label>
                        <input class="form-control" name="image" type="url" maxlength="240">

                        <div class="alert alert-warning mt-2">
                            Website hỗ trợ get link ảnh: <a href="https://linkanh.xyz/" target="_blank">Tại Đây</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ghim</label>
                        <select name="is_pin" class="form-control">
                            <option value="0">Không</option>
                            <option value="1">Có</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Hiển thị</label>
                        <select name="is_visible" class="form-control">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nội dung thông báo</label>
                        <textarea class="form-control" name="content" id="notify_content_update" rows="5"
                                  style="visibility: hidden; display: none;"></textarea>
                        <div id="cke_notify_content_update"
                             class="cke_2 cke cke_reset cke_chrome cke_editor_notify_content_update cke_ltr cke_browser_webkit"
                             dir="ltr" lang="vi" role="application" aria-labelledby="cke_notify_content_update_arialbl"><span
                                id="cke_notify_content_update_arialbl" class="cke_voice_label">Bộ soạn thảo văn bản có định
                        dạng, notify_content_update</span>
                            <div class="cke_inner cke_reset" role="presentation"><span id="cke_2_top"
                                                                                       class="cke_top cke_reset_all"
                                                                                       role="presentation"
                                                                                       style="height: auto; user-select: none;"><span
                                        id="cke_90" class="cke_voice_label">Thanh công
                            cụ</span><span id="cke_2_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_90"
                                           onmousedown="return false;"><span id="cke_95" class="cke_toolbar"
                                                                             aria-labelledby="cke_95_label"
                                                                             role="toolbar"><span id="cke_95_label"
                                                                                                  class="cke_voice_label">Tài liệu</span><span
                                                class="cke_toolbar_start"></span><span
                                                class="cke_toolgroup" role="presentation"><a id="cke_96"
                                                                                             class="cke_button cke_button__source cke_button_off"
                                                                                             href="javascript:void(&#39;Mã HTML&#39;)"
                                                                                             title="Mã HTML"
                                                                                             tabindex="-1"
                                                                                             hidefocus="true"
                                                                                             role="button"
                                                                                             aria-labelledby="cke_96_label"
                                                                                             aria-describedby="cke_96_description"
                                                                                             aria-haspopup="false"
                                                                                             aria-disabled="false"
                                                                                             onkeydown="return CKEDITOR.tools.callFunction(150,event);"
                                                                                             onfocus="return CKEDITOR.tools.callFunction(151,event);"
                                                                                             onclick="CKEDITOR.tools.callFunction(152,this);return false;"><span
                                                        class="cke_button_icon cke_button__source_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1848px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_96_label"
                                                        class="cke_button_label cke_button__source_label"
                                                        aria-hidden="false">Mã HTML</span><span id="cke_96_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator" role="separator"></span><a id="cke_97"
                                                                                                             class="cke_button cke_button__newpage cke_button_off"
                                                                                                             href="javascript:void(&#39;Trang mới&#39;)"
                                                                                                             title="Trang mới"
                                                                                                             tabindex="-1"
                                                                                                             hidefocus="true"
                                                                                                             role="button"
                                                                                                             aria-labelledby="cke_97_label"
                                                                                                             aria-describedby="cke_97_description"
                                                                                                             aria-haspopup="false"
                                                                                                             aria-disabled="false"
                                                                                                             onkeydown="return CKEDITOR.tools.callFunction(153,event);"
                                                                                                             onfocus="return CKEDITOR.tools.callFunction(154,event);"
                                                                                                             onclick="CKEDITOR.tools.callFunction(155,this);return false;"><span
                                                        class="cke_button_icon cke_button__newpage_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1464px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_97_label"
                                                        class="cke_button_label cke_button__newpage_label"
                                                        aria-hidden="false">Trang mới</span><span
                                                        id="cke_97_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_98"
                                                    class="cke_button cke_button__preview cke_button_off"
                                                    href="javascript:void(&#39;Xem trước&#39;)" title="Xem trước"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_98_label"
                                                    aria-describedby="cke_98_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(156,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(157,event);"
                                                    onclick="CKEDITOR.tools.callFunction(158,this);return false;"><span
                                                        class="cke_button_icon cke_button__preview_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1656px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_98_label"
                                                        class="cke_button_label cke_button__preview_label"
                                                        aria-hidden="false">Xem trước</span><span
                                                        id="cke_98_description"
                                                        class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span id="cke_99"
                                                                                            class="cke_toolbar"
                                                                                            aria-labelledby="cke_99_label"
                                                                                            role="toolbar"><span
                                                id="cke_99_label"
                                                class="cke_voice_label">Clipboard/Undo</span><span
                                                class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                       role="presentation"><a
                                                    id="cke_100" class="cke_button cke_button__cut cke_button_disabled "
                                                    href="javascript:void(&#39;Cắt&#39;)" title="Cắt (Ctrl+X)"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_100_label"
                                                    aria-describedby="cke_100_description" aria-haspopup="false"
                                                    aria-disabled="true"
                                                    onkeydown="return CKEDITOR.tools.callFunction(159,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(160,event);"
                                                    onclick="CKEDITOR.tools.callFunction(161,this);return false;"><span
                                                        class="cke_button_icon cke_button__cut_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -312px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_100_label"
                                                        class="cke_button_label cke_button__cut_label"
                                                        aria-hidden="false">Cắt</span><span id="cke_100_description"
                                                                                            class="cke_button_label"
                                                                                            aria-hidden="false">&nbsp;Phím tắt Ctrl+X</span></a><a
                                                    id="cke_101"
                                                    class="cke_button cke_button__copy cke_button_disabled "
                                                    href="javascript:void(&#39;Sao chép&#39;)" title="Sao chép (Ctrl+C)"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_101_label"
                                                    aria-describedby="cke_101_description" aria-haspopup="false"
                                                    aria-disabled="true"
                                                    onkeydown="return CKEDITOR.tools.callFunction(162,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(163,event);"
                                                    onclick="CKEDITOR.tools.callFunction(164,this);return false;"><span
                                                        class="cke_button_icon cke_button__copy_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -264px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_101_label"
                                                        class="cke_button_label cke_button__copy_label"
                                                        aria-hidden="false">Sao chép</span><span
                                                        id="cke_101_description"
                                                        class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+C</span></a><a
                                                    id="cke_102" class="cke_button cke_button__paste cke_button_off"
                                                    href="javascript:void(&#39;Dán&#39;)" title="Dán (Ctrl+V)"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_102_label"
                                                    aria-describedby="cke_102_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(165,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(166,event);"
                                                    onclick="CKEDITOR.tools.callFunction(167,this);return false;"><span
                                                        class="cke_button_icon cke_button__paste_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -360px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_102_label"
                                                        class="cke_button_label cke_button__paste_label"
                                                        aria-hidden="false">Dán</span><span id="cke_102_description"
                                                                                            class="cke_button_label"
                                                                                            aria-hidden="false">&nbsp;Phím tắt Ctrl+V</span></a><a
                                                    id="cke_103" class="cke_button cke_button__pastetext cke_button_off"
                                                    href="javascript:void(&#39;Dán theo định dạng văn bản thuần&#39;)"
                                                    title="Dán theo định dạng văn bản thuần (Ctrl+Shift+V)"
                                                    tabindex="-1" hidefocus="true"
                                                    role="button" aria-labelledby="cke_103_label"
                                                    aria-describedby="cke_103_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(168,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(169,event);"
                                                    onclick="CKEDITOR.tools.callFunction(170,this);return false;"><span
                                                        class="cke_button_icon cke_button__pastetext_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1560px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_103_label"
                                                        class="cke_button_label cke_button__pastetext_label"
                                                        aria-hidden="false">Dán theo định dạng văn bản thuần</span><span
                                                        id="cke_103_description" class="cke_button_label"
                                                        aria-hidden="false">&nbsp;Phím tắt
                                    Ctrl+Shift+V</span></a><span class="cke_toolbar_separator"
                                                                 role="separator"></span><a id="cke_104"
                                                                                            class="cke_button cke_button__undo cke_button_disabled "
                                                                                            href="javascript:void(&#39;Khôi phục thao tác&#39;)"
                                                                                            title="Khôi phục thao tác (Ctrl+Z)"
                                                                                            tabindex="-1"
                                                                                            hidefocus="true"
                                                                                            role="button"
                                                                                            aria-labelledby="cke_104_label"
                                                                                            aria-describedby="cke_104_description"
                                                                                            aria-haspopup="false"
                                                                                            aria-disabled="true"
                                                                                            onkeydown="return CKEDITOR.tools.callFunction(171,event);"
                                                                                            onfocus="return CKEDITOR.tools.callFunction(172,event);"
                                                                                            onclick="CKEDITOR.tools.callFunction(173,this);return false;"><span
                                                        class="cke_button_icon cke_button__undo_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -2016px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_104_label"
                                                        class="cke_button_label cke_button__undo_label"
                                                        aria-hidden="false">Khôi phục thao tác</span><span
                                                        id="cke_104_description"
                                                        class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+Z</span></a><a
                                                    id="cke_105"
                                                    class="cke_button cke_button__redo cke_button_disabled "
                                                    href="javascript:void(&#39;Làm lại thao tác&#39;)"
                                                    title="Làm lại thao tác (Ctrl+Y)"
                                                    tabindex="-1" hidefocus="true" role="button"
                                                    aria-labelledby="cke_105_label"
                                                    aria-describedby="cke_105_description" aria-haspopup="false"
                                                    aria-disabled="true"
                                                    onkeydown="return CKEDITOR.tools.callFunction(174,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(175,event);"
                                                    onclick="CKEDITOR.tools.callFunction(176,this);return false;"><span
                                                        class="cke_button_icon cke_button__redo_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1968px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_105_label"
                                                        class="cke_button_label cke_button__redo_label"
                                                        aria-hidden="false">Làm lại thao tác</span><span
                                                        id="cke_105_description"
                                                        class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt
                                    Ctrl+Y</span></a></span><span class="cke_toolbar_end"></span></span><span
                                            id="cke_106" class="cke_toolbar" aria-labelledby="cke_106_label"
                                            role="toolbar"><span
                                                id="cke_106_label" class="cke_voice_label">Chỉnh sửa</span><span
                                                class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                       role="presentation"><a
                                                    id="cke_107" class="cke_button cke_button__find cke_button_off"
                                                    href="javascript:void(&#39;Tìm kiếm&#39;)" title="Tìm kiếm"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_107_label"
                                                    aria-describedby="cke_107_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(177,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(178,event);"
                                                    onclick="CKEDITOR.tools.callFunction(179,this);return false;"><span
                                                        class="cke_button_icon cke_button__find_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -576px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_107_label"
                                                        class="cke_button_label cke_button__find_label"
                                                        aria-hidden="false">Tìm kiếm</span><span
                                                        id="cke_107_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_108"
                                                    class="cke_button cke_button__replace cke_button_off"
                                                    href="javascript:void(&#39;Thay thế&#39;)" title="Thay thế"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_108_label"
                                                    aria-describedby="cke_108_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(180,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(181,event);"
                                                    onclick="CKEDITOR.tools.callFunction(182,this);return false;"><span
                                                        class="cke_button_icon cke_button__replace_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -600px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_108_label"
                                                        class="cke_button_label cke_button__replace_label"
                                                        aria-hidden="false">Thay thế</span><span
                                                        id="cke_108_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator" role="separator"></span><a
                                                    id="cke_109"
                                                    class="cke_button cke_button__selectall cke_button_off"
                                                    href="javascript:void(&#39;Chọn tất cả&#39;)" title="Chọn tất cả"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_109_label"
                                                    aria-describedby="cke_109_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(183,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(184,event);"
                                                    onclick="CKEDITOR.tools.callFunction(185,this);return false;"><span
                                                        class="cke_button_icon cke_button__selectall_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1752px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_109_label"
                                                        class="cke_button_label cke_button__selectall_label"
                                                        aria-hidden="false">Chọn tất cả</span><span
                                                        id="cke_109_description"
                                                        class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span
                                            class="cke_toolbar_break"></span><span
                                            id="cke_110" class="cke_toolbar" aria-labelledby="cke_110_label"
                                            role="toolbar"><span
                                                id="cke_110_label" class="cke_voice_label">Kiểu cơ bản</span><span
                                                class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                       role="presentation"><a
                                                    id="cke_111" class="cke_button cke_button__bold cke_button_off"
                                                    href="javascript:void(&#39;Đậm&#39;)" title="Đậm (Ctrl+B)"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_111_label"
                                                    aria-describedby="cke_111_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(186,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(187,event);"
                                                    onclick="CKEDITOR.tools.callFunction(188,this);return false;"><span
                                                        class="cke_button_icon cke_button__bold_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -24px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_111_label"
                                                        class="cke_button_label cke_button__bold_label"
                                                        aria-hidden="false">Đậm</span><span id="cke_111_description"
                                                                                            class="cke_button_label"
                                                                                            aria-hidden="false">&nbsp;Phím tắt Ctrl+B</span></a><a
                                                    id="cke_112" class="cke_button cke_button__italic cke_button_off"
                                                    href="javascript:void(&#39;Nghiêng&#39;)" title="Nghiêng (Ctrl+I)"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_112_label"
                                                    aria-describedby="cke_112_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(189,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(190,event);"
                                                    onclick="CKEDITOR.tools.callFunction(191,this);return false;"><span
                                                        class="cke_button_icon cke_button__italic_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -48px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_112_label"
                                                        class="cke_button_label cke_button__italic_label"
                                                        aria-hidden="false">Nghiêng</span><span id="cke_112_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false">&nbsp;Phím tắt Ctrl+I</span></a><a
                                                    id="cke_113" class="cke_button cke_button__underline cke_button_off"
                                                    href="javascript:void(&#39;Gạch chân&#39;)"
                                                    title="Gạch chân (Ctrl+U)" tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_113_label"
                                                    aria-describedby="cke_113_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(192,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(193,event);"
                                                    onclick="CKEDITOR.tools.callFunction(194,this);return false;"><span
                                                        class="cke_button_icon cke_button__underline_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -144px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_113_label"
                                                        class="cke_button_label cke_button__underline_label"
                                                        aria-hidden="false">Gạch chân</span><span
                                                        id="cke_113_description"
                                                        class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+U</span></a><a
                                                    id="cke_114" class="cke_button cke_button__strike cke_button_off"
                                                    href="javascript:void(&#39;Gạch xuyên ngang&#39;)"
                                                    title="Gạch xuyên ngang"
                                                    tabindex="-1" hidefocus="true" role="button"
                                                    aria-labelledby="cke_114_label"
                                                    aria-describedby="cke_114_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(195,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(196,event);"
                                                    onclick="CKEDITOR.tools.callFunction(197,this);return false;"><span
                                                        class="cke_button_icon cke_button__strike_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -72px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_114_label"
                                                        class="cke_button_label cke_button__strike_label"
                                                        aria-hidden="false">Gạch xuyên ngang</span><span
                                                        id="cke_114_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_115"
                                                    class="cke_button cke_button__subscript cke_button_off"
                                                    href="javascript:void(&#39;Chỉ số dưới&#39;)" title="Chỉ số dưới"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_115_label"
                                                    aria-describedby="cke_115_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(198,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(199,event);"
                                                    onclick="CKEDITOR.tools.callFunction(200,this);return false;"><span
                                                        class="cke_button_icon cke_button__subscript_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -96px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_115_label"
                                                        class="cke_button_label cke_button__subscript_label"
                                                        aria-hidden="false">Chỉ số dưới</span><span
                                                        id="cke_115_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_116"
                                                    class="cke_button cke_button__superscript cke_button_off"
                                                    href="javascript:void(&#39;Chỉ số trên&#39;)" title="Chỉ số trên"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_116_label"
                                                    aria-describedby="cke_116_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(201,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(202,event);"
                                                    onclick="CKEDITOR.tools.callFunction(203,this);return false;"><span
                                                        class="cke_button_icon cke_button__superscript_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -120px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_116_label"
                                                        class="cke_button_label cke_button__superscript_label"
                                                        aria-hidden="false">Chỉ số trên</span><span
                                                        id="cke_116_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator" role="separator"></span><a
                                                    id="cke_117"
                                                    class="cke_button cke_button__copyformatting cke_button_off"
                                                    href="javascript:void(&#39;Sao chép định dạng&#39;)"
                                                    title="Sao chép định dạng (Ctrl+Shift+C)" tabindex="-1"
                                                    hidefocus="true" role="button"
                                                    aria-labelledby="cke_117_label"
                                                    aria-describedby="cke_117_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(204,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(205,event);"
                                                    onclick="CKEDITOR.tools.callFunction(206,this);return false;"><span
                                                        class="cke_button_icon cke_button__copyformatting_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -480px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_117_label"
                                                        class="cke_button_label cke_button__copyformatting_label"
                                                        aria-hidden="false">Sao chép định dạng</span><span
                                                        id="cke_117_description"
                                                        class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt
                                    Ctrl+Shift+C</span></a><a id="cke_118"
                                                              class="cke_button cke_button__removeformat cke_button_off"
                                                              href="javascript:void(&#39;Xoá định dạng&#39;)"
                                                              title="Xoá định dạng" tabindex="-1"
                                                              hidefocus="true" role="button"
                                                              aria-labelledby="cke_118_label"
                                                              aria-describedby="cke_118_description"
                                                              aria-haspopup="false" aria-disabled="false"
                                                              onkeydown="return CKEDITOR.tools.callFunction(207,event);"
                                                              onfocus="return CKEDITOR.tools.callFunction(208,event);"
                                                              onclick="CKEDITOR.tools.callFunction(209,this);return false;"><span
                                                        class="cke_button_icon cke_button__removeformat_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1704px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_118_label"
                                                        class="cke_button_label cke_button__removeformat_label"
                                                        aria-hidden="false">Xoá định dạng</span><span
                                                        id="cke_118_description"
                                                        class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span id="cke_119"
                                                                                            class="cke_toolbar"
                                                                                            aria-labelledby="cke_119_label"
                                                                                            role="toolbar"><span
                                                id="cke_119_label"
                                                class="cke_voice_label">Đoạn</span><span
                                                class="cke_toolbar_start"></span><span
                                                class="cke_toolgroup" role="presentation"><a id="cke_120"
                                                                                             class="cke_button cke_button__numberedlist cke_button_off"
                                                                                             href="javascript:void(&#39;Chèn/Xoá Danh sách có thứ tự&#39;)"
                                                                                             title="Chèn/Xoá Danh sách có thứ tự"
                                                                                             tabindex="-1"
                                                                                             hidefocus="true"
                                                                                             role="button"
                                                                                             aria-labelledby="cke_120_label"
                                                                                             aria-describedby="cke_120_description"
                                                                                             aria-haspopup="false"
                                                                                             aria-disabled="false"
                                                                                             onkeydown="return CKEDITOR.tools.callFunction(210,event);"
                                                                                             onfocus="return CKEDITOR.tools.callFunction(211,event);"
                                                                                             onclick="CKEDITOR.tools.callFunction(212,this);return false;"><span
                                                        class="cke_button_icon cke_button__numberedlist_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1392px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_120_label"
                                                        class="cke_button_label cke_button__numberedlist_label"
                                                        aria-hidden="false">Chèn/Xoá Danh sách có thứ tự</span><span
                                                        id="cke_120_description" class="cke_button_label"
                                                        aria-hidden="false"></span></a><a
                                                    id="cke_121"
                                                    class="cke_button cke_button__bulletedlist cke_button_off"
                                                    href="javascript:void(&#39;Chèn/Xoá Danh sách không thứ tự&#39;)"
                                                    title="Chèn/Xoá Danh sách không thứ tự" tabindex="-1"
                                                    hidefocus="true" role="button"
                                                    aria-labelledby="cke_121_label"
                                                    aria-describedby="cke_121_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(213,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(214,event);"
                                                    onclick="CKEDITOR.tools.callFunction(215,this);return false;"><span
                                                        class="cke_button_icon cke_button__bulletedlist_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1344px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_121_label"
                                                        class="cke_button_label cke_button__bulletedlist_label"
                                                        aria-hidden="false">Chèn/Xoá Danh sách không thứ tự</span><span
                                                        id="cke_121_description" class="cke_button_label"
                                                        aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator"
                                                    role="separator"></span><a id="cke_122"
                                                                               class="cke_button cke_button__outdent cke_button_disabled "
                                                                               href="javascript:void(&#39;Dịch ra ngoài&#39;)"
                                                                               title="Dịch ra ngoài" tabindex="-1"
                                                                               hidefocus="true" role="button"
                                                                               aria-labelledby="cke_122_label"
                                                                               aria-describedby="cke_122_description"
                                                                               aria-haspopup="false"
                                                                               aria-disabled="true"
                                                                               onkeydown="return CKEDITOR.tools.callFunction(216,event);"
                                                                               onfocus="return CKEDITOR.tools.callFunction(217,event);"
                                                                               onclick="CKEDITOR.tools.callFunction(218,this);return false;"><span
                                                        class="cke_button_icon cke_button__outdent_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1056px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_122_label"
                                                        class="cke_button_label cke_button__outdent_label"
                                                        aria-hidden="false">Dịch ra ngoài</span><span
                                                        id="cke_122_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_123"
                                                    class="cke_button cke_button__indent cke_button_off"
                                                    href="javascript:void(&#39;Dịch vào trong&#39;)"
                                                    title="Dịch vào trong" tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_123_label"
                                                    aria-describedby="cke_123_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(219,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(220,event);"
                                                    onclick="CKEDITOR.tools.callFunction(221,this);return false;"><span
                                                        class="cke_button_icon cke_button__indent_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1008px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_123_label"
                                                        class="cke_button_label cke_button__indent_label"
                                                        aria-hidden="false">Dịch vào trong</span><span
                                                        id="cke_123_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator" role="separator"></span><a
                                                    id="cke_124"
                                                    class="cke_button cke_button__blockquote cke_button_off"
                                                    href="javascript:void(&#39;Khối trích dẫn&#39;)"
                                                    title="Khối trích dẫn" tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_124_label"
                                                    aria-describedby="cke_124_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(222,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(223,event);"
                                                    onclick="CKEDITOR.tools.callFunction(224,this);return false;"><span
                                                        class="cke_button_icon cke_button__blockquote_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -216px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_124_label"
                                                        class="cke_button_label cke_button__blockquote_label"
                                                        aria-hidden="false">Khối trích dẫn</span><span
                                                        id="cke_124_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator" role="separator"></span><a
                                                    id="cke_125"
                                                    class="cke_button cke_button__justifyleft cke_button_off"
                                                    href="javascript:void(&#39;Canh trái&#39;)" title="Canh trái"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_125_label"
                                                    aria-describedby="cke_125_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(225,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(226,event);"
                                                    onclick="CKEDITOR.tools.callFunction(227,this);return false;"><span
                                                        class="cke_button_icon cke_button__justifyleft_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1152px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_125_label"
                                                        class="cke_button_label cke_button__justifyleft_label"
                                                        aria-hidden="false">Canh trái</span><span
                                                        id="cke_125_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_126"
                                                    class="cke_button cke_button__justifycenter cke_button_off"
                                                    href="javascript:void(&#39;Giữa&#39;)" title="Giữa" tabindex="-1"
                                                    hidefocus="true"
                                                    role="button" aria-labelledby="cke_126_label"
                                                    aria-describedby="cke_126_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(228,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(229,event);"
                                                    onclick="CKEDITOR.tools.callFunction(230,this);return false;"><span
                                                        class="cke_button_icon cke_button__justifycenter_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1128px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_126_label"
                                                        class="cke_button_label cke_button__justifycenter_label"
                                                        aria-hidden="false">Giữa</span><span id="cke_126_description"
                                                                                             class="cke_button_label"
                                                                                             aria-hidden="false"></span></a><a
                                                    id="cke_127"
                                                    class="cke_button cke_button__justifyright cke_button_off"
                                                    href="javascript:void(&#39;Canh phải&#39;)" title="Canh phải"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_127_label"
                                                    aria-describedby="cke_127_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(231,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(232,event);"
                                                    onclick="CKEDITOR.tools.callFunction(233,this);return false;"><span
                                                        class="cke_button_icon cke_button__justifyright_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1176px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_127_label"
                                                        class="cke_button_label cke_button__justifyright_label"
                                                        aria-hidden="false">Canh phải</span><span
                                                        id="cke_127_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_128"
                                                    class="cke_button cke_button__justifyblock cke_button_off"
                                                    href="javascript:void(&#39;Sắp chữ&#39;)" title="Sắp chữ"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_128_label"
                                                    aria-describedby="cke_128_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(234,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(235,event);"
                                                    onclick="CKEDITOR.tools.callFunction(236,this);return false;"><span
                                                        class="cke_button_icon cke_button__justifyblock_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1104px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_128_label"
                                                        class="cke_button_label cke_button__justifyblock_label"
                                                        aria-hidden="false">Sắp chữ</span><span id="cke_128_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false"></span></a><span
                                                    class="cke_toolbar_separator" role="separator"></span><a
                                                    id="cke_129"
                                                    class="cke_button cke_button__bidiltr cke_button_off"
                                                    href="javascript:void(&#39;Văn bản hướng từ trái sang phải&#39;)"
                                                    title="Văn bản hướng từ trái sang phải" tabindex="-1"
                                                    hidefocus="true" role="button"
                                                    aria-labelledby="cke_129_label"
                                                    aria-describedby="cke_129_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(237,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(238,event);"
                                                    onclick="CKEDITOR.tools.callFunction(239,this);return false;"><span
                                                        class="cke_button_icon cke_button__bidiltr_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -168px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_129_label"
                                                        class="cke_button_label cke_button__bidiltr_label"
                                                        aria-hidden="false">Văn bản hướng từ trái sang phải</span><span
                                                        id="cke_129_description" class="cke_button_label"
                                                        aria-hidden="false"></span></a><a
                                                    id="cke_130" class="cke_button cke_button__bidirtl cke_button_off"
                                                    href="javascript:void(&#39;Văn bản hướng từ phải sang trái&#39;)"
                                                    title="Văn bản hướng từ phải sang trái" tabindex="-1"
                                                    hidefocus="true" role="button"
                                                    aria-labelledby="cke_130_label"
                                                    aria-describedby="cke_130_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(240,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(241,event);"
                                                    onclick="CKEDITOR.tools.callFunction(242,this);return false;"><span
                                                        class="cke_button_icon cke_button__bidirtl_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -192px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_130_label"
                                                        class="cke_button_label cke_button__bidirtl_label"
                                                        aria-hidden="false">Văn bản hướng từ phải sang trái</span><span
                                                        id="cke_130_description" class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span id="cke_131"
                                                                                            class="cke_toolbar"
                                                                                            aria-labelledby="cke_131_label"
                                                                                            role="toolbar"><span
                                                id="cke_131_label"
                                                class="cke_voice_label">Liên kết</span><span
                                                class="cke_toolbar_start"></span><span
                                                class="cke_toolgroup" role="presentation"><a id="cke_132"
                                                                                             class="cke_button cke_button__link cke_button_off"
                                                                                             href="javascript:void(&#39;Chèn/Sửa liên kết&#39;)"
                                                                                             title="Chèn/Sửa liên kết (Ctrl+K)"
                                                                                             tabindex="-1"
                                                                                             hidefocus="true"
                                                                                             role="button"
                                                                                             aria-labelledby="cke_132_label"
                                                                                             aria-describedby="cke_132_description"
                                                                                             aria-haspopup="false"
                                                                                             aria-disabled="false"
                                                                                             onkeydown="return CKEDITOR.tools.callFunction(243,event);"
                                                                                             onfocus="return CKEDITOR.tools.callFunction(244,event);"
                                                                                             onclick="CKEDITOR.tools.callFunction(245,this);return false;"><span
                                                        class="cke_button_icon cke_button__link_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1272px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_132_label"
                                                        class="cke_button_label cke_button__link_label"
                                                        aria-hidden="false">Chèn/Sửa liên kết</span><span
                                                        id="cke_132_description"
                                                        class="cke_button_label" aria-hidden="false">&nbsp;Phím tắt Ctrl+K</span></a><a
                                                    id="cke_133"
                                                    class="cke_button cke_button__unlink cke_button_disabled "
                                                    href="javascript:void(&#39;Xoá liên kết&#39;)" title="Xoá liên kết"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_133_label"
                                                    aria-describedby="cke_133_description" aria-haspopup="false"
                                                    aria-disabled="true"
                                                    onkeydown="return CKEDITOR.tools.callFunction(246,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(247,event);"
                                                    onclick="CKEDITOR.tools.callFunction(248,this);return false;"><span
                                                        class="cke_button_icon cke_button__unlink_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1296px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_133_label"
                                                        class="cke_button_label cke_button__unlink_label"
                                                        aria-hidden="false">Xoá liên kết</span><span
                                                        id="cke_133_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_134"
                                                    class="cke_button cke_button__anchor cke_button_off"
                                                    href="javascript:void(&#39;Chèn/Sửa điểm neo&#39;)"
                                                    title="Chèn/Sửa điểm neo"
                                                    tabindex="-1" hidefocus="true" role="button"
                                                    aria-labelledby="cke_134_label"
                                                    aria-describedby="cke_134_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(249,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(250,event);"
                                                    onclick="CKEDITOR.tools.callFunction(251,this);return false;"><span
                                                        class="cke_button_icon cke_button__anchor_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1248px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_134_label"
                                                        class="cke_button_label cke_button__anchor_label"
                                                        aria-hidden="false">Chèn/Sửa điểm neo</span><span
                                                        id="cke_134_description"
                                                        class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span id="cke_135"
                                                                                            class="cke_toolbar cke_toolbar_last"
                                                                                            aria-labelledby="cke_135_label"
                                                                                            role="toolbar"><span
                                                id="cke_135_label" class="cke_voice_label">Chèn</span><span
                                                class="cke_toolbar_start"></span><span class="cke_toolgroup"
                                                                                       role="presentation"><a
                                                    id="cke_136" class="cke_button cke_button__image cke_button_off"
                                                    href="javascript:void(&#39;Hình ảnh&#39;)" title="Hình ảnh"
                                                    tabindex="-1"
                                                    hidefocus="true" role="button" aria-labelledby="cke_136_label"
                                                    aria-describedby="cke_136_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(252,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(253,event);"
                                                    onclick="CKEDITOR.tools.callFunction(254,this);return false;"><span
                                                        class="cke_button_icon cke_button__image_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -960px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_136_label"
                                                        class="cke_button_label cke_button__image_label"
                                                        aria-hidden="false">Hình ảnh</span><span
                                                        id="cke_136_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_137"
                                                    class="cke_button cke_button__table cke_button_off"
                                                    href="javascript:void(&#39;Bảng&#39;)" title="Bảng" tabindex="-1"
                                                    hidefocus="true"
                                                    role="button" aria-labelledby="cke_137_label"
                                                    aria-describedby="cke_137_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(255,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(256,event);"
                                                    onclick="CKEDITOR.tools.callFunction(257,this);return false;"><span
                                                        class="cke_button_icon cke_button__table_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1920px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_137_label"
                                                        class="cke_button_label cke_button__table_label"
                                                        aria-hidden="false">Bảng</span><span id="cke_137_description"
                                                                                             class="cke_button_label"
                                                                                             aria-hidden="false"></span></a><a
                                                    id="cke_138"
                                                    class="cke_button cke_button__horizontalrule cke_button_off"
                                                    href="javascript:void(&#39;Chèn đường phân cách ngang&#39;)"
                                                    title="Chèn đường phân cách ngang" tabindex="-1" hidefocus="true"
                                                    role="button"
                                                    aria-labelledby="cke_138_label"
                                                    aria-describedby="cke_138_description"
                                                    aria-haspopup="false" aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(258,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(259,event);"
                                                    onclick="CKEDITOR.tools.callFunction(260,this);return false;"><span
                                                        class="cke_button_icon cke_button__horizontalrule_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -912px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_138_label"
                                                        class="cke_button_label cke_button__horizontalrule_label"
                                                        aria-hidden="false">Chèn đường phân cách ngang</span><span
                                                        id="cke_138_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_139"
                                                    class="cke_button cke_button__specialchar cke_button_off"
                                                    href="javascript:void(&#39;Chèn ký tự đặc biệt&#39;)"
                                                    title="Chèn ký tự đặc biệt"
                                                    tabindex="-1" hidefocus="true" role="button"
                                                    aria-labelledby="cke_139_label"
                                                    aria-describedby="cke_139_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(261,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(262,event);"
                                                    onclick="CKEDITOR.tools.callFunction(263,this);return false;"><span
                                                        class="cke_button_icon cke_button__specialchar_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1872px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_139_label"
                                                        class="cke_button_label cke_button__specialchar_label"
                                                        aria-hidden="false">Chèn ký tự đặc biệt</span><span
                                                        id="cke_139_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_140"
                                                    class="cke_button cke_button__pagebreak cke_button_off"
                                                    href="javascript:void(&#39;Chèn ngắt trang&#39;)"
                                                    title="Chèn ngắt trang"
                                                    tabindex="-1" hidefocus="true" role="button"
                                                    aria-labelledby="cke_140_label"
                                                    aria-describedby="cke_140_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(264,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(265,event);"
                                                    onclick="CKEDITOR.tools.callFunction(266,this);return false;"><span
                                                        class="cke_button_icon cke_button__pagebreak_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1512px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_140_label"
                                                        class="cke_button_label cke_button__pagebreak_label"
                                                        aria-hidden="false">Chèn ngắt trang</span><span
                                                        id="cke_140_description"
                                                        class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span
                                            class="cke_toolbar_break"></span><span
                                            id="cke_141" class="cke_toolbar" aria-labelledby="cke_141_label"
                                            role="toolbar"><span
                                                id="cke_141_label" class="cke_voice_label">Kiểu</span><span
                                                class="cke_toolbar_start"></span><span id="cke_91"
                                                                                       class="cke_combo cke_combo__styles cke_combo_off"
                                                                                       role="presentation"><span
                                                    id="cke_91_label" class="cke_combo_label">Kiểu</span><a
                                                    class="cke_combo_button"
                                                    title="Phong cách định dạng" tabindex="-1"
                                                    href="javascript:void(&#39;Phong cách định dạng&#39;)"
                                                    hidefocus="true" role="button"
                                                    aria-labelledby="cke_91_label" aria-haspopup="listbox"
                                                    onkeydown="return CKEDITOR.tools.callFunction(268,event,this);"
                                                    onfocus="return CKEDITOR.tools.callFunction(269,event);"
                                                    onclick="CKEDITOR.tools.callFunction(267,this);return false;"
                                                    aria-expanded="false"><span id="cke_91_text"
                                                                                class="cke_combo_text cke_combo_inlinelabel">Kiểu</span><span
                                                        class="cke_combo_open"><span
                                                            class="cke_combo_arrow"></span></span></a></span><span
                                                id="cke_92" class="cke_combo cke_combo__format cke_combo_off"
                                                role="presentation"><span
                                                    id="cke_92_label" class="cke_combo_label">Định dạng</span><a
                                                    class="cke_combo_button"
                                                    title="Định dạng" tabindex="-1"
                                                    href="javascript:void(&#39;Định dạng&#39;)"
                                                    hidefocus="true" role="button" aria-labelledby="cke_92_label"
                                                    aria-haspopup="listbox"
                                                    onkeydown="return CKEDITOR.tools.callFunction(271,event,this);"
                                                    onfocus="return CKEDITOR.tools.callFunction(272,event);"
                                                    onclick="CKEDITOR.tools.callFunction(270,this);return false;"
                                                    aria-expanded="false"><span id="cke_92_text"
                                                                                class="cke_combo_text cke_combo_inlinelabel">Định dạng</span><span
                                                        class="cke_combo_open"><span
                                                            class="cke_combo_arrow"></span></span></a></span><span
                                                id="cke_93" class="cke_combo cke_combo__font cke_combo_off"
                                                role="presentation"><span
                                                    id="cke_93_label" class="cke_combo_label">Phông</span><a
                                                    class="cke_combo_button"
                                                    title="Phông" tabindex="-1" href="javascript:void(&#39;Phông&#39;)"
                                                    hidefocus="true"
                                                    role="button" aria-labelledby="cke_93_label" aria-haspopup="listbox"
                                                    onkeydown="return CKEDITOR.tools.callFunction(274,event,this);"
                                                    onfocus="return CKEDITOR.tools.callFunction(275,event);"
                                                    onclick="CKEDITOR.tools.callFunction(273,this);return false;"
                                                    aria-expanded="false"><span id="cke_93_text"
                                                                                class="cke_combo_text cke_combo_inlinelabel">Phông</span><span
                                                        class="cke_combo_open"><span
                                                            class="cke_combo_arrow"></span></span></a></span><span
                                                id="cke_94" class="cke_combo cke_combo__fontsize cke_combo_off"
                                                role="presentation"><span id="cke_94_label" class="cke_combo_label">Cỡ chữ</span><a
                                                    class="cke_combo_button" title="Cỡ chữ" tabindex="-1"
                                                    href="javascript:void(&#39;Cỡ chữ&#39;)" hidefocus="true"
                                                    role="button"
                                                    aria-labelledby="cke_94_label" aria-haspopup="listbox"
                                                    onkeydown="return CKEDITOR.tools.callFunction(277,event,this);"
                                                    onfocus="return CKEDITOR.tools.callFunction(278,event);"
                                                    onclick="CKEDITOR.tools.callFunction(276,this);return false;"
                                                    aria-expanded="false"><span id="cke_94_text"
                                                                                class="cke_combo_text cke_combo_inlinelabel">Cỡ chữ</span><span
                                                        class="cke_combo_open"><span
                                                            class="cke_combo_arrow"></span></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span id="cke_142"
                                                                                            class="cke_toolbar"
                                                                                            aria-labelledby="cke_142_label"
                                                                                            role="toolbar"><span
                                                id="cke_142_label"
                                                class="cke_voice_label">Màu sắc</span><span
                                                class="cke_toolbar_start"></span><span
                                                class="cke_toolgroup" role="presentation"><a id="cke_143"
                                                                                             class="cke_button cke_button__textcolor cke_button_expandable cke_button_off"
                                                                                             href="javascript:void(&#39;Màu chữ&#39;)"
                                                                                             title="Màu chữ"
                                                                                             tabindex="-1"
                                                                                             hidefocus="true"
                                                                                             role="button"
                                                                                             aria-labelledby="cke_143_label"
                                                                                             aria-describedby="cke_143_description"
                                                                                             aria-haspopup="listbox"
                                                                                             aria-disabled="false"
                                                                                             onkeydown="return CKEDITOR.tools.callFunction(279,event);"
                                                                                             onfocus="return CKEDITOR.tools.callFunction(280,event);"
                                                                                             onclick="CKEDITOR.tools.callFunction(281,this);return false;"
                                                                                             aria-expanded="false"><span
                                                        class="cke_button_icon cke_button__textcolor_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -408px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_143_label"
                                                        class="cke_button_label cke_button__textcolor_label"
                                                        aria-hidden="false">Màu chữ</span><span id="cke_143_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false"></span><span
                                                        class="cke_button_arrow"></span></a><a id="cke_144"
                                                                                               class="cke_button cke_button__bgcolor cke_button_expandable cke_button_off"
                                                                                               href="javascript:void(&#39;Màu nền&#39;)"
                                                                                               title="Màu nền"
                                                                                               tabindex="-1"
                                                                                               hidefocus="true"
                                                                                               role="button"
                                                                                               aria-labelledby="cke_144_label"
                                                                                               aria-describedby="cke_144_description"
                                                                                               aria-haspopup="listbox"
                                                                                               aria-disabled="false"
                                                                                               onkeydown="return CKEDITOR.tools.callFunction(282,event);"
                                                                                               onfocus="return CKEDITOR.tools.callFunction(283,event);"
                                                                                               onclick="CKEDITOR.tools.callFunction(284,this);return false;"
                                                                                               aria-expanded="false"><span
                                                        class="cke_button_icon cke_button__bgcolor_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -384px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_144_label"
                                                        class="cke_button_label cke_button__bgcolor_label"
                                                        aria-hidden="false">Màu nền</span><span id="cke_144_description"
                                                                                                class="cke_button_label"
                                                                                                aria-hidden="false"></span><span
                                                        class="cke_button_arrow"></span></a></span><span
                                                class="cke_toolbar_end"></span></span><span id="cke_145"
                                                                                            class="cke_toolbar"
                                                                                            aria-labelledby="cke_145_label"
                                                                                            role="toolbar"><span
                                                id="cke_145_label"
                                                class="cke_voice_label">Công cụ</span><span
                                                class="cke_toolbar_start"></span><span
                                                class="cke_toolgroup" role="presentation"><a id="cke_146"
                                                                                             class="cke_button cke_button__maximize cke_button_off"
                                                                                             href="javascript:void(&#39;Phóng to tối đa&#39;)"
                                                                                             title="Phóng to tối đa"
                                                                                             tabindex="-1"
                                                                                             hidefocus="true"
                                                                                             role="button"
                                                                                             aria-labelledby="cke_146_label"
                                                                                             aria-describedby="cke_146_description"
                                                                                             aria-haspopup="false"
                                                                                             aria-disabled="false"
                                                                                             onkeydown="return CKEDITOR.tools.callFunction(285,event);"
                                                                                             onfocus="return CKEDITOR.tools.callFunction(286,event);"
                                                                                             onclick="CKEDITOR.tools.callFunction(287,this);return false;"><span
                                                        class="cke_button_icon cke_button__maximize_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1416px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_146_label"
                                                        class="cke_button_label cke_button__maximize_label"
                                                        aria-hidden="false">Phóng to tối đa</span><span
                                                        id="cke_146_description"
                                                        class="cke_button_label" aria-hidden="false"></span></a><a
                                                    id="cke_147"
                                                    class="cke_button cke_button__showblocks cke_button_off"
                                                    href="javascript:void(&#39;Hiển thị các khối&#39;)"
                                                    title="Hiển thị các khối"
                                                    tabindex="-1" hidefocus="true" role="button"
                                                    aria-labelledby="cke_147_label"
                                                    aria-describedby="cke_147_description" aria-haspopup="false"
                                                    aria-disabled="false"
                                                    onkeydown="return CKEDITOR.tools.callFunction(288,event);"
                                                    onfocus="return CKEDITOR.tools.callFunction(289,event);"
                                                    onclick="CKEDITOR.tools.callFunction(290,this);return false;"><span
                                                        class="cke_button_icon cke_button__showblocks_icon"
                                                        style="background-image:url(&#39;https://vnsmarttol.com/assets/plugins/ckeditor/plugins/icons.png?t=M2G9&#39;);background-position:0 -1800px;background-size:auto;">&nbsp;</span><span
                                                        id="cke_147_label"
                                                        class="cke_button_label cke_button__showblocks_label"
                                                        aria-hidden="false">Hiển thị các khối</span><span
                                                        id="cke_147_description"
                                                        class="cke_button_label"
                                                        aria-hidden="false"></span></a></span><span
                                                class="cke_toolbar_end"></span></span></span></span>
                                <div id="cke_2_contents" class="cke_contents cke_reset" role="presentation"
                                     style="height: 200px;">
                                    <iframe
                                        src="./VNSMARTTOL.COM _ Hệ thống Seeding hàng đầu Việt Nam_files/saved_resource(1).html"
                                        frameborder="0" class="cke_wysiwyg_frame cke_reset"
                                        title="Bộ soạn thảo văn bản có định dạng, notify_content_update" tabindex="0"
                                        allowtransparency="true" style="width: 100%; height: 100%;"></iframe>
                                </div>
                                <span
                                    id="cke_2_bottom" class="cke_bottom cke_reset_all" role="presentation"
                                    style="user-select: none;"><span id="cke_2_resizer"
                                                                     class="cke_resizer cke_resizer_vertical cke_resizer_ltr"
                                                                     title="Kéo rê để thay đổi kích cỡ"
                                                                     onmousedown="CKEDITOR.tools.callFunction(149, event)">◢</span><span
                                        id="cke_2_path_label"
                                        class="cke_voice_label">Nhãn thành phần</span><span id="cke_2_path"
                                                                                            class="cke_path"
                                                                                            role="group"
                                                                                            aria-labelledby="cke_2_path_label"><span
                                            class="cke_path_empty">&nbsp;</span></span></span>
                            </div>
                        </div>
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
<div class="modal fade" id="modalEditUserNotify" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <form class="form-json" method="POST" action="https://vnsmarttol.com/qladmin/user_notifications/update"
                  data-table="UserNotification">
                <input type="hidden" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Loại thông báo</label>
                        <select class="form-control" name="type">
                            <option value="notify_popup">Thông báo (Có hiện nổi bật)</option>
                            <option value="notify">Thông báo (Không hiện nổi bật)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nội dung thông báo</label>
                        <textarea class="form-control" name="content" required="" rows="5"></textarea>
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

<!-- Content Wrapper END -->
@section('js_page')
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>

    <script>
        var dtb_Notification, dtb_UserNotification;
        var nMap = {
            notify_popup: 'Thông báo (Có hiện nổi bật)',
            notify: 'Thông báo (Không hiện nổi bật)',
        }
        $(document).ready(function () {
            $('#show_last_notify').change(function () {
                $.post(`${baseUrl}/notifications/show_last_notify`, {show_last_notify: $(this).is(':checked') ? 1 : 0}).done(function () {
                    toastr.success('Thao tác thành công!');
                })
            })

            // Prepare select content
            let selectHtml = '';
            Object.keys(nMap).forEach(item => {
                selectHtml += `<option value="${item}">${nMap[item]}</option>`;
            });
            $('select[name="type"]').html(selectHtml);

            $(".custom-select2").select2({
                placeholder: "Chọn tài khoản",
                allowClear: true
            }).on('change', function () {
                $('#error_user_0')[parseInt($(this).val()) === 0 ? 'show' : 'hide']();
            });

            dtb_Notification = $('#datatable-notifications').DataTable({
                responsive: false,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: xAjax(baseUrl + '/ajax/notifications'),
                order: [[0, "desc"]],
                columns: [
                    definedColumns.stt,
                    definedColumns.notify_image,
                    definedColumns.notify_content,
                    makeColumn('Hiển thị', 'is_visible', (is_visible, t, row) => {
                        return `
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input custom-sw" data-key="is_visible" data-id=${row.id}
                   ${is_visible ? 'checked' : ''} id="is_visible_sw_${row.id}">
            <label class="custom-control-label" for="is_visible_sw_${row.id}"></label>
          </div>
          `
                    }),
                    makeColumn('Ghim', 'is_pin', (is_pin, t, row) => {
                        return `
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input custom-sw" data-key="is_pin" data-id=${row.id}
                   ${is_pin ? 'checked' : ''} id="is_pin_sw_${row.id}">
            <label class="custom-control-label" for="is_pin_sw_${row.id}"></label>
          </div>
          `
                    }),
                    definedColumns.created_at,

                    definedColumns.action(function (data, type, notify) {
                        return components.btn_edit(notify, 'btn-edit-notify') + components.btn_delete(notify, 'btn-delete-notify');
                    }),
                ],
            });

            ckEditor('notify_content');
            ckEditor('notify_content_update');
        });

        $('.select-full-width select').change(function () {
            var user_id = $(this).val();
            if (!user_id) return;

            var url = `${baseUrl}/ajax/user_notifications?user_id=${user_id}`;
            if (dtb_UserNotification) {
                dtb_UserNotification.ajax.url(url).load();
            } else {
                dtb_UserNotification = $('#datatable-user-notifications').DataTable({
                    responsive: false,
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    ajax: xAjax(url),
                    order: [[0, "desc"]],
                    columns: [
                        definedColumns.stt,
                        definedColumns.notify_type,
                        definedColumns.notify_content,
                        definedColumns.created_at,

                        definedColumns.action(function (data, type, notify) {
                            return components.btn_edit(notify, 'btn-edit-user-notify') + components.btn_delete(notify, 'btn-delete-user-notify');
                        }),
                    ],
                });
            }
        });

        $(document).on("click", ".btn-edit-notify", function () {
            var id = $(this).data('id');
            callAjaxPost(baseUrl + `/notifications/show`, {id}).then(function (data) {
                var notify = data.msg;
                ['id', 'image', 'is_pin'].forEach(function (field) {
                    $('#modalEditNotify').find(`[name=${field}]`).val(notify[field]);
                });

                updateSingleEditor('notify_content_update', notify.content);
                $('#modalEditNotify').modal('show');
            })
        });

        $(document).on("click", ".btn-delete-notify", async function () {
            if (!await swalConfirm()) return;

            var id = $(this).data('id');
            callAjaxPost(`${baseUrl}/notifications/delete`, {id}).then(function () {
                toastr.success('Đã xoá thông báo!');
                dtb_Notification.ajax.reload(null, false);
            })
        });

    </script>
@endsection
