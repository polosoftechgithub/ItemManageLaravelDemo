$('.list-group-item').click(function(){
    let getItemId = $(this).data('id');
    $('.list-group-item').removeClass('item_active');
    $(this).addClass('item_active');
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#shift_right').click(function(){
    if($('.left_item').hasClass("item_active") == true)
    {
        let getLeftActiveItemId = $('.left_item.item_active').data('id');
        let page_url = window.location.origin;
        let shiftme = 'right';
        var token = $('meta[name="csrf_token"]').attr('content');

        $.ajax({
            type:'POST',
            url:'/update-item-type',
            data:{
                itemid: getLeftActiveItemId,
                shift: shiftme,
                _token: token
            },
            success:function(data) {
                location.reload();
            }
        });
    } else {
        alert('Please Get the Item and Select the Item Before pushing to List Box');
    }
});

$('#shift_left').click(function(){
    if($('.right_item').hasClass("item_active") == true)
    {
        let getRightActiveItemId = $('.right_item.item_active').data('id');
        let page_url = window.location.origin;
        let shiftme = 'left';
        var token = $('meta[name="csrf_token"]').attr('content');

        $.ajax({
            type:'POST',
            url:'/update-item-type',
            data:{
                itemid: getRightActiveItemId,
                shift: shiftme,
                _token: token
            },
            success:function(data) {
                location.reload();
            }
        });
    } else {
        alert('Please Get the Item and Select the Item Before pushing to List Box');
    }
});