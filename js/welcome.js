

$(document).ready(function(){

    // like and unlike click
    $(".like, .unlike").click(function(){

        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var posterid = split_id[1];  // postid
        
        // Finding click type
    
        // AJAX Request
        $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: {posterid:posterid,type:text},
            dataType: 'text',
            success: function(data){
                //alert(data);
                if(data == 'like'){
                    $("#unlike_"+posterid).text("unlike");        // setting likes
                    $("#unlike_"+posterid).attr("id", "like_" + posterid);
                    $("#like_"+posterid).attr("class", "like");
                }
                else{
                    $("#like_"+posterid).text("like");        // setting likes
                    $("#like_"+posterid).attr("id", "unlike_" + posterid);
                    $("#unlike_"+posterid).attr("class", "unlike");
                }
            }
            
        });

    });

});