$(document).ready(function () {
    
    showcart();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(".addtocartBtn").click(function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var photo = $(this).data("photo");
        var price = $(this).data("price");
        //var qty = $(this).data("qty");

        console.log(id, name, photo, price);

        var data = { id: id, name: name, photo: photo, price: price, qty:1};

        var oldcart = localStorage.getItem("cart");

        if (oldcart) {
            cart = JSON.parse(oldcart);
        } else {
            var cart = new Array();
        } //end of checking oldcart
        var exist;
        $.each(cart, function (i, v) {
            if (id == v.id) {
                v.qty++;
                exist = true;
            }
        }); //end of for each
        if (!exist) {
            cart.push(data);
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        //showcart();
        update_cart_count();
    });
    function update_cart_count(){
        var mycart=localStorage.getItem('cart');
        if(mycart){
            var mycart_obj=JSON.parse(mycart);
            //check product_list array
            if(mycart_obj.length){
                var total=0;
                $.each(mycart_obj,function(i,v){
                    total+=v.qty;
                })
                $(".noticart").html(total);
            }
        }else{
            $(".noticart").html(total);
        }
    }

    //show cart

    function showcart() {
        var cart = localStorage.getItem("cart");
        if (cart) {

            var cartobj = JSON.parse(cart);
            //if(cartobj.length > 0){
            var result = "";
            var total = 0;
            var subcategory=0;
            
            


            $.each(cartobj, function (i, v) {
                subcategory = v.qty * v.price;
                total += subcategory;
                
                result += `
                    <tr>
                            <td>
                                <button class="btn btn-outline-danger remove btn-sm cart_item_delete" style="border-radius: 50%" data-id=${i}> 
                                    <i class="icofont-close-line"></i> 
                                </button> 
                            </td>
                            <td> 
                                <img src=" ${v.photo}" class="cartImg">                     
                            </td>
                            <td> 
                                <p> ${v.name} </p>
                                
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary plus_btn qtychange" data-btnid="1" data-id="${i}" data-qty="${v.qty}"> 
                                    <i class="icofont-plus"></i> 
                                </button>
                            </td>
                            <td>
                                <p> ${v.qty} </p>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary minus_btn qtychange" data-btnid="2" data-id="${i}" data-qty="${v.qty}"> 
                                    <i class="icofont-minus"></i>
                                </button>
                            </td>
                            <td>
                                <p class="text-danger"> 
                                    ${v.price} Ks
                                </p>
                                
                            </td>
                            <td>
                                ${subcategory} Ks
                            </td>
                        </tr>
                    `;
            });
            /*$("#shoppingcart_table").html(result);
            $("#totalqty").html(totalqty);
            $(".totalprice").html(totalPrice);*/
        
            result+= `<tr>
            <td colspan="8">
            <h3 class="text-right">Total:${total} ks</h3>
            </td>
            </tr>`;
            $("#shoppingcart_table").html(result);
        }else{
            var result=`
            <div class="col-12">
            <h5 class="text-right"> There are no items in this cart </h5>
        </div>
            `;
            
             $("#shoppingcart_table").html(result);
       }
    }

    // cart item delete

    $(".cart_item_delete").click(function () {
        var cart = JSON.parse(localStorage.getItem("cart"));
        var id = $(this).data("id"); //remove link in <li>
        cart.splice(id, 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        showcart();
        update_cart_count();
    });

    //change qty

    $(".qtychange").click(function () {
        var btnid = $(this).data("btnid");

        var id = $(this).data("id"); // index of array
        var qty = $(this).data("qty");
        cart = JSON.parse(localStorage.getItem("cart"));

        if (btnid == 1) {
            qty++;
            $.each(cart, function (i, v) {
                if (id == i) {
                    v.qty = qty;
                }
            });
        } else if (btnid == 2) {
            qty--;
            $.each(cart, function (i, v) {
                if (id == i) {
                    v.qty = qty;
                }
            });
            if (qty == 0) {
                cart.splice(id, 1);
            }
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        showcart();
    });

});


//buy now
    $('.buy_now').on('click',function(){
        //alert('hi');
        var notes=$('.notes').val();
        //var total=$('.total').val();
        var shopString=localStorage.getItem("cart");//string
        if(shopString){
            //var shopArray=JSON.parse(shopString);
            $.post('/orders',{shop_data:shopString,notes:notes},function(response){
                if(response){
                    alert(response);
                    localStorage.clear();
                    //showcart();
                    location.href="/";
                }
            })
        }
    })


