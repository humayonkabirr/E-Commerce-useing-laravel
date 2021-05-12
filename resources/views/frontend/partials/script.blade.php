

<!-- <script type="text/javascript" src="{{ asset('js/jquery.1.11.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/SmoothScroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/nivo-lightbox.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jqBootstrapValidation.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/contact_me.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/main.js')}}"></script>
-->


<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function addToCart(product_id){
  // var url = "url('/')";
  // $.post(url+"api/carts/store",{
  $.post("http://localhost:8080/laravelProject/public/api/carts/store",{
    product_id: product_id
  })
  .done(function(data){

    data = JSON.parse(data);
    if(data.status == 'success'){
      $("#totalItems").html(data.totalItems);
      alertify.set('notifier','position', 'top-center');
      alertify.success('Total Items added to cart successfully. Total Items: '+ data.totalItems + '<br /> To Checkout <a href="{{route('carts')}}"> go to checkout page</a>');
    }
  });

}
</script>
