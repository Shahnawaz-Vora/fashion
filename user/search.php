<style>
    .ui-helper-hidden-accessible
    {
        display: none;
    }
    .ui-autocomplete { 
       height:200px; 
       width: 100px; 
       /*margin-right: 1000px;*/
       cursor: pointer;
       overflow-y: scroll; 
       overflow-x: hidden; 
       z-index: 99999;
       list-style-type: none;
       background-color: white;
    }
    .ui-menu-item-wrapper{
        padding-top: 15px;
        padding-top: 15px;
        line-height: 1;
        height: 60px;
        padding-left: 7px;
        cursor: pointer;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }
    .ui-menu-item-wrapper:hover{
        background-color: #f3f1ef;
        cursor: pointer;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }
</style>
<script type="text/javascript">
  var search = "";
  var availableTags = [];
  $("#search").keyup(function(e){
    search = $("#search").val();
    if($("#search").val() != "")
    {
        $.ajax({
            url: 'ajax.php',
            method: 'post',
            data:{search:search},
            success: function (data) {
                var obj = JSON.parse(data);
                for(var i=0;i<obj.length;i++){

                    if(availableTags.indexOf(obj[i].product_name) === -1){
                        availableTags.push(obj[i].product_name);
                    }       
                }       
            }
       });
       if(e.key == "Enter")
       {
          location.href = "shop.php?search="+search;
       }
    }
  });
   $("#search").autocomplete({
     source: availableTags,
     minLength:3,
     scroll:true,
     select: function(event, ui) {   
          location.href="shop.php?search="+ui.item.value;
       }
    }).focus(function() {
       $(this).autocomplete("search", "");
    });

    $("#search1").keyup(function(e){
    search = $("#search1").val();
    if($("#search1").val() != "")
    {
        $.ajax({
            url: 'ajax.php',
            method: 'post',
            data:{search:search},
            success: function (data) {
                var obj = JSON.parse(data);
                for(var i=0;i<obj.length;i++){

                    if(availableTags.indexOf(obj[i].product_name) === -1){
                        availableTags.push(obj[i].product_name);
                    }       
                }       
            }
       });
       if(e.key == "Enter")
       {
          location.href = "shop.php?search="+search;
       }
    }
  });
   $("#search1").autocomplete({
     source: availableTags,
     minLength:3,
     scroll:true,
     select: function(event, ui) {   
          location.href="shop.php?search="+ui.item.value;
       }
    }).focus(function() {
       $(this).autocomplete("search", "");
    });
</script>