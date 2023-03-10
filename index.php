<?php
/*
Theme Name: Abril 
Author: Vitor Amaral
Author URI: https://vitoramaral.com
Version: 1.0
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/ 
?> 

<?php get_header(); ?>
<div class="news-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="news-list">
              <h1>Últimas notícias</h1>
              <input type="hidden" id="page" value="1">
                <div id="result"></div>
                <div id="result_alert"></div>
                <div id="btn_load" class="text-center">
                  <a href="javascript:loadPost()" class="btn-load-more">Carregar mais</a>
                </div>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="sidebar-item empty">
            </div>
            <div class="sidebar-item empty">
            </div>
        </div> 
      </div>
    </div>
</div>
<script type="text/javascript" charset="utf8" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script>

$(document).ready(function(){
    loadPost();
});



function loadPost()
{
      let page = $("#page").val();
      let content = $("#result").html();
          $("#btn_load").css("display", "none");
			    $("#result_alert").html("aguarde.......<br /><img src=\"<?php echo get_template_directory_uri(); ?>/assets/images/loading.gif\" width=\"50px\" />");
			     
					$.ajax({
					
				    url: "<?php echo get_template_directory_uri(); ?>/api/list.php",
						 type: "POST",
						 cache: false,
						 dataType: "html",
						 timeout: 40000,
						 data: {page: page},
						 success: function(data, textStatus){
              $("#result_alert").html('');
							 	$("#result").html(content + data);
                 $("#page").val(parseInt(page) + 1);
                 $("#btn_load").css("display", "block");
				               
				               },
						 error: function(xhr,err){
						 		
						 		  $("#result_alert").html("Ocorreu algum problema na comunicação!");
						 		  $("#btn_load").css("display", "block");
						 		}
				    });
}




/*function doListPostVeja(page) {
    $.ajax({
        type: "GET",
        url: "https://veja.abril.com.br/wp-json/wp/v2/posts?page="+page+"&per_page=10",
        data: "", 
        dataType: "JSON",
        success: function(data) {
            $(data).each(function(index, element) {
                console.log(element.slug);
            });
        }
    });
}*/

</script>

<?php get_footer(); ?>