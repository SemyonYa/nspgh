function __SearchList(e) {
    var text = $(e.target).val();
    if (text.length > 2) {
        $.ajax({
            method: 'get',
            url: '/product/search-ajax',
            data: {name: text}
        }).done(function (msg) {
            alert("Data Saved: " + msg);
        });
    }
}
function SearchList(e) {
    var text = $(e.target).val();
    if (text.length > 2) {
//        alert(text);
        $('#search-list').prop('hidden', false);
        $('#search-list').load('/product/search-ajax?name=' + text);
    } else {
        $('#search-list').prop('hidden', true);
    }
}
function FilteringPriceList(e) {
    var txt = $(e.target).val().toLowerCase();
    var list = $('.nsp-price-list-item');
//    if (txt.length >= 3) {
    list.each(function () {
        var itemText = $(this).html().toLowerCase();
//            alert(itemText.indexOf(txt));
        if (itemText.indexOf(txt) > -1) {
            $(this).prop('hidden', false);
        } else {
            $(this).prop('hidden', true);
        }
    });
//    }
}
$(document).ready(function () {
    $('body').not('#search-list').click(function () {
        $('#search-list').prop('hidden', true);
    });
    $('#Homer').click(function () {
        $('html,body').animate({scrollTop: 0}, 400);
    });
});

function ProdToCart(id) {
    $.ajax({
        method: 'get',
        url: '/product/session?id=' + id
    }).done(function (msg) {
        $('#CartCount').html(msg);
        $('#ToCart').html('В корзине!!!');
    });
}
function SetToCart(id) {
    $.ajax({
        method: 'get',
        url: '/set/session?id=' + id
    }).done(function (msg) {
        $('#CartCount').html(msg);
        $('#ToCart').html('В корзине!!!');
    });
}
function ToCartPrice(id) {
    $.ajax({
        method: 'get',
        url: '/product/session?id=' + id,
    }).done(function (msg) {
        $('#CartCount').html(msg);
        $('#ToCart' + id).html('<span class="glyphicon glyphicon-ok"></span>');
    });
}
function ToCartPriceSet(id) {
    $.ajax({
        method: 'get',
        url: '/set/session?id=' + id,
    }).done(function (msg) {
        $('#CartCount').html(msg);
        $('#ToCartS' + id).html('<span class="glyphicon glyphicon-ok"></span>');
    });
}
function FillProductData(id) {
    $.ajax({
        method: 'GET',
        url: '/product/prod-data?id=' + id
    }).done(function (msg) {
        var msg_r = msg.split('???_???');
        var id = msg_r[0];
        var name = msg_r[1];
        $('#Good').val(name);
        $('#GoodId').val(id);
    });
}
function FillSetData(id) {
    $.ajax({
        method: 'GET',
        url: '/set/set-data?id=' + id
    }).done(function (msg) {
        var msg_r = msg.split('???_???');
        var id = msg_r[0];
        var name = msg_r[1];
        $('#GoodSet').val(name);
        $('#GoodSetId').val(id);
    });
}
function SessionView() {
//                        alert('asd');
    $.ajax({
        method: 'get',
        url: '/product/session-view'
    }).done(function (msg) {
        alert(msg);
    });
}

function ChangeProdQuantity(obj) {
    var id = $(obj).attr('data-id');
    var q = $(obj).val();
//    alert(id + 'qwe' + q);
    if (q !== null) {

        $.ajax({
            method: 'GET',
            url: '/product/change?id=' + id + '&q=' + q,
        }).done(function (msg) {
            alert(msg);
        });
    }
}
function ChangeSetQuantity(obj) {
    var id = $(obj).attr('data-id');
    var q = $(obj).val();
//    alert(id + 'qwe' + q);
    if (q !== null) {

        $.ajax({
            method: 'GET',
            url: '/set/change?id=' + id + '&q=' + q,
        }).done(function (msg) {
            alert(msg);
        });
    }
}
function RemoveProduct(id) {
    $.ajax({
        method: 'GET',
        url: '/product/remove?id=' + id,
    });
}
function RemoveSet(id) {
    $.ajax({
        method: 'GET',
        url: '/set/remove?id=' + id,
    });
}
function ViewCartForm() {
    $('#CartForm').load('/product/form');
    $('#ButtonField').css('display', 'none');
    $('.nsp-cart-prod-remove').each(function () {
        $(this).css('display', 'none');
    });
    $('input[data-name="prods"]').each(function () {
        $(this).prop('disabled', true);
    });
}
function ChangeOrderList(status) {
    var strings = $('.search-filter');
    if (status == 100) {
        strings.each(function () {
            $(this).prop('hidden', false);
        });
    } else {
        strings.each(function () {
            if ($(this).attr('data-param') == status) {
                $(this).prop('hidden', false);
            } else {
                $(this).prop('hidden', true);
            }
        });
    }

    alert(status);
}
function CurrencyToday() {
    $.ajax({
        method: 'GET',
        url: '/product/currency-today'
    }).done(function (msg) {
        alert(msg);
        window.location = '/admin';
    });
}

function SendMail() {
    $.ajax({
        method: 'GET',
        url: '/site/mailer'
    }).done(function (msg) {
        alert(msg);
    });
}

function RemoveSetProduct(id) {
    if (confirm('Действительно удалить?')) {
        $.ajax({
            method: 'GET',
            url: '/admin/set/remove-set-product?id=' + id
        }).done(function (msg) {
            location.reload();
        });
    }
}
function RemoveSchemeProduct(id) {
    if (confirm('Действительно удалить?')) {
        $.ajax({
            method: 'GET',
            url: '/admin/scheme/remove-scheme-product?id=' + id
        }).done(function (msg) {
            location.reload();
        });
    }
}
function RemoveRecomendedProduct(id) {
    if (confirm('Действительно удалить?')) {
        $.ajax({
            method: 'GET',
            url: '/admin/product/remove-recomended-product?id=' + id
        }).done(function (msg) {
            location.reload();
        });
    }
}
function LoadSetList() {
    $('#NspSetList').load('/set/list');
}
function LoadProductList(CatId) {
    $('#NspProductList').load('/product/products-ajax?cat_id=' + CatId);
}
function FilteringProductList(CatId) {
    var checks = $('input[data-filter=plus]');
    var FilterData = '';
    checks.each(function () {
        if ($(this).prop('checked')) {
            FilterData += $(this).val() + '___';
        }
    });
    if (FilterData !== '') {
        $('#NspProductList').load('/product/products-search-ajax?data=' + FilterData);
    } else {
        LoadProductList(CatId);
    }
}
$(window).scroll(function () {
    var top = $(window).scrollTop();
    if (top > 200) {
        $('#Homer').fadeIn();
    } else {
        $('#Homer').fadeOut();
    }
});
function GetMenu() {
    var menu = $('#MenuDesign');
    if (menu.css('display') == 'none') {
        menu.fadeIn();
    } else {
        menu.fadeOut();
    }
}
function TableChosen(obj) {
    $(obj).siblings().not('.nsp-td-colored').each(function () {
        if ($(this).html() == '') {
            $(this).html('<span class="glyphicon glyphicon-ok"></span>');
        } else {
            $(this).html('');
        }
    });
    for (var i = 2; i <= 10; i++) {
        var counter = 0;
        $('td:nth-child(' + i + ')').slice(1, -1).each(function () {
            if ($(this).html() !== '') {
                counter++;
            }
            $('tfoot td:nth-child(' + i + ')').first().each(function () {
                $(this).html(counter);
            });
        });
    }
}