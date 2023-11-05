"use strict";

jQuery(document).ready(function() {
  datatableLog = $('#datatable-ajax').DataTable({
    responsive: false,
    searchDelay: 500,
    processing: true,
    serverSide: true,
    order: [[ 0, "desc" ]],
    ajax: xAjax(`${baseUrl}/ajax/users`),
    columns: [
      definedColumns.stt,
      makeColumn('Username', 'username'),
      makeColumn('Chức vụ', 'ugroup', function(data) {
        if(data >= 3) {
          return `<span class="badge badge-danger text-bold">${typeGroup(data)}</span>`;
        } else if(data === 2) {
          return `<span class="badge badge-warning text-bold">${typeGroup(data)}</span>`;
        } else if(data === 1) {
          return `<span class="badge badge-primary text-bold">${typeGroup(data)}</span>`;
        } else {
          return `<span class="badge badge-success text-bold">${typeGroup(data)}</span>`;
        }
      }),
      makeColumn('Tên', 'full_name'),
      definedColumns.user_status,
      makeColumn('Số dư', 'price', 'money_vnd'),
      makeColumn('Tổng nạp', 'all_money', 'money_vnd'),
      makeColumn('Lượt quay', 'spin_count', spin_count => spin_count),
      makeColumn('Thời gian tạo', 'created_at', 'time'),
      definedColumns.action(function(id) {
        return `<button class="btn btn-icon btn-add-money" title="Thêm tiền vào tài khoản" data-id="${id}">
                  <i class="fas fa-hand-holding-usd text-success"></i>
                </button>
                <button class="btn btn-icon btn-subtract-money" data-id="${id}"
                title="Trừ tiền trong tài khoản">
                  <i class="fas fa-user-minus text-warning"></i>
                </button>
                <button class="btn btn-icon btn-edit-user" title="Sửa thành viên" data-id="${id}">
                  <i class="fas fa-edit text-info"></i>
                </button>`;
      })
    ],
  });

  $(document).on("click", ".btn-add-money", function () {
    let user_id = $(this).data('id');
    let modal = $('#modalAddMoney');
    modal.find('form').trigger('reset');
    modal.find('form [name=user_id]').val(user_id);
    modal.modal('show');
  });

  $(document).on("click", ".btn-subtract-money", function () {
    let user_id = $(this).data('id');
    let modal = $('#modalSubtractMoney');
    modal.find('form').trigger('reset');
    modal.find('form [name=user_id]').val(user_id);
    modal.modal('show');
  });

  $(document).on("click", ".btn-edit-user", function () {
    let user_id = $(this).data('id');

    callAjaxPost(baseUrl + '/user/show', {user_id}).then(function(response) {
      if (!response.status) return swalError(response.msg);

      let modal = $('#modalEditUser');
      modal.find('form').trigger('reset');
      let user = response.user;

      Object.keys(user).forEach(field => {
        modal.find(`[name=${field}]`).val(user[field]);
      });

      modal.modal('show');
    });
  });

  $('#btn-add-user').click(function() {
    let modal = $('#modalAddUser');
    modal.find('form').trigger('reset');
    modal.modal('show');
  });

});
