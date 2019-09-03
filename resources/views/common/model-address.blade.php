
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Vui lòng chọn đúng vị trí</small>
                        </div>
                        <form role="form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelectTinh">Tỉnh</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelectTinh">
                                <option value="0" selected>Chọn tỉnh/thành phố</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelectHuyen">Huyện</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelectHuyen">
                                <option value="0" selected>Chọn Quận/Huyện</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelectXa">Xã</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelectXa">
                                <option value="0" selected>Chọn Xã</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <input type="hidden" id="mix-address-tinh">
                            <input type="hidden" id="mix-address-huyen">
                            <input type="hidden" id="mix-address">
                            <button type="button" class="btn btn-primary my-4" data-dismiss="modal">Hoàn Tất Lựa Chọn</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $.get("{{ route('api_gettinh') }}", function( data ) {
            //  Create HTML :
            var data_tinh = data.data;
            var html_option = [
                '<option value="0" selected>Chọn tỉnh/thành phố</option>'
            ];
            data_tinh.forEach(tinh => {
                html_option.push('<option value="'+ tinh.id +'">'+ tinh.name +'</option>');
            });
            // Set HTML
            $('#inputGroupSelectTinh').html(html_option);
            $('#mix-address').text('');
        });
        $('#inputGroupSelectTinh').change(function() {
            $('#inputGroupSelectHuyen').html('<option selected>Chọn Quận/Huyện</option>');
            $('#inputGroupSelectXa').html('<option selected>Chọn Xã</option>');
            var this_tinh = $('#inputGroupSelectTinh');
            if(this_tinh.val() != 0) {
                // GET Quan Huyen
                $.get("{{ route('api_gethuyen') }}", { id: this_tinh.val() } )
                .done(function( data ) {
                    //  Create HTML :
                    var data_huyen = data.huyen;
                    var html_option = [
                        '<option value="0" selected>Chọn Quận/Huyện</option>'
                    ];
                    data_huyen.forEach(huyen => {
                        html_option.push('<option value="'+ huyen.id +'">'+ huyen.name +'</option>');
                    });
                    // Set HTML
                    $('#inputGroupSelectHuyen').html(html_option);
                    $('#mix-address-tinh').val(data.tinh);
                    $("#mix_address").val($('#mix-address-tinh').val());
                });
            }
        });
        $('#inputGroupSelectHuyen').change(function() {
            $('#inputGroupSelectXa').html('<option selected>Chọn Xã</option>');
            var this_huyen = $('#inputGroupSelectHuyen');
            old_huyen = $('#mix-address').val();
            if(this_huyen.val() != 0) {
                // GET Xa
                $.get("{{ route('api_getxa') }}", { id: this_huyen.val() } )
                .done(function( data ) {
                    //  Create HTML :
                    var data_xa = data.xa;
                    var html_option = [
                        '<option value="0" selected>Chọn Xã</option>'
                    ];
                    data_xa.forEach(xa => {
                        html_option.push('<option id="xa-'+ xa.id +'" value="'+ xa.id +'">'+ xa.name +'</option>');
                    });
                    // Set HTML
                    $('#inputGroupSelectXa').html(html_option);
                    $('#mix-address-huyen').val(data.huyen + ' ' + $('#mix-address-tinh').val());
                    $("#mix_address").val($('#mix-address-huyen').val());
                });
            }
        });
        $('#inputGroupSelectXa').change(function() {
            $('#mix-address').val($('#xa-' + $('#inputGroupSelectXa').val()).text() + ' ' + $('#mix-address-huyen').val());
            $("#mix_address").val($('#mix-address').val());
            $('#re_add').val($('#inputGroupSelectXa').val());
        });
    });
</script>