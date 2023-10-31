var allData = [], paymentMode = 'all';

$(document).ready(function () {
  // Set locale for moment
  var dateFormat = 'YYYY-MM-DD';

  $('#time_from').val(moment().subtract(1, 'day').format(dateFormat))
      .datetimepicker({
        format: dateFormat,
        locale: 'vi'
      });

  $('#time_to').val(moment().format(dateFormat))
      .datetimepicker({
        format: dateFormat,
        locale: 'vi'
      });

  $('#btn_view_payments').click(function (e) {
    var time_from = $('#time_from').val();
    var time_to = $('#time_to').val();
    if (!(time_from && time_to)) return;
    if (moment(time_from) > moment(time_to)) return swalError('Hãy chọn thời gian hợp lệ!');

    if (e.which) swalLoading();
    callAjaxPost(baseUrl + '/payment_by_range', {time_from, time_to}).then(function (result) {
      Swal.close();
      if (!result.status) return swalError();
      var rows = result.rows;

      var chartData = {
        manual: 0, manual_subtract: 0, auto: 0, card: 0
      };
      var summaryGroup = {
        l_subtract: {
          name: 'Tiền trừ',
          total: 0
        }
      };
      allLevels.forEach(level => {
        summaryGroup['l' + level] = {
          name: typeGroup(level),
          total: 0
        }
      });

      rows.forEach(function (row) {
        if (row.price < 0) {
          chartData.manual_subtract += Math.abs(row.price);
          summaryGroup.l_subtract.total += Math.abs(row.price);
        } else {
          if (!row.is_auto) {
            chartData.manual += row.price;
          } else if (row.extra && row.extra.includes('Thẻ cào')) {
            chartData.card += row.price;
          } else {
            chartData.auto += row.price;
          }
        }

        summaryGroup['l' + row.user_level].total += row.price;
      });

      // Show payment_by_type
      var total = 0;
      $('#payment_by_level').html('<ul></ul>');
      Object.values(summaryGroup).forEach(function(item) {
        total += item.total;
        $('#payment_by_level ul').append(`<li>${item.name}: <span class="text-bold text-danger">${formatMoney(item.total)}</span>₫</li>`);
      })
      $('#payment_by_level ul').append(`<li><span class="text-danger">Tổng cộng</span>: <span class="text-bold text-danger">${formatMoney(total)}</span>₫</li>`);

      // Draw chart
      Highcharts.chart('chart', {
        chart: {
          type: 'pie',
          backgroundColor: $('body').hasClass('dark_mode') ? '#1e1e2d' : '#ffffff',
        },
        title: {
          text: 'Thống kê nạp tiền theo thời gian'
        },
        accessibility: {
          point: {
            valueSuffix: '₫'
          }
        },
        yAxis: {
          title: null
        },
        xAxis: {
          type: 'category',
          allowDecimals: false,
          labels: {
            step: 1
          }
        },
        plotOptions: {
          series: {
            dataLabels: {
              enabled: true
            }
          }
        },
        credits: {
          enabled: false
        },
        series: [{
          name: 'Số tiền',
          colorByPoint: true,
          data: [
            {
              name: 'Thủ công',
              y: chartData.manual
            },
            {
              name: 'Thủ công (trừ)',
              y: chartData.manual_subtract
            },
            {
              name: 'Tự động (AutoBank, MOMO...)',
              y: chartData.auto
            },
            {
              name: 'Thẻ cào',
              y: chartData.card
            }
          ]
        }]
      });

      allData = rows;

      showPaymentData();
    })
  });

  $('#btn_view_payments').trigger('click');

  $('#icon_sync_balance').click(function () {
    toastr.info('Vui lòng chờ....');
    callAjaxPost(baseUrl + '/sync_balance').then(function (data) {
      if (!data.status) return swalError(data.msg);
      toastr.success('Thành công!');
      $('#balance_value').html(formatMoney(data.balance, '₫'));
    })
  });

  $('#payment_time').val(moment().format(dateFormat))
      .datetimepicker({
        format: 'YYYY-MM',
        locale: 'vi'
      });

  $('#btn_view_time_payment').click(function () {
    var payment_time = $('#payment_time').val();

    if (!payment_time) return;

    swalLoading();
    callAjaxPost(baseUrl + '/payment_by_month', {payment_time}).then(function (result) {
      $('#payment_chart').parent().css('min-height', '400px');
      $('#payment_month_summary').show();

      Swal.close();
      var rows = result.rows;

      var categories = [], values = [], payment_month_total = 0;
      rows.forEach(function (row) {
        categories.push(row.payment_time);
        values.push(Number(row.total));
        payment_month_total += Number(row.total);
      });
      $('#payment_month_total').html(formatMoney(payment_month_total, ' ₫'));

      Highcharts.chart('payment_chart', {
        chart: {
          backgroundColor: $('body').hasClass('dark_mode') ? '#1e1e2d' : '#ffffff',
        },
        title: {
          text: 'Thống kê nạp tiền theo tháng: ' + payment_time
        },
        credits: {
          enabled: false
        },
        yAxis: {
          title: {
            text: 'Tổng nạp'
          }
        },
        xAxis: {
          categories: categories,
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
        },
        plotOptions: {
          series: {
            label: {
              connectorAllowed: false
            }
          }
        },

        series: [{
          name: 'Tổng nạp',
          data: values
        }],

        responsive: {
          rules: [{
            condition: {
              maxWidth: 500
            },
            chartOptions: {
              legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
              }
            }
          }]
        }
      });
    })
  });

  function showPaymentData() {
    let rows;
    if (paymentMode === 'all') {
      rows = allData;
    } else {
      let filter;
      if (paymentMode == 'manual') {
        filter = item => item.is_auto != 1;
      } else if (paymentMode == 'auto') {
        filter = item => item.is_auto == 1;
      }
      rows = allData.filter(filter);
    }

    // Draw Table
    if ($.fn.dataTable.isDataTable('#datatable-payments')) {
      $('#datatable-payments').DataTable().destroy();
      $('#datatable-payments tbody').html('');
    }

    rows.forEach(function (row) {
      var html = ejs.render(
          `<tr>
                    <td>${components.table.id(row.id, null, row)}</td>
                     <td><span class="text-info text-bold">${row.username}</span></td>
                     <td>${components.table.money_vnd(row.price, null, row)}</td>
                     <td>${components.table.time(row.time, null, row)}</td>
                     <td>${components.table.note(row.note, null, row)}</td>
                     <td>${components.table.payment_mode(row.is_auto, null, row)}</td>
                  </tr>`
          , {row: row});
      $('#datatable-payments tbody').append(html);
    });

    $('#datatable-payments').dataTable({
      ajax: false,
      order: [[0, "desc"]],
    });
  }

  $(document).on('click', '.tab-payment-mode li a', function() {
    var newMode = $(this).data('mode');
    if (newMode == paymentMode) return;
    paymentMode = newMode;
    showPaymentData();
  });
});