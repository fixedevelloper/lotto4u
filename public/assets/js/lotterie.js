var lotto = function () {
    'use strict';
    const sendPayement=async function() {
        $('#send_payment').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        const jsonObj = [];
        $("#table_payment>tbody input[type='checkbox']:checked").each(function () {
            var row = $(this).closest('tr')[0];
            var game_id = row.cells[0].children[1].innerText;
            var id = row.cells[1].innerText;
            var address = row.cells[2].innerText;
            var amount = row.cells[4].innerText;
            const item = {};
            item['user_id'] = id;
            item['address'] = address;
            item['amount'] = amount;
            item['date_game'] = null;
            item['game_play_id'] = game_id;
            addresses.push(address)
            amounts.push(amount)
            jsonObj.push(item)
        });
        console.log(jsonObj)

              $.ajax({
                  url: configs.routes.post_payment,
                  type: "POST",
                  dataType: "JSON",
                  data: JSON.stringify({
                      ob: jsonObj}),
                  success: function (data) {
                      toastr.success('Operation executed successfully', 'Success')
                      $('#send_payment').hide();
                      window.location.reload()
                  },
                  error: function (err) {
                      toastr.error('An error has occurred' + JSON.stringify((err)),'Error')

                      $('#send_payment').hide();
                  }
              });

        }
    const sendLottery=async function(){
        $('#spinner_send').show();
        $('#spinner_send_svg').hide()

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                const jsonObj = [];
                $("#table_game>tbody>tr").each(function () {
                    var row = $(this).closest('tr')[0];
                    var id = row.cells[0].children[0].innerText;
                    var id_ = row.cells[0].children[1].innerText;
                    var value1= row.cells[1].children[0].children[0].children[0].checked;
                    var value2= row.cells[1].children[0].children[1].children[0].checked;
                    var value3= row.cells[1].children[0].children[2].children[0].checked;
                    const item = {};
                    item['id'] = id;
                    item['value'] = $('input[name="'+id_+'"]:checked').val();
                    jsonObj.push(item)
                });
                console.log(JSON.stringify({data: jsonObj}))
                $.ajax({
                    url: configs.routes.postgame_ajax,
                    type: "POST",
                    dataType: "JSON",
                    data: JSON.stringify({
                        ob: jsonObj, address: $('#address').text(),lotto_fixture_id:$('#lotto_fixture_id').text()}),
                    success: function (data) {
                        toastr.success('Operation executed successfully', 'Success')
                        $('#spinner_send').hide();
                        window.location.reload()
                    },
                    error: function (err) {
                        toastr.error('An error has occurred' + JSON.stringify((err)),'Error')

                        $('#spinner_send').hide();
                    }
                });
    }

    return {
        init: function () {
            $('#spinner_send').hide();
            $('#spinner_register').hide();
            $('#send_payment').hide();
        },
        sendLottery,
        sendPayement,
    }
}();
jQuery(document).ready(function() {
    'use strict';
    lotto.init();
});
