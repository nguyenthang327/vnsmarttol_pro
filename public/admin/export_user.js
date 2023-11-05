var users = [];

var fieldMap = {
  username: 'Tên đăng nhập',
  email: 'Email',
  phone: 'SDT',
  ugroup: 'Chức vụ',
  price: 'Số dư',
  all_money: 'Tổng nạp',
  time: 'Ngày tạo',
}

var selectedFields = [];

Object.keys(fieldMap).forEach(field => {
  $('.area-select-container').append('' +
    `<div class="custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="select_${field}" name="select_field" data-field="${field}">
      <label class="custom-control-label" for="select_${field}">${fieldMap[field]}</label>
    </div>`
  )
});

$(document).ready(function () {
  Object.values(fieldMap).forEach(text => {
    $('#table_users thead tr').append(`<th>${text}</th>`);
  });

  $('.date-time').datetimepicker({
    format: 'YYYY-MM-DD HH:mm',
    locale: 'vi',
  });

  $(document).on('click', '#btn_view', async function () {
    var time_from = $('#time_from').val();
    var time_to = $('#time_to').val();

    callAjaxPost(baseUrl + '/user/export_data', {time_from, time_to}).then(function (data) {
      users = data.users.map(row => {
        row.time = moment(Date.parse(row.time)).format('YYYY/MM/DD HH:mm:ss');
        row.phone = row.phone || '';
        row.ugroup = typeGroup(row.ugroup)
        return row;
      });

      if ($.fn.dataTable.isDataTable('#table_users')) {
        $('#table_users').DataTable().destroy();
      }

      $('#table_users tbody').html('');
      const classes = ['text-success', 'text-warning', 'text-danger', 'text-primary'];
      users.forEach(function (row) {
        row.time = moment(row.createdAt).format('YYYY/MM/DD HH:mm:ss');
        var html = ejs.render(
          `<tr class="text-bold">` +
          Object.keys(fieldMap).map((key, index) => {
            return `<td class="${classes[index % classes.length]}"><%= row.${key} %></td>`
          }).join('') +
          `</tr>`
          , {row: row});
        $('#table_users tbody').append(html);
      });

      $('#table_users').dataTable({
        serverSide: false,
        ajax: null,
        order: [[1, "desc"]],
      });
    })
  });

  $(document).on('click', '#btn_export', async function () {
    if (!users.length) return swalError("Danh sách rỗng");
    if (!selectedFields.length) return swalError("Vui lòng chọn định dạng xuất");

    // Generate header
    var rows = [
      selectedFields.map(field => fieldMap[field]).join(",")
    ];

    users.forEach(function (row) {
      row.time = moment(row.createdAt).format('YYYY/MM/DD HH:mm:ss');
      var array = [];
      selectedFields.forEach(field => {
        var value = row[field];
        if (field == 'phone' && value) value = `="${value}"`;
        array.push(value);
      })

      rows.push(array.join(','));
    });

    var csvContent = rows.join("\r\n");
    downloadFile('export_user.csv', csvContent, 'text/csv;charset=utf-8');
  });

  $('.area-select-field .custom-control-input').change(function () {
    var field = $(this).data('field');
    if (selectedFields.includes(field)) {
      selectedFields = selectedFields.filter(x => x !== field);
    } else {
      selectedFields.push(field);
    }

    let textSelected = [];
    selectedFields.forEach(field => {
      textSelected.push(fieldMap[field]);
    });

    $('#selected_field').val(textSelected.join(' | '));
  });
});

function downloadFile(filename, text, typeFile) {
  const data = new Blob(['\ufeff' + text], { type: typeFile });
  var textFile = "text";
  window.URL.revokeObjectURL(textFile);
  textFile = window.URL.createObjectURL(data);
  var element = document.createElement("a");
  element.setAttribute("href", textFile);
  element.setAttribute("download", filename);
  element.style.display = "none";
  document.body.appendChild(element);
  element.click();
  document.body.removeChild(element);
}